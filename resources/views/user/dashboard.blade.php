@extends('user.layout')

@section('index_page_two')

<!-- Hero Section -->
<div class="page-hero bg-image overlay-dark"
style="background-image:url('{{ asset('front_end/assets/img/bg_image_1.jpg') }}');">

    <div class="hero-section">
        <div class="container text-center">

            <span class="subhead">
                Welcome To Hospital Management System
            </span>

            <h1 class="display-4">
                Book Your Appointment Online
            </h1>

            <a href="{{ route('appointments.create') }}"
               class="mt-3 btn btn-primary btn-lg">

               Make Appointment

            </a>

        </div>
    </div>

</div>
<div class="page-section">
<div class="container">

<div class="row">

<div class="col-md-4">

<div class="text-center shadow card">

<div class="card-body">

<h2>{{ $doctors->count() }}</h2>

<h5>Total Doctors</h5>

</div>

</div>

</div>

<div class="col-md-4">

<div class="text-center shadow card">

<div class="card-body">

<h2>{{ $departments->count() }}</h2>

<h5>Departments</h5>

</div>

</div>

</div>

<div class="col-md-4">

<div class="text-center shadow card">

<div class="card-body">

<h2>{{ $appointments->count() }}</h2>

<h5>Recent Appointments</h5>

</div>

</div>

</div>

</div>

</div>
</div>
<div class="page-section bg-light">

<div class="container">

<h2 class="mb-5 text-center">
Our Doctors
</h2>

<div class="row">

@foreach($doctors as $doctor)

<div class="mb-4 col-md-4">

<div class="shadow card">

<img src="{{ asset('Doctor/'.$doctor->image) }}"
     height="250">

<div class="card-body">

<h5>{{ $doctor->name }}</h5>

<p>{{ $doctor->specialization }}</p>
<p>{{ $doctor->phone }}</p>

</div>

</div>

</div>

@endforeach

</div>

</div>

</div>
<div class="page-section">

<div class="container">

<h2 class="mb-5 text-center">

Our Services

</h2>

<div class="text-center row">

<div class="col-md-3">
<h4>General Checkup</h4>
</div>

<div class="col-md-3">
<h4>Laboratory</h4>
</div>

<div class="col-md-3">
<h4>X-Ray</h4>
</div>

<div class="col-md-3">
<h4>Emergency</h4>
</div>

</div>

</div>

</div>
<div class="page-section bg-light">

<div class="container">

<h2 class="mb-4">

Recent Appointments

</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Patient</th>
<th>Date</th>
</tr>

@foreach($appointments as $appointment)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $appointment->patient->name }}</td>

<td>{{ $appointment->appointment_date }}</td>

</tr>

@endforeach

</table>

</div>

</div>
