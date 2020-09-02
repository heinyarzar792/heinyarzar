@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item Edit Form</h1>
	</div>
</div>
{{-- aa --}}
<form class="col-md-10" action="{{ route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
	{{-- same as input type hidden--}}
  {{-- if form error to keep go --}}
	@csrf
  @method('PUT')
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Code No</label>
    <div class="col-sm-10">
      @error('codeno')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <input type="text" class="form-control" name="codeno" id="codeno" value="{{$item->codeno}}" readonly="readonly">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      @error('name')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <input type="text" class="form-control" name="name"id="name" value="{{$item->name}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-10">
      @error('photo')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <input type="file" name="photo" id="photo" value="">
      <img src="{{asset($item->photo)}}" width="100" height="100">
      @error('oldphoto')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <input type="hidden" name="oldphoto" value="{{$item->photo}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="price"id=""value="{{$item->price}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Discount</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="discount" id="discount"  value="{{$item->discount}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea name="description" value="">{{$item->description}}</textarea>
  </div>

  <div class="form-group row">
    <select class="form-control from-control-md" id="inputBrand" name="brand">
      <optgroup label="Choose Brand">
        @foreach($brands as $brand)
        <option value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
      </optgroup>
       </select>
  </div>

  <div class="form-group row">
    <select class="form-control from-control-md" id="inputSubcategory" name="subcategory">
      <optgroup label="Choose Subcategory">
        @foreach($subcategories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </optgroup>
       </select>
  </div><br>

  <div class="form-group row">
  	
    <div class="col-sm-10">
      
      <input type="submit" name="btnsubmit" class="btn btn-success"value="Update">
  </div>
  </div>
</form>
{{-- aa --}}

@endsection