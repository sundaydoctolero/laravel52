<?php

namespace App\Http\Controllers;

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
        User::create($request->all());
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
