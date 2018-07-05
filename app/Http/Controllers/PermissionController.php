<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permission;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }


    public function create()
    {
        return view('admin.permissions.create');
    }


    public function store(PermissionRequest $permission)
    {
        $permission = Permission::create($permission->all());
        return redirect('/permissions');
    }


    public function show($id)
    {

    }


    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit',compact('permission'));
    }


    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());
        return redirect('/permissions');
    }


    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect('/permissions');
    }
}
