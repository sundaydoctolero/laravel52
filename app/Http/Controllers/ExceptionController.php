<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ExceptionRequest;
use App\Exception;
use DB;


class ExceptionController extends Controller
{
    public $view_path = 'admin.exceptions';

    public $url_path = '/exceptions';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        $exceptions = Exception::with('user.employee')->orderBy('exception_type')->get();


        return view($this->view_path.'.index',compact('exceptions'));
    }

    public function create() {

        return view($this->view_path.'.create');
    }

    public function store(ExceptionRequest $request)
    {
        $exceptions = Exception::create($request->all());
        return redirect($this->url_path);
    }

    public function show($id)
    {

    }

    public function edit(Exception $exception)
    {
        return view($this->view_path.'.edit',compact('exception'));
    }


    public function update(ExceptionRequest $request, Exception $exception)
    {
        $exception->update($request->all());
        return redirect($this->url_path);
    }


    public function destroy(Exception $exception)
    {
        $exception->delete();
        return redirect($this->url_path);
    }

}
