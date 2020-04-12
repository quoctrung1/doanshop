@extends('admin.layout.main')
<div class="page-header mt-2">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
            <li class="breadcrumb-item" ><a href="{{route('product.index')}}" title="Sản phẩm"> Nhãn hiệu </a></li>
            <li class="breadcrumb-item active"> Danh sách</li>
        </ol>
    </div>
<h2 class="text-success text-uppercase ml-2	"><b>SHOW BRAND</b></h2>
<div class="ml-3">
	<p><b>Name : </b>{{$product->name}}</p>
	<p>Mã sản phẩm: {{$product->product_code}}</p>
	<p>Giá:  {{$product->price}}$</p>
	<p>Nhà sản xuất: {{$product->brand->name}} </p>
	<p>Danh mục : {{$product->category->name}} </p>
	<p style="width: 1000px;">Nội dung :{{$product->description}}</p>
</div>