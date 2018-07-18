<?php

namespace App\Http\Requests;

use App\Questionnaire;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuestionnaireRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'rate' => 'required',
            'recommend' => 'required',
            'learn' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter client name',
            'phone.required' => 'Please enter client phone number',
            'phone.numeric' => 'Phone number must be numbers not characters',
            'email.required' => 'Please enter client email',
            'rate.required' => 'Please choose your rate',
            'recommend.required' => 'Please choose your recommendation for a friend',
            'learn.required' => 'Please choose how did you know about crystal ',
        ];
    }

    public function store()
    {
        $question = new Questionnaire();

        $question->name = $this->name;
        $question->phone = $this->phone;
        $question->email = $this->email;
        $question->rate = $this->rate;
        $question->recommend = $this->recommend;
        $question->learn = $this->learn;

        $question->save();
    }
}
