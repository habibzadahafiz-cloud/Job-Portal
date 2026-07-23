@extends('Admin.layout')


@section('content')


<div class="container-fluid">


<div class="d-flex justify-content-between mb-3">

<h3>
Patient History List
</h3>


<a href="{{ route('patient_history.create') }}"
class="btn btn-success">

Add History

</a>


</div>



@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif




<table class="table table-bordered table-striped">


<thead>

<tr>

<th>#</th>

<th>Patient</th>

<th>Doctor</th>

<th>Appointment</th>

<th>Diagnosis</th>

<th>Prescription</th>

<th>Notes</th>

<th>Action</th>


</tr>

</thead>



<tbody>


@foreach($histories as $history)


<tr>


<td>
{{ $loop->iteration }}
</td>



<td>
{{ $history->patient->name }}
</td>



<td>
{{ $history->doctor->name }}
</td>



<td>

@if($history->appointment)

{{ $history->appointment->id }}

@else

N/A

@endif

</td>




<td>

{{ $history->diagnosis }}

</td>



<td>

{{ $history->prescription }}

</td>



<td>

{{ $history->notes }}

</td>




<td>


<a href="{{ route('patient_history.edit',$history->id) }}"
class="btn btn-warning btn-sm">

Edit

</a>



<form action="{{ route('patient_history.destroy',$history->id) }}"
method="POST"
style="display:inline-block">


@csrf

@method('DELETE')


<button type="submit"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure?')">

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
