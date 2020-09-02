@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Brand Edit Form</h1>
	</div>
</div>
{{-- aa --}}
<form class="col-md-10" action="{{ route('brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
	{{-- same as input type hidden--}}
	@csrf
  @method('PUT')
  
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      @error('name')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <input type="text" class="form-control" name="name"id="name" value="{{$brand->name}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-10">
      <input type="file" name="photo" id="photo" value="">
      <img src="{{asset($brand->photo)}}" width="100" height="100">
      @error('oldphoto')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <input type="hidden" name="oldphoto" value="{{$brand->photo}}">
    </div>
  </div>

  

  <div class="form-group row">
  	
    <div class="col-sm-10">
      
      <input type="submit" name="btnsubmit" class="btn btn-success"value="BrandUpdate">
  </div>
  </div>
</form>
{{-- aa --}}

@endsection