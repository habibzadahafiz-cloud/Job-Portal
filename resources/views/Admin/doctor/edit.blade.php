@extends('Admin.layout')

@section('content')

<div class="container-fluid">

    <h3>Edit Doctor</h3>

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Doctor Name</label>
            <input type="text"
                   name="name"
                   value="{{ $doctor->name }}"
                   class="form-control">
        </div>

        <div class="mt-3 form-group">
            <label>Department</label>

            <select name="department_id" class="form-control">

                @foreach($departments as $department)

                    <option value="{{ $department->id }}"
                        {{ $doctor->department_id == $department->id ? 'selected' : '' }}>

                        {{ $department->name }}

                    </option>

                @endforeach

            </select>
        </div>

        <div class="mt-3 form-group">
            <label>Email</label>
            <input type="email"
                   name="email"
                   value="{{ $doctor->email }}"
                   class="form-control">
        </div>

        <div class="mt-3 form-group">
            <label>Phone</label>
            <input type="text"
                   name="phone"
                   value="{{ $doctor->phone }}"
                   class="form-control">
        </div>

        <div class="mt-3 form-group">
            <label>Specialization</label>
            <input type="text"
                   name="specialization"
                   value="{{ $doctor->specialization }}"
                   class="form-control">
        </div>
        <div class="mt-3 form-group">
    <label for="image">DOCTOR_Image</label>
    <input type="file" name="Image" class="form-control" >
</div>

        <button type="submit" class="mt-3 btn btn-primary">
            Update Doctor
        </button>

    </form>

</div>

@endsection
