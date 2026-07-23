@extends('Admin.layout')

@section('content')

<div class="container">

<h3 class="mb-4">Add Doctor Schedule</h3>


<form action="{{ route('schedule.store') }}" method="POST">

@csrf


<div class="mb-3 form-group">

<label>Doctor</label>

<select name="doctor_id" class="form-control">

<option value="">Select Doctor</option>

@foreach($doctors as $doctor)

<option value="{{ $doctor->id }}">
{{ $doctor->name }}
</option>

@endforeach

</select>

@error('doctor_id')
<span class="text-danger">{{ $message }}</span>
@enderror

</div>



<div class="mb-3 form-group">

<label>Day</label>

<select name="day" class="form-control">

<option value="">Select Day</option>

<option>Saturday</option>
<option>Sunday</option>
<option>Monday</option>
<option>Tuesday</option>
<option>Wednesday</option>
<option>Thursday</option>


</select>


@error('day')
<span class="text-danger">{{ $message }}</span>
@enderror


</div>




<div class="mb-3 form-group">

<label>Start Time</label>

<input type="time"
name="start_time"
class="form-control">


@error('start_time')
<span class="text-danger">{{ $message }}</span>
@enderror


</div>




<div class="mb-3 form-group">

<label>End Time</label>

<input type="time"
name="end_time"
class="form-control">


@error('end_time')
<span class="text-danger">{{ $message }}</span>
@enderror


</div>



<button class="btn btn-primary">
Save Schedule
</button>


</form>

</div>


@endsection
