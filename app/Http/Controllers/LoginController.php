<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Login;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $logins = Login::all();
        return view('admin.logins.index',compact('logins'));
    }


    public function create()
    {
        return view('admin.logins.create');
    }


    public function store(LoginRequest $login)
    {
        $login = Login::create($login->all());
        return redirect('/logins');
    }


    public function show($id)
    {

    }

    public function edit(Login $login)
    {
        return view('admin.logins.edit',compact('login'));
    }


    public function update(LoginRequest $request, Login $login)
    {
        $login->update($request->all());
        return redirect('/logins');
    }


    public function destroy(Login $login)
    {
        $login->delete();
        return redirect('/logins');
    }
}
