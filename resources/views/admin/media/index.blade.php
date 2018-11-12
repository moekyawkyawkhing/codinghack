@extends('admin')
@section('content')
	<h1>View Post List</h1><hr>
	<table class="table">
		<thead>
			<th>No</th>
			<th>Photo</th>
			<th>Created Date</th>
		</thead>
		<tbody>
			@foreach($photo as $photo)
				<tr>
					<td>{{$photo->id}}</td>
					<td><img src="{{asset('postimage/'.$photo->name)}}" width="50" height="50"><td>
					<td>{{$photo->created_at->diffForHumans()}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection