<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(UserRequest $request){
        $user = User::create($request->all());
        $user->employee()->save(new Employee(['department_id'=>1]));

        $this->saveImage($request->file('user_photo'));
        return redirect('/users');
    }

    public function edit(User $user){
        return view('admin.users.edit',compact('user'));
    }

    public function update(User $user,UpdateUserRequest $request){
        $user->update($request->all());
        $this->saveImage($request->file('user_photo'));
        return redirect('/users');
    }

    public function reset(User $user){
        $user->update(['password'=>'1234']);
        flash('Password has been reset to 1234 for '.$user->name)->success();
        return redirect('/users');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect('/users');
    }

    public function saveImage($image){
        if($image != null){
            $filename = $image->getClientOriginalName();
            $image->move(base_path().'/public/images/userprofile/',$filename);
        }
    }

}
