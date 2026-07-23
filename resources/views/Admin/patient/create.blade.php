@extends('Admin.layout')

@section('content')

<div class="container mt-5">

<form action="{{ route('patients.store') }}" method="POST">

@csrf

<input type="text"
       name="name"
       placeholder="Patient Name"
       class="form-control mb-3">

<input type="email"
       name="email"
       placeholder="Email"
       class="form-control mb-3">

<input type="text"
       name="phone"
       placeholder="Phone"
       class="form-control mb-3">

<input type="number"
       name="age"
       placeholder="Age"
       class="form-control mb-3">

<select name="gender" class="form-control mb-3">
    <option value="">Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>

<textarea name="address"
          class="form-control mb-3"
          placeholder="Address"></textarea>

<button class="btn btn-success">
    Save Patient
</button>

</form>

</div>

@endsection
