<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;



class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $articles = Article::all();
        return view('articles.index',compact('articles'));
    }

    public function show(Article $article){
        return view('articles.show',compact('article'));
    }

    public function create(){
            return view('articles.create');
    }

    public function store(ArticleRequest $request){
        $article = Article::create($request->all());
        return redirect('/articles');
    }

    public function edit(Article $article){
        return view('articles.edit',compact('article'));
    }

    public function update(Article $article,ArticleRequest $request){
       $article->update($request->all());
       return redirect('/articles');
    }

    public function destroy(Article $article){
        $article->delete();
        return redirect('/articles');
    }



}
