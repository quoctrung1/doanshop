@extends('admin.layout.main')
@section('title') Trang chủ
@endsection
@section('content')
<div class="mt-2">
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
        <li class="breadcrumb-item" ><a href="{{route('category.index')}}" title="Danh mục"> Danh mục </a></li>
        <li class="breadcrumb-item active"> Danh sách</li>
    </ol>
</div>
<h4 class="mt-2 ">Quản lí danh mục</h4>
<div class="row ml-1">
    @if (Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message')}}</p> 
    @elseif(Session::has('err'))    
    <p class="alert alert-danger">{{ Session::get('err')}}</p>
    @endif
</div>
<div class="">
    <div class="row">
        <div class="col-9">
            <a href="{{route('category.create')}}" class="btn btn-outline-secondary mb-2 mt-2">Thêm mới</a>
        </div>
        <div class="col-3">
             <form action="">
                <div class="row" style = "margin:0;">
                   <div class="form-group">
                        {{Form::text('name','',['class'=>'form-control','rows' => 4,'placeholder'=>'Tìm sản phẩm ... '])}}
                    </div>
                    <button type="submit" class="btn btn-default" style = "width: 50px;height: 38px;border: 1px solid black;margin-left: 3px;"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
</div>
</div>
</div>
<div class="table-responsive">
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th >STT</th>
            <th >Tên thể loại</th>
            <th >Mô tả</th>
            <th colspan="5"> Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($categories as $key => $category)
            <tr>
                <td >{{ ++$key }}</td>
                <td ><a href="{{route('category.show',$category->id)}}" style="text-decoration: none;color: black;">{{ $category->name }}</a> </td>
                <td ><p style="white-space: nowrap;width: 400px;text-overflow: ellipsis;overflow: hidden;">{{ $category->description }}</p></td>
                <td colspan="5">
                    {{Form::open(['route' => ['category.destroy', $category->id], 'method' => 'DELETE'])}}
                    {{ Form::button('<i class="fas fa-trash-alt text-danger " > Xóa </i>', ['type' => 'submit', 'class' => 'text-danger border-0 btn-link float-left'] )  }} 
                    {{ Form::close() }}
                    <a href="{{route('category.edit',$category->id)}}" class="ml-1"><i class="far fa-edit "> Cập nhật </i></a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
</div>
@endsection
