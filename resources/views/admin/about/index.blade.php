@extends('admin.layout.main')
@section('title') Trang chủ
@endsection
@section('content')
<div class="page-header mt-2">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
            <li class="breadcrumb-item" ><a href="" title="Danh mục"> Abouts </a></li>
            <li class="breadcrumb-item active"> Danh sách</li>
        </ol>
    </div>
<div class="mt-2">
    <h4 class="mt-2 ">Quản lí about</h4>
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
                <a href="{{route('about.create')}}" class="btn btn-outline-secondary mb-2 mt-2">Thêm mới</a>
            </div>
            <div class="col-3">
                 <form action="">
                    <div class="row" style = "margin:0;">
                       <div class="form-group">
                            {{Form::text('name','',['class'=>'form-control','rows' => 4,'placeholder'=>'Tìm  ... '])}}
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
                <th >Tiêu đề</th>
                <th >Số điện thoại</th>
                <th >Nội dung</th>
                <th >Email</th>
                <th >Logo</th>
                <th colspan="5"> Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($abouts as $key => $about)
                <tr>
                    <td >{{ ++$key }}</td>
                   	<td><a href="{{route('about.show',$about->id)}}" style="text-decoration: none;color: black;">{{$about->title}}</td></a>
                   	<td>{{$about->phone}}</td>
                   	<td>{{$about->content}}</td>
                   	<td>{{$about->email}}</td>
                   	<td>{{$about->logo}}</td>
                    <td colspan="5">
                        {{Form::open(['route' => ['about.destroy', $about->id], 'method' => 'DELETE'])}}
                        {{ Form::button('<i class="fas fa-trash-alt text-danger " > Xóa </i>', ['type' => 'submit', 'class' => 'text-danger border-0 btn-link float-left'] )  }} 
                        {{ Form::close() }}
                        <a href="{{route('about.edit',$about->id)}}" class="ml-1"><i class="far fa-edit "> Cập nhật </i></a>
                    </td>
                </tr>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection
