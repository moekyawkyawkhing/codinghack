@extends('admin')
@section('content')
			@if(count($comment)>0)
	<h4>View comment list</h4><hr>
	<table class="table">
		<thead>
			<th>No</th>
			<th>Owner</th>
			<th>Email</th>
			<th colspan="5">Body</th>
		</thead>
		<tbody>
				@foreach($comment as $comment)
				<tr>
					<td>{{$comment->id}}</td>
					<td>{{$comment->author}}</td>
					<td>{{$comment->email}}</td>
					<td>{{$comment->body}}</td>
					<td><a href="{{route('home.post',$comment->post->id)}}">View post</a></td>
					<td>
						@if($comment->is_active == 1)
							{!!Form::open(['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]])!!}
							<input type="hidden" name="is_active" value="0">
							{!!Form::submit('unapprove',['class'=>'btn btn-sm btn-success'])!!}
							{!!Form::close()!!}
						@endif

						@if($comment->is_active == 0)
							{!!Form::open(['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]])!!}
							<input type="hidden" name="is_active" value="1">
							{!!Form::submit('approve',['class'=>'btn btn-sm btn-info'])!!}
							{!!Form::close()!!}
						@endif
					</td>
					<td>						
						{!!Form::open(['method'=>'DELETE','action'=>['PostCommentController@destroy',$comment->id]])!!}
							{!!Form::submit('delete',['class'=>'btn btn-sm btn-danger'])!!}
						{!!Form::close()!!}
					</td>
				</tr>
				@endforeach
			@else
			<h3>No Comment</h3>
			@endif
		</tbody>
	</table>
@endsection