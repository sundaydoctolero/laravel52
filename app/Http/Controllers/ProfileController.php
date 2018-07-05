<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\ProfileRequest;

use App\Profile;

use App\User;
use App\Employee;





class ProfileController extends Controller
{

    public function edit(Employee $employee){
        return view('agent.myprofile.edit',compact('employee'));
    }

    public function update(Employee $employee,Requests\ProfileRequest $request){
        $employee->update($request->all());
        $employee->user()->update($request->all());
        $this->saveImage($request->file('user_photo'));
        flash('Updated Successfully!')->success();
        return redirect()->back();
    }

    public function saveImage($image){
        if($image != null){
            $filename = $image->getClientOriginalName();
            $image->move(base_path().'/public/images/userprofile/',$filename);
        }
    }
}
