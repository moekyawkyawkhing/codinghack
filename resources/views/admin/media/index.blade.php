@extends('admin')
@section('content')
@if(count($photo) > 0)
<h1>View Post List</h1><hr>
	<table class="table">
		<thead>
			<th>No</th>
			<th>Photo</th>
			<th colspan="2">Created Date</th>
			<th>Generate</th>
		</thead>
		<tbody>
			@foreach($photo as $photo)
				<tr>
					<td>{{$photo->id}}</td>
					<td><img src="{{asset('postimage/'.$photo->name)}}" width="50" height="50"><td>
					<td>{{$photo->created_at->diffForHumans()}}</td>
					<td>
						{!!Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]])!!}
							{!!Form::submit('Delete',['class'=>'btn btn-sm btn-danger'])!!}
						{!!Form::close()!!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@else
	<h4>No Photo</h4>
@endif
@endsection