@extends('admin')
@section('title','Create User')
@section('content')
<h1>Create User</h1><hr>
	{!!Form::open(['method'=>'POST','action'=>'AdminUserController@store','files'=>true])!!}
		{!!Form::label('name','name:')!!}
		{!!Form::text('name',null,['class'=>'form-control'])!!}

		{!!Form::label('email','email:')!!}
		{!!Form::email('email',null,['class'=>'form-control'])!!}

		{!!Form::label('role','role:')!!}
		{!!Form::select('role',[""=>"---choose role---"]+$role,null,['class'=>'form-control'])!!}

		{!!Form::label('status','status:')!!}
		{!!Form::select('active',[0=>"No Active",1=>"Active"],null,['class'=>'form-control'])!!}

		{!!Form::label('photo','photo:')!!}
		{!!Form::file('photo',['class'=>'form-control'])!!}

		{!!Form::label('password','password:')!!}
		{!!Form::password('password',['class'=>'form-control'])!!}<br>

		{!!Form::submit('Create',['class'=>'btn btn-success'])!!}

	{!!Form::close()!!}
@endsection
