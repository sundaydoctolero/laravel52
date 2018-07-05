<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Contact;

use App\Http\Requests\ContactRequest;

use App\User;


class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()

    {
        $contacts = Contact::all();
        return view('admin.contacts.index',compact('contacts'));
    }


    public function create()
    {
        return view('admin.contacts.create');
    }


    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->all());
        return redirect('/contacts');
    }


    public function show($id)
    {

    }


    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit',compact('contact'));
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect('/contacts');
    }


    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect('/contacts');
    }

}