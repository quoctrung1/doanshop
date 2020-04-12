@extends('admin.layout.main')
@section('title') Trang chủ
@endsection
@section('content')
<div class="page-header mt-2">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
            <li class="breadcrumb-item" ><a href="{{route('about.index')}}" title="Danh mục"> Nhãn hiệu </a></li>
            <li class="breadcrumb-item active"> Danh sách</li>
        </ol>
    </div>
<div class="">
	<h3 class="text-success">About</h3>
	{{Form::open(['route'=>['about.update',$about->id],'method'=>'put'])}}
	<div class="row ">
		
		<div class="form-group col-12">
			{{ Form::label('title','Title : ')}}
			{{ Form::text('title',$about->title,['class'=>'form-control'])}}
			<!-- <span class="text-danger">{{ $errors->first('name')}}</span> -->
		</div>
		<div class="form-group col-12">
			{{ Form::label('phone','Số điện thoại : ')}}
			{{ Form::text('phone',$about->phone,['class'=>'form-control'])}}
			<!-- <span class="text-danger">{{ $errors->first('description')}}</span> -->
		</div>	
		<div class="form-group col-12">
			{{ Form::label('content','Nội dung : ')}}
			{{ Form::text('content',$about->content,['class'=>'form-control'])}}
			<!-- <span class="text-danger">{{ $errors->first('name')}}</span> -->
		</div>
		<div class="form-group col-12">
			{{ Form::label('email','Email : ')}}
			{{ Form::text('email',$about->email,['class'=>'form-control'])}}
			<!-- <span class="text-danger">{{ $errors->first('name')}}</span> -->
		</div>
		<div class="form-group col-12">
			{{ Form::label('logo','Logo : ')}}
			{{ Form::text('logo',$about->logo,['class'=>'form-control'])}}
			<!-- <span class="text-danger">{{ $errors->first('name')}}</span> -->
		</div>

	</div>
	<div class="form-group">
		{{ Form::submit('Lưu',['class'=>'btn btn-outline-success']) }}
		<a class="btn btn-outline-danger" href="">Quay lại</a>
	</div>
	{{ Form::close() }}
</div>
@endsection