<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DownloadRequest extends Request
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
            'dop_on_website'=>'sometimes',
            'website_update_at'=>'sometimes',
            're_pages'=>'sometimes',
            'paper_pages'=>'sometimes',
            'glossy_pages'=>'sometimes',
            'classifieds_pages'=>'sometimes',
            'remarks' => 'sometimes',
            'status' => 'required',
        ];
    }
}
