@extends('layouts.blog-post')
@section('content')
	<div class="col-md-8">
            <!-- First Blog Post -->
            <h2>
                <a href="#">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{$post->user->name}}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
            <hr>
          	@if($post->photo_id == null)
          		<img class="img-responsive" src="http://placehold.it/900x300" alt="">
          		@else
          		<img src="{{asset('postimage/'.$post->photo->name)}}" width="100%" height="250">
          	@endif
            <hr>
            <p>{{$post->body}}</p>

@if(Auth::check())
           	 <!--Comment Form!-->
            	{!!Form::open(['method'=>'POST','action'=>'PostCommentController@store'])!!}
            	<input type="hidden" name="post_id" value="{{$post->id}}">
            		{!!Form::label('comment','Type a comment:')!!}
            		{!!Form::textarea('comment',null,['class'=>'form-control','rows'=>'2'])!!}<br>

            		{!!Form::submit('Comment',['class'=>'btn btn-info'])!!}
            	{!!Form::close()!!}
            <!--End Comment Form!-->

    @foreach($comment as $comment)
      @if($comment->is_active == 1)
    <!-- Comment -->
      <div class="media">
        <a class="pull-left" href="#">
            <img height="64" class="media-object" src="{{$comment->photo? asset('image/'.$comment->photo) : 'http://placehold.it/400×400'}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            <p>{{$comment->body}}</p>

            @if(count($comment->replies) > 0)
              @foreach($comment->replies as $reply)
                @if($reply->is_active == 1)
            <!-- Nested Comment -->
            <div id="nested-comment" class=" media">
              <a class="pull-left" href="#">
                  <img height="64" class="media-object" src="{{$reply->photo? asset('image/'.$reply->photo) : 'http://placehold.it//400×400'}}" alt="">
              </a>
              <div class="media-body">
                  <h4 class="media-heading">{{$reply->author}}
                  <small>{{$reply->created_at->diffForHumans()}}</small>
                  </h4>
                  <p>{{$reply->body}}</p>
              </div>
            </div>
            <!-- End Nested Comment -->
                @endif
              @endforeach
            @endif
             <div>
              {!!Form::open(['method'=>'POST','route'=>'comment.reply'])!!}

                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                {!!Form::label('reply','reply')!!}
                {!!Form::textarea('reply',null,['class'=>'form-control','rows'=>1])!!}<br>
                {!!Form::submit('Reply',['class'=>'btn btn-sm btn-info pull-right'])!!}
              {!!Form::close()!!}
            </div>
        </div>
      </div>

    <!-- End Comment -->
      @endif
    @endforeach
@endif
    </div>
@endsection



