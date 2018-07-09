<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TsheetRequest extends Request
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
            'jobnumber_id' =>'required',
            'total_records' =>'sometimes',
            'remarks' =>'sometimes',

        ];
    }
}
