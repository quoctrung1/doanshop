@extends('admin.layout.main')
@section('title','Brand')
@section('content')
<div class="row">
	@if (Session::has('message'))
	<p class="alert alert-success">{{ Session::get('message')}}</p> 
	@elseif(Session::has('err'))    
	<p class="alert alert-danger">{{ Session::get('err')}}</p>
	@endif
</div>
<div class="card">
	<div class="card-header">
		<h1>Brand</h1>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-9">
				<a href="{{route('brand.create')}}" class="btn btn-outline-success mb-2 mt-2">Create New</a>
			</div>
			<div class="col-md-3">
				<form action="">
					<div class="form-group">
						{{Form::text('name','',['class'=>'form-control','placeholder'=>'Search name ... '])}}
					</div>
				</form>
			</div>
		</div>
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th >STT</th>
					<th >Name</th>
					<th>Slug</th>
					<th colspan="5">#</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@foreach($brands as $key => $brand)
					<tr>
						<td >{{ ++$key }}</td>
						<td ><a href="{{route('brand.show',$brand->id)}}" style="text-decoration: none;color: black;">{{ $brand->name }}</a> </td>
						<td>{{$brand->slug}}</td>
						<td colspan="5">
							<div class="row">
								{{Form::open(['route' => ['brand.destroy', $brand->id], 'method' => 'DELETE'])}}
		                        {{ Form::button('<i class="fa fa-trash text-danger"></i>', ['type' => 'submit', 'class' => 'text-danger border-0 btn-link float-left'] )  }} 
		                        {{ Form::close() }}
								<a href="{{route('brand.edit',$brand->id)}}" class="ml-1"><i class="fa fa-edit "></i></a>
							</div>
						</td>
					</tr>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection