@extends('admin.layout.main')
<div class="page-header mt-2">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
            <li class="breadcrumb-item" ><a href="{{route('brand.index')}}" title="Danh mục">Image </a></li>
            <li class="breadcrumb-item active"> Danh sách</li>
        </ol>
    </div>
<h2 class="text-success text-uppercase ml-2	"><b>SHOW IMAGE</b></h2>
<div class="ml-3">
	
	<p><b>Tên url: </b>{{$image->url}}</p>
</div>
