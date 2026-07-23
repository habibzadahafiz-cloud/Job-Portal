@extends('Admin.layout')

@section('content')

<div class="mb-4 shadow card">
    <div class="card-header">
        <h4 class="mb-0">
            Search Results For : "{{ $search }}"
        </h4>
    </div>

    <div class="card-body">

        @if($doctors->count() > 0)

        <h5 class="mb-3 text-primary">Doctors</h5>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Doctor_id</th>
                    <th>Doctor Name</th>
                </tr>
            </thead>

            <tbody>
                @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                     <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif


        @if($patients->count() > 0)

        <h5 class="mt-4 mb-3 text-success">Patients</h5>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient_id</th>
                    <th>Patient Name</th>
                </tr>
            </thead>

            <tbody>
                @foreach($patients as $patient)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif


        @if($medicines->count() > 0)

        <h5 class="mt-4 mb-3 text-warning">Medicines</h5>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Midicine_id</th>
                    <th>Medicine Name</th>
                </tr>
            </thead>

            <tbody>
                @foreach($medicines as $medicine)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $medicine->id }}</td>
                    <td>{{ $medicine->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif


        @if(
            $doctors->count() == 0 &&
            $patients->count() == 0 &&
            $medicines->count() == 0
        )

        <div class="text-center alert alert-danger">
            <strong>No Record Found</strong>
        </div>

        @endif

    </div>
</div>

@endsection
