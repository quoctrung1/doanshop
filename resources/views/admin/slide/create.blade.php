@extends('admin.layout.main')
@section('title','Create slide')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="">Admin</a></li>
		<li class="breadcrumb-item" ><a href="{{route('slide.index')}}" title="Danh mục">Slide</a></li>
		<li class="breadcrumb-item active">Create</li>
	</ol>
</div>
<div class="card">
	<div class="card-header">
		<b class="h4">Create slide</b>
	</div>
	<div class="card-body">	
		{{ Form::open(['url' => 'admin/slide', 'method' => 'post']) }}
		<div class="row ">
			<div class="form-group col-6 {{ $errors->has('link') ?'has-error':'' }}">
				{{ Form::label('link','Link : ')}}
				{{ Form::text('link','',['class'=>'form-control'])}}
				<span class="text-danger">{{ $errors->first('link')}}</span>
			</div>
			<div class="form-group col-6 {{ $errors->has('url_img') ?'has-error':'' }}">
				{{ Form::label('url_img','Url img : ')}}
				{{ Form::text('url_img','',['class'=>'form-control'])}}
				<span class="text-danger">{{ $errors->first('url_img')}}</span>
			</div>	
			<div class="form-group col-6 {{ $errors->has('display_order') ?'has-error':'' }}">
				{{ Form::label('display_order','Display Order : ')}}
				{{ Form::text('display_order','',['class'=>'form-control'])}}
				<span class="text-danger">{{ $errors->first('display_order')}}</span>
			</div>
		</div>
		<div class="form-group">
			{{ Form::submit('Save',['class'=>'btn btn-success']) }}
			<a class="btn btn-danger" href="{{route('slide.index')}}">Back</a>
		</div>
		{{ Form::close() }}
	</div>
</div>
@endsection