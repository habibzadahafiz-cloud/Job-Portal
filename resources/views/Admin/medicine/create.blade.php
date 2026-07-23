@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h3>Add Medicine</h3>

<form action="{{ route('medicines.store') }}"
      method="POST">

@csrf

<div class="form-group">
<label>Name</label>
<input type="text" name="name"
class="form-control">
</div>

<div class="form-group">
<label>Company</label>
<input type="text" name="company"
class="form-control">
</div>

<div class="form-group">
<label>Quantity</label>
<input type="number" name="quantity"
class="form-control">
</div>

<div class="form-group">
<label>Price</label>
<input type="text" name="price"
class="form-control">
</div>

<div class="form-group">
<label>Expiry Date</label>
<input type="date" name="expiry_date"
class="form-control">
</div>

<button class="btn btn-success mt-3">
Save
</button>

</form>

</div>

@endsection
