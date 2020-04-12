@extends('admin.layout.main')
<div class="page-header mt-2">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
            <li class="breadcrumb-item" ><a href="{{route('about.index')}}" title="Danh mục"> Nhãn hiệu </a></li>
            <li class="breadcrumb-item active"> Danh sách</li>
        </ol>
    </div>
<h2 class="text-success text-uppercase ml-2	"><b>SHOW ABOUT</b></h2>
<div class="ml-3">
	
	<p><b>Tên nhãn hiệu : </b>{{$about->title}}</p>
	<p><b>Sdt : </b>{{$about->phone}}</p>
	<p style="width: 1000px;"><b>Mô tả : </b>{{$about->content}}</p>
	<p><b>Email : </b>{{$about->email}}</p>
	<p><b>Logo : </b>{{$about->logo}}</p>
</div>
