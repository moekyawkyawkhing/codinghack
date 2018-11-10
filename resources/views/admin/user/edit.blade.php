@extends('admin')
@section('title','Admin')
@section('content')
<h1>Edit User</h1><hr>
@if(session('update_user'))
	<p class="alert alert-success">{{session('update_user')}}</p>
@endif

	{!!Form::model($user,['method'=>'PATCH','action'=>['AdminUserController@update',$user->id],'files'=>true])!!}
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
		{!!Form::select('role_id',$role,null,['class'=>'form-control'])!!}

		{!!Form::label('status','status:')!!}
		{!!Form::select('is_active',[0=>"No Active",1=>"Active"],null,['class'=>'form-control'])!!}

		{!!Form::label('photo','photo:')!!}
		{!!Form::file('photo',['class'=>'form-control'])!!}

		{!!Form::label('password','password:')!!}
		{!!Form::password('password',['class'=>'form-control'])!!}<br>
		@if($errors->has('password'))
			<span style="color: red;">{{$errors->first('password')}}</span><br>
		@endif

		{!!Form::submit('Edit',['class'=>'btn btn-success'])!!}
	{!!Form::close()!!}

	<div class="pull-right">
		{!!Form::open(['method'=>'Delete','route'=>['user.destroy',$user->id]])!!}
			{!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
@endsection