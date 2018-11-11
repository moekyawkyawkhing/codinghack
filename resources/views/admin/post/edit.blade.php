@extends('admin')
@section('content')
	<h1>Edit Post</h1><hr>
	@if(session('delete_post'))
		<p class="alert alert-danger">{{session('delete_post')}}</p>
	@endif
	{!!Form::model($post,['method'=>'PATCH','action'=>['AdminPostController@update',$post->id],'files'=>true])!!}

	{!!Form::label('title','Title:')!!}
	{!!Form::text('title',null,['class'=>'form-control'])!!}
	@if($errors->has('title'))
		<span style="color: red;">{{$errors->first('title')}}</span><br>
	@endif

	{!!Form::label('category','Category:')!!}
	{!!Form::select('category_id',$cat,null,['class'=>'form-control'])!!}
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

	{!!Form::submit('Edit Post',['class'=>'btn btn-success'])!!}

	{!!Form::close()!!}

	<div class="pull-right">
		{!!Form::open(['method'=>'DELETE','action'=>['AdminPostController@destroy',$post->id]])!!}

		{!!Form::submit('Delete Post',['class'=>'btn btn-danger'])!!}

		{!!Form::close()!!}
	</div>

@endsection