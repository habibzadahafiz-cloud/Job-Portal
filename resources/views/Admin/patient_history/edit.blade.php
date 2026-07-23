@extends('Admin.layout')


@section('content')


<div class="container-fluid">


<h3 class="mb-4">
Edit Patient History
</h3>



<form action="{{ route('patient_history.update',$patientHistory->id) }}" method="POST">


@csrf

@method('PUT')



<div class="form-group">

<label>Patient</label>


<select name="patient_id" class="form-control">


<option value="">
Select Patient
</option>


@foreach($patients as $patient)


<option value="{{ $patient->id }}"
{{ $patientHistory->patient_id == $patient->id ? 'selected' : '' }}>

{{ $patient->name }}

</option>


@endforeach


</select>


</div>





<div class="form-group">


<label>
Doctor
</label>


<select name="doctor_id" class="form-control">


<option value="">
Select Doctor
</option>



@foreach($doctors as $doctor)


<option value="{{ $doctor->id }}"
{{ $patientHistory->doctor_id == $doctor->id ? 'selected' : '' }}>


{{ $doctor->name }}


</option>


@endforeach


</select>


</div>






<div class="form-group">


<label>
Appointment
</label>


<select name="appointment_id" class="form-control">


<option value="">
Select Appointment
</option>



@foreach($appointments as $appointment)


<option value="{{ $appointment->id }}"

{{ $patientHistory->appointment_id == $appointment->id ? 'selected' : '' }}>


Appointment #{{ $appointment->id }}


</option>


@endforeach



</select>


</div>







<div class="form-group">


<label>
Diagnosis
</label>


<textarea name="diagnosis"
class="form-control"
rows="3">{{ $patientHistory->diagnosis }}</textarea>


</div>






<div class="form-group">


<label>
Prescription
</label>


<textarea name="prescription"
class="form-control"
rows="3">{{ $patientHistory->prescription }}</textarea>


</div>







<div class="form-group">


<label>
Notes
</label>


<textarea name="notes"
class="form-control"
rows="3">{{ $patientHistory->notes }}</textarea>


</div>







<button type="submit"
class="btn btn-primary">

Update History

</button>



<a href="{{ route('patient_history.index') }}"
class="btn btn-secondary">

Back

</a>



</form>



</div>


@endsection
