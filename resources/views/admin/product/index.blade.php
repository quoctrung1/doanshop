@extends('admin.layout.main')
@section('title','Product')
@section('content')
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="">Admin</a></li>
		<li class="breadcrumb-item active">Product</li>
	</ol>
</div>
<div class="row ml-1 col-md-12">
	@if (Session::has('message'))
	<p class="alert alert-success">{{ Session::get('message')}}</p> 
	@elseif(Session::has('err'))    
	<p class="alert alert-danger">{{ Session::get('err')}}</p>
	@endif
</div>
<div class="card">
	<div class="card-header">
		<b class="h4">Product</b>
	</div>
	<div class="card-body col-md-12">
		<div class="row">
			<div class="col-md-9">
				<a href="{{route('product.create')}}" class="btn btn-outline-success mb-2 mt-2">Create New</a>
			</div>
			<div class="col-md-3">
				<form action="">
					<div class="form-group">
						{{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
					</div>
				</form>
			</div>
		</div>
		<table class="table table-striped table-sm">
			<thead class="">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Product code</th>
					<th scope="col">Name</th>
					<th scope="col">Image</th>
					<th scope="col">Price</th>
					<th scope="col">Quantity</th>
					<th colspan="3">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $key => $product)
				<tr>
					<td class="">{{ ++$key }}</td>
					<td class="">{{ $product->product_code }}</td>
					<td class=""><a href="{{route('product.show',$product->id)}}" style="text-decoration: none;color: black;">
						{{ $product->name }}</a>
					</td>
					<td><img src="{{ asset('images/'.$product->image) }}" width="50" height="50"></img></td>
					<td class="">{{$product->price}}</td>
					<td class="">{{$product->quantity}}</td>
					<td>
						{{Form::open(['route' => ['product.destroy', $product->id], 'method' => 'DELETE'])}}
						{{ Form::button('<i class="fas fa-trash-alt text-danger "></i>', ['type' => 'submit', 'class' => 'text-danger border-0 btn-link float-left'] )  }}
						{{ Form::close() }}
						<!-- <a href="{{route('product.show',$product->id)}}"><i class="fas fa-info text-info ml-2 mr-2"></i></a> -->
						<a href="{{route('product.edit',$product->id)}}"><i class="far fa-edit "></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection