@extends('admin')
@section('title','Admin')
@section('content')
	<div>
	<h1>User</h1><hr>
	@if(session('delete_user'))
		<p class="alert alert-danger">{{session('delete_user')}}</p>
	@endif
	<table class="table">
		<thead>
			<th>Photo</th>
			<th>Name</th>
			<th>Email</th>
			<th>Status</th>
			<th>Role</th>
			<th>created date</th>
			<th>updated date</th>
		</thead>
		<tbody>
			@foreach($user as $user)
			<tr>
				<td>@if($user->photo)
						<img src="{{asset('image/'.$user->photo->name)}}" width="50" height="50">
					@else
						Not Used
					@endif
				</td>
				<td><a href="{{route('user.edit',$user->id)}}">{{$user->name}}</a></td>
				<td>{{$user->email}}</td>
				<td>{{$user->is_active == 1 ? "Active User":"No Active User"}}</td>
				<td>{{$user->role ? $user->role->name : "user has no role"}}</td>
				<td>{{$user->created_at->diffForHumans()}}</td>
				<td>{{$user->updated_at->diffForHumans()}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>	
	</div>
@endsection