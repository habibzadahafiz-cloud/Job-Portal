@extends('Admin.layout')


@section('content')


<div class="container-fluid">


<h3 class="mb-4">
Pending Appointment
</h3>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<table class="table table-bordered">


<thead>

<tr>

<th>#</th>

<th>Patient</th>

<th>Doctor</th>

<th>Date</th>

<th>Message</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>



<tbody>


@foreach($appointments as $appointment)


<tr>


<td>
{{ $loop->iteration }}
</td>


<td>
{{ $appointment->patient->name }}
</td>


<td>
{{ $appointment->doctor->name }}
</td>


<td>
{{ $appointment->appointment_date }}
</td>


<td>
{{ $appointment->message }}
</td>


<td>

<span class="badge badge-warning">

{{ $appointment->status }}

</span>

</td>


<td>

<a href="{{ route('appointment.approve',$appointment->id) }}"
class="btn btn-success btn-sm">

Approve

</a>



<a href="{{ route('appointment.cancel',$appointment->id) }}"
class="btn btn-danger btn-sm">

Cancel

</a>

</td>


</tr>


@endforeach


</tbody>


</table>


</div>


@endsection
