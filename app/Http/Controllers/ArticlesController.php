<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index(){

    	$articles = Article::all();

    	return view('articles.index',compact('articles'));
    }

    public function show($id){

    	$articles = Article::findOrFail($id);

    	if(is_null($articles)){
    		abort(404);
    	}
    	return view('articles.show',compact('articles'));
    }
}
