<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Backup;
use App\Http\Requests\BackupRequest;

class BackupController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {

        $backups = Backup::all();
        return view('admin.backups.index',compact('backups'));
    }


    public function create()
    {
        return view('admin.backups.create');
    }


    public function store(BackupRequest $backup)
    {
        $backup = Backup::create($backup->all());
        return redirect('/backups');
    }


    public function show($id)
    {

    }


    public function edit(Backup $backup)
    {
        return view('admin.backups.edit',compact('backup'));
    }


    public function update(BackupRequest $request, Backup $backup)
    {
        $backup->update($request->all());
        return redirect('/backups');
    }


    public function destroy(Backup $backup)
    {
        $backup->delete();
        return redirect('/backups');
    }
}
