@extends('admin')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<h5>Create Category</h5><hr>
			@if(session('delete_cat'))
				<p class="alert alert-danger">{{session('delete_cat')}}</p>
			@endif

			{!!Form::open(['method'=>'POST','action'=>'AdminCategoryController@store'])!!}
				{!!Form::label('name','Name:')!!}
				{!!Form::text('name',null,['class'=>'form-control'])!!}<br>
				@if($errors->has('name'))
					<span style="color:red;">{{$errors->first('name')}}</span><br>
				@endif

				{!!Form::submit('Create Category',['class'=>'btn btn-success'])!!}
			{!!Form::close()!!}
		</div>
		<div class="col-md-6">
			<h5>View Category List</h5><hr>
			<table class="table">
			<thead>
				<th>No</th>
				<th>Name</th>
				<th>Created Date</th>
				<th>Updated Date</th>
			</thead>
			<tbody>
				@foreach($cat as $cat)
				<tr>
					<td>{{$cat->id}}</td>
					<td><a href="{{route('category.edit',$cat->id)}}">{{$cat->name}}</a></td>
					<td>{{$cat->created_at->diffForHumans()}}</td>
					<td>{{$cat->updated_at->diffForHumans()}}</td>
				</tr>
				@endforeach
			</tbody>
			</table>
		</div>
	</div>
@endsection