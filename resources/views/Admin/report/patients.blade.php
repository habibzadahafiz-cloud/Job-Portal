@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h3 class="mb-4">
Patient Report
</h3>

<table class="table table-bordered">

<thead>

<tr>

<th>#</th>

<th>Name</th>

<th>Phone</th>

<th>Gender</th>

<th>Age</th>

</tr>

</thead>

<tbody>

@foreach($patients as $patient)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $patient->name }}</td>

<td>{{ $patient->phone }}</td>

<td>{{ $patient->gender }}</td>

<td>{{ $patient->age }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
