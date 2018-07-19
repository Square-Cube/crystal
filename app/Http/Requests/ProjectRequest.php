<?php

namespace App\Http\Requests;

use App\Project;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => implode("<br>" , $validator->errors()->all())];

        throw new HttpResponseException(response()->json($result , 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (\Request::route()->getName() == 'admin.projects.add') {

            return [
                'project_name' => 'required',
                'address' => 'required',
                'about' => 'required',
                'logo' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
                'promoters' => 'required',
                'start_date' => 'required|date|after:today',
                'end_date' => 'required|date|after:start_date'
            ];
        }else{
            return [
                'project_name' => 'required',
                'address' => 'required',
                'about' => 'required',
                'logo' => 'image|mimes:jpeg,jpg,png,gif|max:20000',
                'promoters' => 'required',
                'start_date' => 'required|date|after:today',
                'end_date' => 'required|date|after:start_date'
            ];
        }
    }

    public function messages()
    {
        if (\Request::route()->getName() == 'admin.projects.add') {

            return [
                'project_name.required' => 'Please enter project name',
                'address.required' => 'Please enter the address',
                'about.required' => 'Please enter some description',
                'logo.required' => 'Please select your logo',
                'logo.image' => 'Please enter logo',
                'logo.mimes' => 'logo type should be one of these : jpeg,jpg,png,gif',
                'logo.max' => 'logo size should be less than 2MB',
                'promoters.required' => 'Please select promoters',
                'start_date.required' => 'Please select project start date',
                'start_date.today' => 'Start date should be after today',
                'end_date.required' => 'Please select project end date',
                'end_date.after' => 'End date should be after start date'
            ];
        }else{
            return [
                'project_name.required' => 'Please enter project name',
                'address.required' => 'Please enter the address',
                'about.required' => 'Please enter some description',
                'logo.image' => 'Please enter logo',
                'logo.mimes' => 'logo type should be one of these : jpeg,jpg,png,gif',
                'logo.max' => 'logo size should be less than 2MB',
                'promoters.required' => 'Please select promoters',
                'start_date.required' => 'Please select project start date',
                'start_date.today' => 'Start date should be after today',
                'end_date.required' => 'Please select project end date',
                'end_date.after' => 'End date should be after start date'
            ];
        }
    }

    public function store()
    {
        $project = new Project();

        $project->name = $this->project_name;
        $project->address = $this->address;
        $project->about = $this->about;
        $project->lat = $this->lat;
        $project->lng = $this->lng;
        $project->user_id = auth()->guard('admins')->user()->id;
        $project->start_date = Carbon::parse($this->start_date);
        $project->end_date = Carbon::parse($this->end_date);

        $file = $this->logo;
        $destination = storage_path('uploads/projects');
        if (!empty($file)) {
//            @unlink($destination . "/{$user->logo}");
            $project->logo = md5(time()).'.'.$file->getClientOriginalName();
            $this->logo->move($destination, $project->logo);
        }

        if ($project->save()){
            $project->users()->attach($this->promoters);
        }
    }

    public function edit($id)
    {
        $project = Project::find($id);

        $project->name = $this->project_name;
        $project->address = $this->address;
        $project->about = $this->about;
        $project->lat = $this->lat;
        $project->lng = $this->lng;
        $project->start_date = Carbon::parse($this->start_date);
        $project->end_date = Carbon::parse($this->end_date);

        $file = $this->logo;
        $destination = storage_path('uploads/projects');
        if (!empty($file)) {
            @unlink($destination . "/{$project->logo}");
            $project->logo = md5(time()).'.'.$file->getClientOriginalName();
            $this->logo->move($destination, $project->logo);
        }

        if ($project->save()){
            $project->users()->sync($this->promoters);
        }
    }
}
