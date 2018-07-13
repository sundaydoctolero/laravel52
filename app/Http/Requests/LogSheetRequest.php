<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LogSheetRequest extends Request
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

            'sale_rent' => 'required',
            'operators' => 'required',
            'batch_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'sometimes|required',
            'total_time' => 'sometimes|required',
            'records' => 'sometimes|required',
            'status' => 'required',
            'remarks' => 'sometimes',

        ];
    }
}
