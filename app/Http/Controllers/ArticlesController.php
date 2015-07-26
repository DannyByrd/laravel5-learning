<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Article;
use Auth;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{

    public function __construct(){

        $this->middleware('auth',['only'=>'create']);
    }
    public function index(){

    	$articles = Article::latest('published_at')->published()->get();

    	return view('articles.index',compact('articles'));
    }

    public function show(Article $article){

    	//$articles = Article::findOrFail($id);

    	
    	return view('articles.show',compact('article'));
    }

    public function create(){

        return view('articles.create');
    }

    public function store(ArticleRequest $request){

    
        Auth::user()->articles()->create($request->all());

        flash('Your article has been created');
       
        return redirect('articles');
    } 

    public function edit(Article $article){

      
        return view('articles.edit',compact('article'));
    }

    public function update(Article $article, ArticleRequest $request){

       

        $article->update($request->all());

        return redirect('articles');
    }
}


       