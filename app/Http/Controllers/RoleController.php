<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\Http\Requests\RoleRequest;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }


    public function create()
    {
        return view('admin.roles.create');
    }


    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        return redirect('/roles');
    }


    public function show($id)
    {

    }


    public function edit(Role $role)
    {
        return view('admin.roles.edit',compact('role'));
    }


    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        return redirect('/roles');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('/roles');
    }
}
