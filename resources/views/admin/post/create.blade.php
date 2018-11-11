@extends('admin')
@section('content')
	<h1>Create Post</h1><hr>
	
	{!!Form::open(['method'=>'POST','action'=>'AdminPostController@store','files'=>true])!!}

	{!!Form::label('title','Title:')!!}
	{!!Form::text('title',null,['class'=>'form-control'])!!}
	@if($errors->has('title'))
		<span style="color: red;">{{$errors->first('title')}}</span><br>
	@endif

	{!!Form::label('category','Category:')!!}
	{!!Form::select('category_id',[''=>'---choose category---']+$cat,null,['class'=>'form-control'])!!}
	@if($errors->has('category_id'))
		<span style="color: red;">{{$errors->first('category_id')}}</span><br>
	@endif

	{!!Form::label('body','Body:')!!}
	{!!Form::textarea('body',null,['class'=>'form-control'])!!}
	@if($errors->has('body'))
		<span style="color: red;">{{$errors->first('body')}}</span><br>
	@endif

	{!!Form::label('photo','Photo:')!!}
	{!!Form::file('photo',['class'=>'form-control'])!!}

	{!!Form::submit('Create Post',['class'=>'btn btn-success'])!!}

	{!!Form::close()!!}

@endsection