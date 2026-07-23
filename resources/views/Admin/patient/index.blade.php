@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<a href="{{ route('patients.create') }}"
   class="btn btn-success mt-4 mb-3">
    Add Patient
</a>

<table class="table table-bordered">

<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Address</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

@foreach($patients as $patient)

<tr>
    <td>{{ $patient->id }}</td>
    <td>{{ $patient->name }}</td>
    <td>{{ $patient->email }}</td>
    <td>{{ $patient->phone }}</td>
    <td>{{ $patient->age }}</td>
    <td>{{ $patient->gender }}</td>
    <td>{{ $patient->address }}</td>

    <td>

        <a href="{{ route('patients.edit',$patient->id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('patients.destroy',$patient->id) }}"
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

<div class="card mt-5">

<div class="card-header">

<h4>
Patients Registration Report
</h4>

</div>


<div class="card-body">

<canvas id="patientChart"></canvas>

</div>


</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


const ctx = document.getElementById('patientChart');


new Chart(ctx, {

    type: 'line',


    data: {


        labels: [

        @foreach($patientChart as $data)

            "{{ $data->date }}",

        @endforeach

        ],



        datasets: [{

            label: 'Number of Patients',


            data: [

            @foreach($patientChart as $data)

                {{ $data->total }},

            @endforeach

            ],


            borderWidth: 2

        }]

    },


    options: {


        responsive:true,


        scales:{


            y:{


                beginAtZero:true


            }


        }


    }


});


</script>

@endsection
