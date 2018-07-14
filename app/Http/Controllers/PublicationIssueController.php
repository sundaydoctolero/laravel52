<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PublicationIssue;
use App\Http\Requests\PublicationIssueRequest;

class PublicationIssueController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $publicationissues = PublicationIssue::all();
        return view('admin.publicationissues.index',compact('publicationissues'));
    }


    public function create()
    {
        return view('admin.publicationissues.create');
    }


    public function store(PublicationIssueRequest $request)
    {
        $publicationissue = PublicationIssue::create($request->all());
        return redirect('/publicationissues');
    }


    public function show($id)
    {

    }


    public function edit(PublicationIssue $publicationissue)
    {
        return view('admin.publicationissues.edit',compact('publicationissue'));
    }


    public function update(PublicationIssueRequest $request, PublicationIssue $publicationissue)
    {
        $publicationissue->update($request->all());
        return redirect('/publicationissues');
    }


    public function destroy(PublicationIssue $publicationissue)
    {
        $publicationissue->delete();
        return redirect('/publicationissues');
    }
}
