<?php

namespace App\Http\Requests;

use App\Interaction;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InteractionRequest extends FormRequest
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
            'number' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter client name',
            'number.required' => 'Please enter client phone number',
            'number.numeric' => 'Phone number must be numbers not characters'
        ];
    }

    public function store()
    {
        $interaction = new Interaction();

        $interaction->name = $this->name;
        $interaction->number = $this->number;
        $interaction->email = $this->email;
        $interaction->comment = $this->comment;

        $interaction->save();
    }
}
