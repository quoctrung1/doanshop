@extends('admin.layout.main')
@section('title') Trang chủ
@endsection
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
        <li class="breadcrumb-item" ><a href="{{route('category.index')}}" title="Danh mục"> Danh mục </a></li>
        <li class="breadcrumb-item active"> Danh sách</li>
    </ol>
</div>
<div class="">
	<h3 class="text-success text-uppercase "><b>Category</b></h3>
	{{Form::open(['route'=>['category.update',$category->id],'method'=>'put'])}}
	<div class="row ">
		
			<div class="form-group col-12">
				{{ Form::label('name','Thể loại : ')}}
				{{ Form::text('name',$category->name,['class'=>'form-control'])}}
				<span class="text-danger">{{ $errors->first('name')}}</span>
			</div>
			<div class="form-group col-12">
				{{ Form::label('description','Mô tả : ')}}
				{{Form::text('description',$category->description,['class'=>'form-control'])}}
				<span class="text-danger">{{ $errors->first('description')}}</span>
			</div>
			<div class="form-group col-12">
				{{ Form::label('created_by','Create : ')}}
				{{ Form::text('created_by',$category->created_by,['class'=>'form-control'])}}
			</div>	
			<div class="form-group col-12">
				{{ Form::label('updated_by','Update : ')}}
				{{ Form::text('updated_by',$category->updated_by,['class'=>'form-control'])}}
			</div>	
	</div>
	<div class="form-group">
		{{ Form::submit('Lưu',['class'=>'btn btn-outline-success']) }}
		<a class="btn btn-outline-danger" href="">Quay lại</a>
	</div>
	{{ Form::close() }}
</div>
@endsection