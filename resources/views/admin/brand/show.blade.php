@extends('admin.layout.main')
<div class="page-header mt-2">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
            <li class="breadcrumb-item" ><a href="{{route('brand.index')}}" title="Danh mục"> Nhãn hiệu </a></li>
            <li class="breadcrumb-item active"> Danh sách</li>
        </ol>
    </div>
<h2 class="text-success text-uppercase ml-2	"><b>SHOW BRAND</b></h2>
<div class="ml-3">
	
	<p><b>Tên nhãn hiệu : </b>{{$brand->name}}</p>
	<p style="width: 1000px;"><b>Mô tả : </b>{{$brand->description}}</p>

</div>
