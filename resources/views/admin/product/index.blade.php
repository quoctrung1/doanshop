@extends('admin.layout.main')
@section('title') Trang chủ
@endsection
@section('content')
<div class="page-header mt-2">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""> Trang chủ </a></li>
            <li class="breadcrumb-item" ><a href="{{route('product.index')}}" title="Sản phẩm"> Sản phẩm </a></li>
            <li class="breadcrumb-item active"> Danh sách</li>
        </ol>
    </div>
<h3 class="text-success ">PRODUCT</h3>
<div class="row">
    @if (Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message')}}</p> 
    @elseif(Session::has('err'))    
    <p class="alert alert-danger">{{ Session::get('err')}}</p>
    @endif
</div>
<div class=" ">
    <div class="row">
        <div class="col-8">
            <a href="{{route('product.create')}}" class="btn btn-outline-secondary mb-2 mt-2">Thêm mới</a>
        </div>
        <div class="col-4">
            <form action="">
                <div class="row" style = "margin:0;">
                    <div class="form-group">
                        {{Form::text('name','',['class'=>'form-control','rows' => 4,'placeholder'=>'Tìm sản phẩm ... '])}}
                    </div>
                    <div class="form-group" style = "padding: 0 10px 0 5px;">
                        <select name="cate" id="" class="form-control">
                            <option value="">Danh mục</option>
                            @if(isset($categories))
                            @foreach($categories as $category)
                            <option value="{{$category->id}}"{{ \Request::get('cate') == $category->id ? "selected='selected'" : ""}}>{{$category->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default" style = "width: 50px;height: 38px;"><i class="fas fa-search"></i></button>
                </div>
    </form>
        </div>
    </div>
    <div class=" table-responsive">
        <table class="table table-striped table-sm">
            <thead class="">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Mô tả sản phẩm</th>
                    <th scope="col">Image</th>
                    <th scope="col">Nhãn hiệu</th>
                    <th scope="col">Danh mục</th>
                    <th colspan="3">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                <tr>
                    <td class="">{{ ++$key }}</td>
                    <td class="">{{ $product->product_code }}</td>
                    <td class=""><a href="{{route('product.show',$product->id)}}" style="text-decoration: none;color: black;">
                        {{ $product->name }}</a>
                        <li><span>{{$product->price}} <b>₫</b> </span></li>
                        <li><span> {{$product->promotion}} <b>%</b></span></li>
                    </td>
                    <td class=""><p style="white-space: nowrap;width: 100px;text-overflow: ellipsis;overflow: hidden;">{{ $product->description }}</p></td>
                    <td><img src="{{ asset('image/Product/'.$product->image) }}" width="50" height="50"></img></td>
                    <td class="">
                        {{isset($product->brand->name)?$product->brand->name :$product->brand->name}}
                    </td>
                    <td class="">
                        {{isset($product->category->name)?$product->category->name :''}}
                    </td>
                    <td>
                        {{Form::open(['route' => ['product.destroy', $product->id], 'method' => 'DELETE'])}}
                        {{ Form::button('<i class="fas fa-trash-alt text-danger ">Xóa</i>', ['type' => 'submit', 'class' => 'text-danger border-0 btn-link float-left'] )  }}
                        {{ Form::close() }}
                        <!-- <a href="{{route('product.show',$product->id)}}"><i class="fas fa-info text-info ml-2 mr-2"></i></a> -->
                        <a href="{{route('product.edit',$product->id)}}"><i class="far fa-edit ">Cập nhật</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
