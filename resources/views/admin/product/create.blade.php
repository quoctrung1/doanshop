@extends('admin.layout.main')
@section('title') Trang chủ
@endsection
@section('content')
<div class="page-header mt-2">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
            <li class="breadcrumb-item" ><a href="{{route('product.index')}}" title="Sản phẩm"> Nhãn hiệu </a></li>
            <li class="breadcrumb-item active"> Danh sách</li>
        </ol>
    </div>
<div class="">
	<h3 class="text-success">Product</h3>
	{{ Form::open(['url' => 'admin/product', 'method' => 'post']) }}
	<div class="row">
		<div class="col-8">
			<div class="form-group">
				{{ Form::label('product_code','Product Code : ')}}
				{{ Form::text('product_code',uniqid(),['class'=>'form-control'])}}
				<span class="text-danger">{{ $errors->first('product_code')}}</span>
			</div>
			<div class="form-group">
				{{ Form::label('name','Sản phẩm : ')}}
				{{ Form::text('name','',['class'=>'form-control'])}}
				<span class="text-danger">{{ $errors->first('name')}}</span>
			</div>
			<div class="form-group">
				{{ Form::label('description','Mô tả : ')}}
				{{ Form::textarea('description','',['class'=>'form-control','rows' => 4])}}
				<span class="text-danger">{{ $errors->first('description')}}</span>
			</div>
			<div class="form-group">
				{{Form::label('Image:')}} <br/>
                {{Form::file('image',null,['class' => " form-control"])}}
			</div>
			<div class="form-group">
				{{ Form::label('created_by','Create : ')}}
				{{ Form::text('created_by','',['class'=>'form-control'])}}
			</div>	
			<div class="form-group">
				{{ Form::label('updated_by','Update : ')}}
				{{ Form::text('updated_by','',['class'=>'form-control'])}}
			</div>	
		</div>
		<div class="col-4">
			<div class="form-group">
				{{ Form::label('price','Gía tiền : ')}}
				{{ Form::number('price','',['class'=>'form-control'])}}
				<span class="text-danger">{{ $errors->first('price')}}</span>
			</div>
			<div class="form-group">
				{{ Form::label('quantity','Chất lượng : ')}}
				{{ Form::text('quantity','',['class'=>'form-control'])}}
				
				<span class="text-danger">{{ $errors->first('quantity')}}</span>
			</div>
			<div class="form-group">
				{{ Form::label('promotion','Khuyến mãi : ')}}
				{{ Form::number('promotion','',['class'=>'form-control'])}}
				<span class="text-danger">{{ $errors->first('promotion')}}</span>
			</div>
			<div class="form-group">
                {{Form::label('Nhà sản xuất:')}}
                {{Form::select('brand_id',$brand,null,['class' => " form-control",'placeholder'=>'Chọn nhà sản xuất'])}}
                @if ($errors->has('brand_id'))
                    <div class="text-danger">{{ $errors->first('brand_id') }}</div>
                @endif
            </div>
			<div class="form-group">
                {{Form::label('Thể loại:')}}
                {{Form::select('category_id',$category,null,['class' => " form-control",'placeholder'=>'Chọn thể loại'])}}
                @if ($errors->has('category_id'))
                    <div class="text-danger">{{ $errors->first('category_id') }}</div>
                @endif
            </div>

		</div>
	</div>
	<div class="form-group">
		{{ Form::submit('Lưu',['class'=>'btn btn-outline-success']) }}
		<a class="btn btn-outline-danger" href="">Quay lại</a>
	</div>
	{{ Form::close() }}
</div>
@endsection