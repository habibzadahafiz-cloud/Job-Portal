@extends('Admin.layout')

@section('content')

<section class="dashboard-counts section-padding" style="margin-top:20px ">
    <div class="container-fluid">
        <form action="{{ route('dashboard.search') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text"
               name="search"
               class="form-control"
               placeholder="Search Patient, Doctor, Medicine...">

        <button type="submit" class="btn btn-primary">
            {{ __('messages.search') }}
        </button>
    </div>
</form>
        <div class="mb-4">

<div class="mb-4 row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                {{ __('messages.Quick_Actions') }}
            </div>

            <div class="card-body" style="display: flex; text-align: center; justify-content: center;">

                <a href="{{ route('doctors.create') }}"
                   class="m-1 btn btn-success">
                    {{ __('messages.add_doctor') }}
                </a>

                <a href="{{ route('patients.create') }}"
                   class="m-1 btn btn-primary">
                    {{ __('messages.add_patient') }}
                </a>

                <a href="{{ route('appointments.create') }}"
                   class="m-1 btn btn-warning">
                   {{ __('messages.create_appointment') }}
                </a>

                <a href="{{ route('medicines.create') }}"
                   class="m-1 btn btn-danger">
                    {{ __('messages.Add_Medicine') }}
                </a>

            </div>
        </div>

    </div>
</div>

</div>
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="mb-3 text-white card bg-primary">
                <div class="card-body">
                    <h2>{{ $departments }}</h2>
                    <h5>{{ __('messages.Total_Departments') }}</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="mb-3 text-white card bg-success">
                <div class="card-body">
                    <h2>{{ $doctors }}</h2>
                    <h5>{{ __('messages.Total_Doctors') }}</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="mb-3 text-white card bg-warning">
                <div class="card-body">
                    <h2>{{ $patients }}</h2>
                    <h5>{{ __('messages.Total_Patients') }}</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="mb-3 text-white card bg-danger">
                <div class="card-body">
                    <h2>{{ $appointments }}</h2>
                    <h5>{{ __('messages.Total_Appointments') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
    <div class="mb-3 text-white card bg-info">
        <div class="card-body">
            <h2>{{ $pendingAppointments }}</h2>
            <h5>{{ __('messages.Pending_Appointments') }}</h5>
        </div>
    </div>
</div>

<div class="col-xl-3 col-sm-6">
    <div class="mb-3 text-white card bg-secondary">
        <div class="card-body">
            <h2>{{ $approvedAppointments }}</h2>
            <h5>{{ __('messages.Approved_Appointments') }}</h5>
        </div>
    </div>
</div>

    </div>

    <div class="mt-4 row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Hospital Summary
                </div>

                <div class="card-body">
                    <p><strong>Departments:</strong> {{ $departments }}</p>
                    <p><strong>Doctors:</strong> {{ $doctors }}</p>
                    <p><strong>Patients:</strong> {{ $patients }}</p>
                    <p><strong>Appointments:</strong> {{ $appointments }}</p>
                    <p><strong>Medicines:</strong> {{ $medicines }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Welcome Admin
                </div>

                <div class="card-body">
                    <h4>Hospital Management System</h4>

                    <p>
                        Welcome to the Admin Dashboard.
                        Here you can manage Doctors,
                        Patients, Appointments,
                        Medicines and Reports.
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="mt-4 card">
    <div class="card-header">
        Recent Appointments
    </div>

    <div class="card-body">
        <table class="table table-bordered">

            <tr>
                <th>Patient</th>
                <th>Date</th>
                <th>Status</th>
            </tr>

            @foreach($recentAppointments as $appointment)
            <tr>
                <td>{{ $appointment->patient->name }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->status }}</td>
            </tr>
            @endforeach

        </table>
    </div>
</div>
<div class="mt-4 card">
    <div class="card-header">
        Recent Patients
    </div>

    <div class="card-body">
        <table class="table table-bordered">

            <tr>
                <th>Name</th>
                <th>Phone</th>
            </tr>

            @foreach($recentPatients as $patient)
            <tr>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->phone }}</td>
            </tr>
            @endforeach

        </table>
    </div>
</div>
<div class="row mt-4">

    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                Monthly Appointments
            </div>

            <div class="card-body">
                <canvas id="appointmentChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                Monthly Patient Registration
            </div>

            <div class="card-body">
                <canvas id="patientChart"></canvas>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-12">
        <div class="card mb-4" style="height:400px;">
            <div class="card-header">
                Medicine Stock
            </div>

            <div class="card-body">
                <canvas id="medicineChart"></canvas>
            </div>
        </div>
    </div>

</div>

</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const appointmentChart = @json($appointmentChart);

const months = appointmentChart.map(item => item.month);
const totals = appointmentChart.map(item => item.total);

new Chart(document.getElementById('appointmentChart'), {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{
            label: 'Appointments',
            data: totals
        }]
    }
});
</script>
<script>
const patientChart = @json($patientChart);

new Chart(document.getElementById('patientChart'), {
    type: 'line',
    data: {
        labels: patientChart.map(item => item.month),
        datasets: [{
            label: 'Patients',
            data: patientChart.map(item => item.total)
        }]
    }
});
</script>
<script>
const medicineChart = @json($medicineChart);

new Chart(document.getElementById('medicineChart'), {
    type: 'pie',
    data: {
        labels: medicineChart.map(item => item.name),
        datasets: [{
            data: medicineChart.map(item => item.quantity)
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>

@endsection

