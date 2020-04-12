@extends('admin.layout.main')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
        <li class="breadcrumb-item" ><a href="{{route('category.index')}}" title="Danh mục"> Danh mục </a></li>
        <li class="breadcrumb-item active"> Danh sách</li>
    </ol>
</div>
<h2 class="text-success ml-2	"><b>Show Category</b></h2>
<div class="ml-3">
	<p><b>D : </b>{{$category->name}}</p>
	<p style="width: 1000px;"><b>Danh mục : </b>{{$category->description}}</p>
</div>
