<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tourRequest extends FormRequest
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

     * @return array
     */

    public function rules()
    {
        return [

                'name'=> 'required | regex:(^\w+( +\w+)*$)',
                'email' => 'required | email',
                'phone' =>  ['required', 'starts_with:0', 'regex:/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{5})(?: *x(\d+))?\s*$/'],
                'start-date' => 'required | date ',
                'end-date' => 'required | date | after_or_equal:start-date',
                'people' => 'required | numeric | between:1,20',
                'contact' => 'required',
                'file' => 'required |mimes:pdf,xlsx,jpg,png | max:10240'
                // 'father name' => '',
                // 'nrc' => ['required','regex:(^([0-9]{1,2})\/([A-Za-z]{3}\((?:N)\)([0-9]{6})$))'],
                // // 'address' => '',
                // 'end-date' => 'required | date',


        ];
    }

    public function message()
    {
        return [
            'phone.numeric' => 'The :attribute number must be numeric',
            'phone.max' => 'The :attribute number must have 11',
            'email.email' => 'The :attribute must be in email format',
            'end-date.after_or_equal:start-date' => 'The :attribute  must be after :start-date',
            'people.between:1,20' => 'The :attribute amount must be at least 1 and maximum 20 people.',
            'file.mimes:pdf,xlsx,jpg,jpeg,png' => 'The :attribute field type must be pdf,xlsx and image.',
            'file.size:10MB' => 'The :attribute field can store maximum 10mB.'
        ];
    }



}
