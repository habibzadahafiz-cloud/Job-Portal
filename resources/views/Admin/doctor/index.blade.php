@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<a href="{{ route('doctors.create') }}"
   class="mb-3 btn btn-success mt-5">
   Add Doctor
</a>
<h2 style="text-align: center; font-family: 'Times New Roman', Times, serif;">All Doctors</h2>
<table class="table">

<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Department</th>
    <th>Email</th>
    <th>Phone</th>
    <th>specialization</th>
    <th>Doctor_Image</th>
</tr>
</thead>

<tbody>

@foreach($doctors as $doctor)

<tr>
    <td>{{ $doctor->id }}</td>
    <td>{{ $doctor->name }}</td>
    <td>{{ $doctor->department->name }}</td>
    <td>{{ $doctor->email }}</td>
    <td>{{ $doctor->phone }}</td>

        <td>{{ $doctor->specialization }}</td>
        <td><img src="{{ asset($doctor->Image) }}"
width="80"
height="80"
class="rounded-circle">
</td>
        <td>

<a href="{{ route('doctors.edit',$doctor->id) }}"
   class="btn btn-warning btn-sm">
   Edit
</a>

<form action="{{ route('doctors.destroy',$doctor->id) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('DELETE')

    <button class="btn btn-primary btn-sm"
            onclick="return confirm('Delete Doctor?')">
        Delete
    </button>

</form>

</td>
</tr>

@endforeach

</tbody>

</table>

<div class="card mb-4" style="width: 600px;">
    <div class="card-body">
        <h4>Doctors By Department</h4>
        <canvas id="doctorChart" height="150"></canvas>
    </div>
</div>


</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('doctorChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @foreach($chartData as $item)
                "{{ $item->name }}",
            @endforeach
        ],
        datasets: [{
            label: 'Number of Doctors',
            data: [
                @foreach($chartData as $item)
                    {{ $item->doctors_count }},
                @endforeach
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

@endsection
