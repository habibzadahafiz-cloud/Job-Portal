@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h3>Add Doctor</h3>

<form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">

@csrf

<div class="form-group">
    <label>Doctor Name</label>
    <input type="text" name="name" class="form-control">
</div>

<div class="mt-3 form-group">
    <label>Department</label>

    <select name="department_id" class="form-control">

        @foreach($departments as $department)

            <option value="{{ $department->id }}">
                {{ $department->name }}
            </option>

        @endforeach

    </select>
</div>

<div class="mt-3 form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control">
</div>

<div class="mt-3 form-group">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control">
</div>

<div class="mt-3 form-group">
    <label>Specialization</label>
    <input type="text" name="specialization" class="form-control">
</div>
<div class="mt-3 form-group">
    <label for="image">DOCTOR_Image</label>
    <input type="file" name="Image" class="form-control" >
</div>

<button class="mt-3 btn btn-primary">
    Save Doctor
</button>

</form>

</div>

@endsection
