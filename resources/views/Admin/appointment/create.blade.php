@extends('Admin.layout')

@section('content')

<div class="container mt-4">

<form action="{{ route('appointments.store') }}"
      method="POST">

@csrf

<select name="patient_id"
        class="form-control mb-3">

<option value="">
Select Patient
</option>

@foreach($patients as $patient)

<option value="{{ $patient->id }}">
{{ $patient->name }}
</option>

@endforeach

</select>

<select name="doctor_id"
        class="form-control mb-3">

<option value="">
Select Doctor
</option>

@foreach($doctors as $doctor)

<option value="{{ $doctor->id }}">
{{ $doctor->name }}
</option>

@endforeach

</select>

<input type="date"
       name="appointment_date"
       class="form-control mb-3">

<input type="time"
       name="appointment_time"
       class="form-control mb-3">

<select name="status"
        class="form-control mb-3">

<option value="Pending">
Pending
</option>

<option value="Approved">
Approved
</option>

<option value="Cancelled">
Cancelled
</option>
<option value="Complated">
Complated
</option>

</select>

<button class="btn btn-success">
Save Appointment
</button>

</form>

</div>

@endsection
