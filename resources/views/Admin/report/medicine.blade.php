@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h3 class="mb-4">
Medicine Report
</h3>

<table class="table table-bordered">

<thead>

<tr>

<th>#</th>

<th>Name</th>

<th>Company</th>

<th>Quantity</th>

<th>Price</th>

<th>Expiry Date</th>

</tr>

</thead>

<tbody>

@foreach($medicines as $medicine)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $medicine->name }}</td>

<td>{{ $medicine->company }}</td>

<td>{{ $medicine->quantity }}</td>

<td>{{ $medicine->price }}</td>

<td>{{ $medicine->expiry_date }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
