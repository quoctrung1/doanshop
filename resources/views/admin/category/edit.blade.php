@extends('admin.layout.main')
@section('title','Edit Category')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="">Admin</a></li>
		<li class="breadcrumb-item" ><a href="{{route('category.index')}}" title="Danh mục">Category</a></li>
		<li class="breadcrumb-item active">Edit</li>
	</ol>
</div>
<div class="card mt-3">
	<div class="card-body col-md-12">
		{{Form::open(['route'=>['category.update',$category->id],'method'=>'put'])}}
		<input type="hidden" name="id" value="{{$category->id}}" placeholder="">
		<div class="form-group col-12">
			{{ Form::label('name','Name : ')}}
			{{ Form::text('name',$category->name,['class'=>'form-control col-md-8'])}}
			<span class="text-danger">{{ $errors->first('name')}}</span>
		</div>
		<div class="form-group col-12">
			{{ Form::label('description','Description : ')}}
				<br>
				{{ Form::textarea('description',$category->description,['id'=>'editor'])}}
				<br>
			<span class="text-danger">{{ $errors->first('description')}}</span>
		</div>
	<div class="form-group col-md-12">
		{{ Form::submit('Update',['class'=>'btn btn-success']) }}
		<a class="btn btn-danger" href="{{route('category.index')}}">Back</a>
	</div>
	{{ Form::close() }}
	</div>
</div>
@endsection