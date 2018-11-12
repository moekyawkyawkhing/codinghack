@extends('admin')
@section('title','Create User')
@section('content')
<h1>Create User</h1><hr>
	{!!Form::open(['method'=>'POST','action'=>'AdminUserController@store','files'=>true])!!}
		{!!Form::label('name','name:')!!}
		{!!Form::text('name',null,['class'=>'form-control'])!!}
		@if($errors->has('name'))
			<span style="color: red;">{{$errors->first('name')}}</span><br>
		@endif

		{!!Form::label('email','email:')!!}
		{!!Form::email('email',null,['class'=>'form-control'])!!}
		@if($errors->has('email'))
			<span style="color: red;">{{$errors->first('email')}}</span><br>
		@endif

		{!!Form::label('role','role:')!!}
		{!!Form::select('role',[0=>"---choose role---"]+$role,null,['class'=>'form-control'])!!}

		{!!Form::label('status','status:')!!}
		{!!Form::select('active',[0=>"No Active",1=>"Active"],null,['class'=>'form-control'])!!}

		{!!Form::label('photo','photo:')!!}
		{!!Form::file('photo',['class'=>'form-control'])!!}

		{!!Form::label('password','password:')!!}
		{!!Form::password('password',['class'=>'form-control'])!!}<br>
		@if($errors->has('password'))
			<span style="color:red;">{{$errors->first('password')}}</span><br>
		@endif

		{!!Form::submit('Create',['class'=>'btn btn-success'])!!}

	{!!Form::close()!!}
@endsection
