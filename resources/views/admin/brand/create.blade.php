@extends('admin.layout.main')
@section('title','Brand')
@section('content')
<div class="card">
	<div class="card-header">
		<h1>Brand</h1>
	</div>
	<div class="row">
		{{ Form::open(['url' => 'admin/brand', 'method' => 'post']) }}
		<div class="form-group col-md-12">
			{{ Form::label('name','Name : ')}}
			{{ Form::text('name','',['class'=>'form-control col-md-8'])}}
			<span class="text-danger">{{ $errors->first('name')}}</span>
		</div>
		<div class="form-group col-md-12">
			{{ Form::label('description','Description : ')}}
			<br>
			<textarea name=description id="editor" cols="" rows="10" class="col-md-8"></textarea>
			<br>
			<span class="text-danger">{{ $errors->first('description')}}</span>
		</div>		
		<div class="form-group col-md-12">
			{{ Form::submit('Save',['class'=>'btn btn-success']) }}
			<a class="btn btn-danger" href="{{route('brand.index')}}">Back</a>
		</div>
		{{ Form::close() }}
	</div>
</div>
@endsection