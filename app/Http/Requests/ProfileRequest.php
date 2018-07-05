<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class ProfileRequest extends Request
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
            'name' => 'required',
            //'username'=>'required|unique:users',
            //'email'=>'required|email|unique:users,email',
            'password'=>'sometimes|confirmed',
            'old_password' => 'required|old_password:' . Auth::user()->password,
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

    public function messages()
    {
        return [
            'old_password' => 'Your password is incorrect!',
        ];
    }
}
