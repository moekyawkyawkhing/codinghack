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
			<th>View Post</th>
			<th>Body</th>
			<th>Created Date</th>
			<th>Updated Date</th>
		</thead>
		<tbody>
			@foreach($post as $posts)
			<tr>
				<td><a href="{{route('post.edit',$posts->id)}}">{{$posts->user?$posts->user->name:'no user'}}</a></td>
				<td>{{$posts->category? $posts->category->name : "unactorized"}}</td>
				<td><img class="img-responsive" src="{{$posts->photo? asset('postimage/'.$posts->photo->name) : 'https://via.placeholder.com/150

C/O https://placeholder.com/'}}" width="50" height="50"></td>
				<td>{{$posts->title}}</td>
				<td><a href="{{url('admin/comment')}}">view comment</a></td>
				<td><a href="{{url('post/'.$posts->id)}}">view post</a></td>
				<td>{!!str_limit($posts->body, 50)!!}</td>
				<td>{{$posts->created_at}}</td>
				<td>{{$posts->updated_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div class="row">
		<div class="col-sm-offset-5">
			{{$post->render()}}
		</div>
	</div>
@endsection