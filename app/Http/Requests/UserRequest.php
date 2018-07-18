<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
        if (\Request::route()->getName() == 'admin.users.add') {
            return [
                'email' => 'required|email|unique:users,email',
                'username' => 'required',
                'phone' => 'required',
                'age' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
                'password' => 'required'
            ];
        }else{
            return [
                'email' => 'required|email|unique:users,email,'.$this->id,
                'username' => 'required',
                'phone' => 'required',
                'age' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif|max:20000',
            ];
        }
    }

    public function messages()
    {
        if (\Request::route()->getName() == 'admin.users.add') {
            return [
                'email.required' => 'Please enter your email',
                'email.email' => 'Please provide a true email',
                'email.unique' => 'This email is already taken',
                'password.required' => 'Please enter your password',
                'username.required' => 'Please enter your username',
                'phone.required' => 'Please enter your phone number',
                'age.required' => 'Please enter your age',
                'address.required' => 'Please enter your address',
                'gender.required' => 'Please select your gender',
                'image.required' => 'Please select your image',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be one of these : jpeg,jpg,png,gif',
                'image.max' => 'Image size should be less than 2MB',
            ];
        }else{
            return [
                'email.required' => 'Please enter your email',
                'email.email' => 'Please provide a true email',
                'email.unique' => 'This email is already taken',
                'username.required' => 'Please enter your username',
                'phone.required' => 'Please enter your phone number',
                'age.required' => 'Please enter your age',
                'address.required' => 'Please enter your address',
                'gender.required' => 'Please select your gender',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be one of these : jpeg,jpg,png,gif',
                'image.max' => 'Image size should be less than 2MB',
            ];
        }
    }

    public function store()
    {
        $user = new User();

        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->username = $this->username;
        $user->phone = $this->phone;
        $user->age = $this->age;
        $user->address = $this->address;
        $user->gender = $this->gender;
        $user->type = $this->type;

        $file = $this->image;
        $destination = storage_path('uploads/users');
        if (!empty($file)) {
//            @unlink($destination . "/{$user->image}");
            $user->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $user->image);
        }

        $user->save();
    }

    public function edit($id)
    {
        $user = User::find($id);

        $user->email = $this->email;

        if ($this->password){
            $user->password = bcrypt($this->password);
        }

        $user->username = $this->username;
        $user->phone = $this->phone;
        $user->age = $this->age;
        $user->address = $this->address;
        $user->gender = $this->gender;

        $file = $this->image;
        $destination = storage_path('uploads/users');
        if (!empty($file)) {
            @unlink($destination . "/{$user->image}");
            $user->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $user->image);
        }

        $user->save();
    }
}
