<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class testRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

                'name'=> 'required | regex:(^\w+( +\w+)*$)',
                // 'father name' => '',
                'nrc' => ['required','regex:(^([0-9]{1,2})\/([A-Za-z]{3}\((?:N)\)([0-9]{6})$))'],
                'phone' =>  ['required', 'starts_with:0', 'regex:/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{5})(?: *x(\d+))?\s*$/'],
                'email' => 'email',
                // // 'address' => '',
                'gender' => 'required|numeric|between:1,2',
                'birthday' => 'required | date',
                'image' => 'required | image | max:10MB'


        ];
    }

    public function message()
    {
        return [
            'name.alpha' => 'The :attribute field must be only characters',
            'phone.numeric' => 'The :attribute field must be numeric',
            'phone.max' => 'The :attribute number must have 10',
            'email.email' => 'The :attribute field must be in email format',

            'birthday.date' => 'The :attribute field must be in date format',
            'image.image' => 'The :attribute field type must be image.',
            'image.size:10MB' => 'The :attribute field can store only 10mB.'
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([$validator->errors()], 422));
    // }
}
