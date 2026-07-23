@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<a href="{{ route('appointments.create') }}"
class="btn btn-success mt-4 mb-3">

Add Appointment

</a>

<table class="table table-bordered">

<thead>

<tr>
<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Action</th>
</tr>

</thead>

<tbody>

@foreach($appointments as $appointment)

<tr>

<td>{{ $appointment->id }}</td>

<td>{{ $appointment->patient->name }}</td>

<td>{{ $appointment->doctor->name }}</td>

<td>{{ $appointment->appointment_date }}</td>

<td>{{ $appointment->appointment_time }}</td>

<td>{{ $appointment->status }}</td>

<td>

<a href="{{ route('appointments.edit',$appointment->id) }}"
class="btn btn-warning btn-sm">
Edit
</a>

<form
action="{{ route('appointments.destroy',$appointment->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
