
@extends('backendtemplate')
@section('content')
<div class="container">
<div class="row">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order List</h1>
		{{-- <a href="{{ route('items.create')}}" class="btn btn-success ml-5">Add New</a> --}}
</div>
</div>
</div>

<div class="container-fluid">
<div class="row">
	<div class="h3 mb-0 text-gray-dark">
	<table class="table table-bordered">
		<thead class="bg-dark text-white">
			<tr>
				<th>Voucher No</th>
				<th>User</th>
				<th>Total</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@php
			$i=1;
			@endphp
			@foreach($orders as $order)
			<tr>
				<td>{{$order->voucherno}}</td>
				<td>{{$order->user_id}}</td>
				<td>{{$order->total}}</td>
				<td>
					<a href="{{route('orders.show',$order->id)}}" class="btn btn-info">Detail</a>
					{{-- <a href="{{route('items.edit',$item->id)}}" class="btn btn-success">Edit</a>
					<a href="" class="btn btn-danger">Delete</a> --}}

				</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
</div>
</div>

</div>
@endsection