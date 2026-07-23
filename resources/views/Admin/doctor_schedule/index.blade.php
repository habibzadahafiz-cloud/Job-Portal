@extends('Admin.layout')


@section('content')


<div class="container">


<div class="mb-3 d-flex justify-content-between">

<h3 class="mt-3">Doctor Schedule</h3>


<a href="{{ route('schedule.create') }}"
class="mt-3 btn btn-success">

Add Schedule

</a>


</div>




<table class="table table-dark table-striped">


<thead>

<tr>

<th>#</th>
<th>Doctor</th>
<th>Day</th>
<th>Start</th>
<th>End</th>

</tr>

</thead>



<tbody>


@foreach($schedules as $schedule)


<tr>

<td>
{{ $loop->iteration }}
</td>


<td>
{{ $schedule->doctor->name }}
</td>


<td>
{{ $schedule->day }}
</td>


<td>
{{ $schedule->start_time }}
</td>


<td>
{{ $schedule->end_time }}
</td>


</tr>


@endforeach


</tbody>


</table>


</div>


@endsection
