@extends('admin.layout.main')
@section('title','Detail About')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="">Admin</a></li>
		<li class="breadcrumb-item" ><a href="{{route('brand.index')}}" title="Danh mục">About</a></li>
	</ol>
</div>
<div class="card">
	<div class="card-header">
		<b class="h4">About</b>
	</div>
	<div class="card-body">
		<div class="page-header mt-2">
		</div>
		<div class="ml-3">
			<p><b>Title: </b>{{$about->title}}</p>
			<p><b>Logo: </b><img src="{{ asset('images/'.$about->logo) }}" width="80" height=></img></p>
			<p><b>Phone Number: </b>{{$about->phone}}</p>
			<p><b>Content: </b>{{$about->content}}</p>
			<p><b>Email: </b>{{$about->email}}</p>
			<a class="btn btn-outline-secondary" href="{{route('about.index')}}">Back</a>
		</div>
	</div>
</div>
@endsection