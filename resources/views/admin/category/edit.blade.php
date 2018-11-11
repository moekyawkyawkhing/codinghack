@extends('admin')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h5>Create Category</h5><hr>
			{!!Form::model($cat,['method'=>'PATCH','action'=>['AdminCategoryController@update',$cat->id]])!!}
				{!!Form::label('name','Name:')!!}
				{!!Form::text('name',null,['class'=>'form-control'])!!}<br>
				@if($errors->has('name'))
					<span style="color:red;">{{$errors->first('name')}}</span><br>
				@endif

				{!!Form::submit('Edit Category',['class'=>'btn btn-success'])!!}
			{!!Form::close()!!}
		</div>
	</div>
	<div class="row">
		<div class="col pt-2 pull-right">
				{!!Form::open(['method'=>'DELETE','action'=>['AdminCategoryController@destroy',$cat->id]])!!}
					{!!Form::submit('Delete Category',['class'=>'btn btn-danger'])!!}
				{!!Form::close()!!}				
		</div>
	</div>
@endsection