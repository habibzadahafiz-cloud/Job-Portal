@extends('Admin.layout')


@section('content')


<div class="container">


<h3>Add Patient History</h3>


<form action="{{route('patient_history.store')}}" method="POST">

@csrf


<select name="patient_id" class="form-control">

<option>Select Patient</option>

@foreach($patients as $patient)

<option value="{{$patient->id}}">
{{$patient->name}}
</option>

@endforeach

</select>



<br>


<select name="doctor_id" class="form-control">

<option>Select Doctor</option>


@foreach($doctors as $doctor)

<option value="{{$doctor->id}}">
{{$doctor->name}}
</option>

@endforeach

</select>



<br>


<select name="appointment_id" class="form-control">

<option>Select Appointment</option>


@foreach($appointments as $appointment)

<option value="{{$appointment->id}}">
{{$appointment->id}}
</option>

@endforeach

</select>



<br>


<textarea
name="diagnosis"
class="form-control"
placeholder="Diagnosis">
</textarea>


<br>


<textarea
name="prescription"
class="form-control"
placeholder="Prescription">
</textarea>


<br>


<textarea
name="notes"
class="form-control"
placeholder="Notes">
</textarea>



<br>


<button class="btn btn-success">
Save
</button>



</form>


</div>


@endsection
