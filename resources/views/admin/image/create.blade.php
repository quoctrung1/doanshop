@extends('admin.layout.main')
@section('title') Trang chủ
@endsection
@section('content')
<div class="page-header mt-2">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
            <li class="breadcrumb-item" ><a href="{{route('brand.index')}}" title="Danh mục">Image </a></li>
            <li class="breadcrumb-item active"> Danh sách</li>
        </ol>
    </div>
<div class="">
	<h3 class="text-success">Brand</h3>
	{{ Form::open(['url' => 'admin/image', 'method' => 'post']) }}
	<div class="row ">
		<div class="form-group col-12">
			{{ Form::label('url','Url : ')}}
			{{ Form::text('url','',['class'=>'form-control'])}}
			<span class="text-danger">{{ $errors->first('url')}}</span>
		</div>	
		<div class="form-group col-12">
				{{ Form::label('created_by','Create : ')}}
				{{ Form::text('created_by','',['class'=>'form-control'])}}
		</div>	
		<div class="form-group col-12">
			{{ Form::label('updated_by','Update : ')}}
			{{ Form::text('updated_by','',['class'=>'form-control'])}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::submit('Lưu',['class'=>'btn btn-outline-success']) }}
		<a class="btn btn-outline-danger" href="">Quay lại</a>
	</div>
	{{ Form::close() }}
</div>
@endsection