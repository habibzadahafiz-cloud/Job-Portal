@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h3 class="mb-4">
Doctor Report
</h3>

<table class="table table-bordered">

<thead>

<tr>

<th>#</th>

<th>Name</th>

<th>Department</th>

<th>Phone</th>

</tr>

</thead>

<tbody>

@foreach($doctors as $doctor)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $doctor->name }}</td>

<td>{{ $doctor->department->name ?? '' }}</td>

<td>{{ $doctor->phone }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
