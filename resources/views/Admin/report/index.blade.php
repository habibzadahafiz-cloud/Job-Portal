@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h2 class="mb-4">
    Hospital Reports Dashboard
</h2>

<div class="row">

    <div class="col-md-4 mb-3">
        <div class="card shadow">
            <div class="card-body text-center">
                <h5>Total Patients</h5>
                <h1>{{ $totalPatients }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow">
            <div class="card-body text-center">
                <h5>Total Doctors</h5>
                <h1>{{ $totalDoctors }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow">
            <div class="card-body text-center">
                <h5>Total Medicines</h5>
                <h1>{{ $totalMedicines }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card shadow">
            <div class="card-body text-center">
                <h5>Total Appointments</h5>
                <h1>{{ $totalAppointments }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow border-warning">
            <div class="card-body text-center">
                <h5>Pending</h5>
                <h2>{{ $pendingAppointments }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow border-success">
            <div class="card-body text-center">
                <h5>Approved</h5>
                <h2>{{ $approvedAppointments }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="card shadow mt-4" style="width:50%">

    <div class="card-header">
        Appointment Statistics
    </div>

    <div class="card-body">

        <canvas id="appointmentChart" style="80px"></canvas>

    </div>

</div>


</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('appointmentChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [

            'Pending',
            'Approved'

        ],

        datasets: [{

            label: 'Appointments',

            data: [

                {{ $pendingAppointments }},
                {{ $approvedAppointments }}

            ]

        }]

    }

});

</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
