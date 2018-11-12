@extends('admin')
@section('content')
			@if(count($reply)>0)
	<h4>View reply list</h4><hr>
	<table class="table">
		<thead>
			<th>No</th>
			<th>Owner</th>
			<th>Email</th>
			<th colspan="5">Body</th>
		</thead>
		<tbody>
				@foreach($reply as $reply)
				<tr>
					<td>{{$reply->id}}</td>
					<td>{{$reply->author}}</td>
					<td>{{$reply->email}}</td>
					<td>{{$reply->body}}</td>
					<td><a href="{{url('post/'.$reply->comment->post_id)}}">View post</a></td>
					<td>
						@if($reply->is_active == 1)
							{!!Form::open(['method'=>'PATCH','action'=>['PostCommentReplyController@update',$reply->id]])!!}
							<input type="hidden" name="is_active" value="0">
							{!!Form::submit('unapprove',['class'=>'btn btn-sm btn-success'])!!}
							{!!Form::close()!!}
						@endif

						@if($reply->is_active == 0)
							{!!Form::open(['method'=>'PATCH','action'=>['PostCommentReplyController@update',$reply->id]])!!}
							<input type="hidden" name="is_active" value="1">
							{!!Form::submit('approve',['class'=>'btn btn-sm btn-info'])!!}
							{!!Form::close()!!}
						@endif
					</td>
					<td>						
						{!!Form::open(['method'=>'DELETE','action'=>['PostCommentReplyController@destroy',$reply->id]])!!}
							{!!Form::submit('delete',['class'=>'btn btn-sm btn-danger'])!!}
						{!!Form::close()!!}
					</td>
				</tr>
				@endforeach
			@else
			<h3>No reply</h3>
			@endif
		</tbody>
	</table>
@endsection