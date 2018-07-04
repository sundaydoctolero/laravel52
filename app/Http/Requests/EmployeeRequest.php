<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployeeRequest extends Request
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

            'firstname'=>'required',
            'lastname'=>'required',
            'birthdate'=>'required',
            'gender'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'designation'=>'required',
            'date_hired'=>'required',

];
}
}
