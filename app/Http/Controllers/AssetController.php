<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Asset;
use App\Http\Requests\AssetRequest;

class AssetController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $assets = Asset::all();
        return view('admin.assets.index',compact('assets'));
    }

    public function create()
    {
        return view('admin.assets.create');
    }

    public function store(AssetRequest $request)
    {
        $asset = Asset::create($request->all());
        return redirect('/assets');
    }


    public function show($id)
    {

    }


    public function edit(Asset $asset)
    {
        return view('admin.assets.edit',compact('asset'));
    }


    public function update(AssetRequest $request, Asset $asset)
    {
        $asset->update($request->all());
        return redirect('/assets');
    }


    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect('/assets');
    }
}
