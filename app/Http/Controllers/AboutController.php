<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\About;
use App\Http\Requests\AboutRequest;

class AboutController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        $abouts = About::all();
        return view('admin.abouts.index', compact('abouts'));
    }


    Public function show ($about){
        return view('admin.about.show', compact('about'));

    }
    public function create(){
        return view('admin.abouts.create');
    }
    public function store(AboutRequest $request){
        $about = About::create($request->all());
        return redirect('/abouts');
    }
    public function edit (About $about){
        return view('admin.abouts.edit', compact('about'));

    }
    public function update(About $about, AboutRequest $request){

        $about->update($request->all());
        return redirect('/abouts');

    }

    public function destroy(About $about){
        $about-> delete();
        return redirect('abouts');

    }

}
