@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Category Create Form</h1>
	</div>
</div>
{{-- aa --}}
<form class="col-md-10" action="{{ route('categories.store')}}" method="post" enctype="multipart/form-data">
	{{-- same as input type hidden--}}
	@csrf
  
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      @error('name')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <input type="text" class="form-control" name="name"id="name">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-10">
      @error('photo')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <input type="file" name="photo" id="photo">
    </div>
  </div>

  

  
  

  <div class="form-group row">
  	
    <div class="col-sm-10">
      
      <input type="submit" name="btnsubmit" class="btn btn-success"value="Brand Create">
  </div>
  </div>
</form>
{{-- aa --}}
@endsection