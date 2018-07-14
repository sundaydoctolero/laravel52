<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PublicationType;
use App\Http\Requests\PublicationTypeRequest;

class PublicationTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $publicationtypes = PublicationType::all();
        return view('admin.publicationtypes.index',compact('publicationtypes'));
    }


    public function create()
    {
        return view('admin.publicationtypes.create');
    }


    public function store(PublicationTypeRequest $request)
    {
        $publicationtype = PublicationType::create($request->all());
        return redirect('/publicationtypes');
    }


    public function show($id)
    {

    }


    public function edit(PublicationType $publicationtype)
    {
        return view('admin.publicationtypes.edit',compact('publicationtype'));
    }


    public function update(PublicationTypeRequest $request, PublicationType $publicationtype)
    {
        $publicationtype->update($request->all());
        return redirect('/publicationtypes');
    }


    public function destroy(PublicationType $publicationtype)
    {
        $publicationtype->delete();
        return redirect('/publicationtypes');
    }
}
