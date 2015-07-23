<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Article;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index(){

    	$articles = Article::latest('published_at')->published()->get();

    	return view('articles.index',compact('articles'));
    }

    public function show($id){

    	$articles = Article::findOrFail($id);

    	if(is_null($articles)){
    		abort(404);
    	}
    	return view('articles.show',compact('articles'));
    }

    public function create(){

        return view('articles.create');
    }

    public function store(){

        Article::create(Request::all());

        return redirect('articles');
    }
}


       