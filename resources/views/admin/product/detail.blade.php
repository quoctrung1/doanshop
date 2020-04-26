@extends('admin.layout.main')
@section('title','Detal Product')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="">Admin</a></li>
		<li class="breadcrumb-item" ><a href="{{route('product.index')}}" title="Danh mục">product</a></li>
		<li class="breadcrumb-item active">Detail</li>
	</ol>
</div>
<div class="card">
	<div class="card-body col-md-12">
		<p><b>Name : </b>{{$product->name}}</p>
		<p style="width: 1000px;"><b>Description : </b>{{$product->description}}</p>
		<p ><b>Image : </b><img src="{{ asset('images/'.$product->image) }}" width="150" height="100"></img></p>
		<p><b>Price : </b>{{$product->price}}</p>
		<p><b>Quantity : </b>{{$product->quantity}}</p>
		<p><b>Promotion : </b>{{$product->promotion}} %</p>
		<p><b>Brand : </b>{{$product->brand->name}}</p>
		<p><b>Category : </b>{{$product->category->name}}</p>
	</div>
</div>
@endsection
