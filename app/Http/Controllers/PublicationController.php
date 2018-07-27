<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Publication;
use App\Http\Requests\PublicationRequest;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(Request $request)
    {
        //if($request){
          //  $publications = Publication::whereHas('days',function($q) use ($request){
            //    $q->whereIn('id',$request->filter_list);
            //})->get();
        //}else {
            $publications = Publication::all();
        //}

        $publications->load('states','days');

        return view('admin.publications.index',compact('publications'));
    }


    public function create()
    {
        return view('admin.publications.create');
    }


    public function store(PublicationRequest $request)
    {
        $publication = Publication::create($request->all());
        $publication->states()->attach($request->state_list);
        $publication->days()->attach($request->day_list);
        return redirect('/publications');
    }


    public function show($id)
    {

    }


    public function edit(Publication $publication)
    {
        return view('admin.publications.edit',compact('publication'));
    }


    public function update(PublicationRequest $request, Publication $publication)
    {
        $publication->update($request->all());
        $publication->states()->sync($request->state_list);
        $publication->days()->sync($request->day_list);
        return redirect('/publications');
    }


    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect('/publications');
    }
}
