@extends('app')

@section('content')


	<h2>Write a new article</h2>

	<hr>	
	
		{!! Form::open(['url'=>'articles']) !!}
		
			@include('articles.form', ['submitButtonText'=>'Add Article'])


		{!! Form::close() !!}


		@include ('errors.list')


	

@stop