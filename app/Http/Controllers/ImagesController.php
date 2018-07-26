<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Http\Requests\ImagesRequest;
use App\Http\Requests;

class ImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $images = Image::all();
        return view('admin.images.index',compact('images'));
    }

    public function create()
    {
        return view('admin.images.create');
    }


    public function store(ImagesRequest $images)
    {
        $images = Image::create($images->all());
        return redirect('/site_images');
    }

    public function edit(Image $images)
    {
        return view('admin.images.edit',compact('images'));
    }


    public function update(ImagesRequest $request, Image $images)
    {
        $images->update($request->all());
        return redirect('/site_images');
    }


    public function destroy(Image $images)
    {
        $images->delete();
        return redirect('/site_images');
    }

}
