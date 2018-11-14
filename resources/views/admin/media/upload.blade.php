@extends('admin')
@section('style')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection
@section('content')
	{!!Form::open(['method'=>'POST','action'=>'AdminMediaController@store','class'=>'dropzone'])!!}
		
	{!!Form::close()!!}
@endsection
@section('script')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection