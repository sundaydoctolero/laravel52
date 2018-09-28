<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HolidayRequest extends Request
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
            'holiday_type'=>'required',
            'holiday_name'=>'required',
            'holiday_code'=>'required',
            'holiday_rate'=>'required|numeric',


        ];
    }
}
