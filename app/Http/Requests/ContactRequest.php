<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
            'firstname' =>'required',
            'lastname' =>'required',
            'company_name' =>'required',
            'address' =>'required',
            'landline' =>'required',
            'website' =>'required',
            'email' =>'required',
            'mobile_1' =>'required',
            'mobile_2' =>'required',
            'skype_id' =>'required',

        ];
    }
}
