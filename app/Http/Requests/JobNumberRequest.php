<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobNumberRequest extends Request
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
                 'job_number_id'=>'required|digits:4',
                 'job_number_description' =>'required',
                 'month_of' =>'required',
             ];
    }
}
