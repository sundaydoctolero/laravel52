<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PublicationRequest extends Request
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
            'publication_name' =>'required',
            'website' =>'required',
            'issue' =>'required',
            'username' =>'required',
            'password' =>'required',
            'state_list' =>'required',
            'publication_type' =>'required',
        ];
    }
}
