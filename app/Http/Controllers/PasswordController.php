<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Password;

use App\Http\Requests\PasswordRequest;

use App\Http\Requests\UpdatePasswordRequest;
class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $passwords = Password::all();
        return view('admin.passwords.index',compact('passwords'));
    }

    public function create(){
        return view('admin.passwords.create');
    }

    public function store(PasswordRequest $request){
        Password::create($request->all());
        return redirect('/passwords');
    }

    public function edit(Password $password){
        return view('admin.passwords.edit',compact('password'));
    }

    public function update(Password $password,PasswordRequest $request){
        $password->update($request->all());
        return redirect('/passwords');
    }

    public function destroy(Password $password){
        $password->delete();
        return redirect('/passwords');
    }

}