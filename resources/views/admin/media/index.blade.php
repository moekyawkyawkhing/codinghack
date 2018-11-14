@extends('admin')
@section('content')
@if(count($photo) > 0)
<h1>View Post List</h1><hr>
<form class="form-inline" method="POST" action="{{action('AdminMediaController@deleteMedia')}}">
	{{csrf_field()}}
	{{method_field('delete')}}
	<select value="checkBoxArray" class="form-control">
		<option value="delete">Delete</option>
	</select>
	<input type="submit" name="deleteAll" class="btn btn-sm btn-danger" value="submit">

	<table class="table">
		<thead>
			<th><input type="checkbox" class="option"></th>
			<th>No</th>
			<th>Photo</th>
			<th colspan="2">Created Date</th>
			<th>Generate</th>
		</thead>
		<tbody>
			@foreach($photo as $photos)
				<tr>
					<td><input type="checkbox" class="checkbox" name="checkBoxArray[]" value="{{$photos->id}}"></td>
					<td>{{$photos->id}}</td>
					<td><img src="{{asset('postimage/'.$photos->name)}}" width="50" height="50"><td>
					<td>{{$photos->created_at->diffForHumans()}}</td>
					<td>
						<button value="{{$photos->id}}"  class="btn btn-sm btn-danger" name="deleteSingle">Delete</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</form>
	@else
	<h4>No Photo</h4>
@endif
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.option').click(function(){
			if(this.checked){
				$('.checkbox').each(function(){
					this.checked=true;
				});
			}else{
				$('.checkbox').each(function(){
					this.checked=false;
				});
			}
		});
	});
</script>
@endsection
