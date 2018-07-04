<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Menu;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index',compact('menus'));
    }


    public function create()
    {
        return view('admin.menus.create');
    }


    public function store(MenuRequest $request)
    {
        $menu = Menu::create($request->all());
        return redirect('/menus');
    }


    public function show($id)
    {

    }


    public function edit(Menu $menu)
    {
        return view('admin.menus.edit',compact('menu'));
    }


    public function update(MenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());
        return redirect('/menus');
    }


    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect('/menus');
    }
}
