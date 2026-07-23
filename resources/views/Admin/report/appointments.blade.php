@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h3 class="mb-4">
Appointment Report
</h3>

<table class="table table-bordered">

<thead>

<tr>

<th>#</th>

<th>Patient</th>

<th>Doctor</th>

<th>Date</th>

<th>Time</th>

<th>Status</th>

</tr>

</thead>

<tbody>

@foreach($appointments as $appointment)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $appointment->patient->name }}</td>

<td>{{ $appointment->doctor->name }}</td>

<td>{{ $appointment->appointment_date }}</td>

<td>{{ $appointment->appointment_time }}</td>

<td>{{ $appointment->status }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
