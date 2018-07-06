<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Role;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(){
        $admins = Admin::all();
        return view('admin.admins.index',compact('admins'));
    }

    public function create(){
        return view('admin.admins.create');
    }

    public function store(AdminRequest $request){
        $admin = Admin::create($request->all());
        $admin->roles()->attach($request->role_list);

        //$this>saveImage($request->file('user_photo'));
        return redirect('/admins');
    }

    public function edit(Admin $admin){
        return view('admin.admins.edit',compact('admin'));
    }

    public function update(Admin $admin,UpdateAdminRequest $request){
        $admin->update($request->all());
        $admin->roles()->sync($request->role_list);
        //$this->saveImage($request->file('user_photo'));
        return redirect('/admins');
    }

    public function reset(Admin $admin){
        $admin->update(['password'=>'ccc123!@#']);
        flash('Admin reset to ccc123!@# for'.$admin->name)->success()->important();
        return redirect('/admins');
    }

    public function destroy(Admin $admin){
        $admin->delete();
        return redirect('/admins');
    }

    public function saveImage($image){
        if($image != null){
            $filename = $image->getClientOriginalName();
            $image->move(base_path().'/public/images/userprofile/',$filename);
        }
    }

}
