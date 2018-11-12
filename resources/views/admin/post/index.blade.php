@extends('admin')
@section('content')
	<h1>View Post List</h1><hr>
	<table class="table">
		<thead>
			<th>Name</th>
			<th>Category Name</th>
			<th>Photo</th>
			<th>Title</th>
			<th>View Comment</th>
			<th>Body</th>
			<th>Created Date</th>
			<th>Updated Date</th>
		</thead>
		<tbody>
			@foreach($post as $post)
			<tr>
				<td><a href="{{route('post.edit',$post->id)}}">{{$post->user->name}}</a></td>
				<td>{{$post->category? $post->category->name : "unactorized"}}</td>
				<td><img class="img-responsive" src="{{$post->photo_id? asset('postimage/'.$post->photo->name) : 'http://placehold.it/400×400'}}" width="50" height="50"></td>
				<td>{{$post->title}}</td>
				<td><a href="{{url('admin/comment')}}">view comment</a></td>
				<td>{{$post->body}}</td>
				<td>{{$post->created_at}}</td>
				<td>{{$post->updated_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection