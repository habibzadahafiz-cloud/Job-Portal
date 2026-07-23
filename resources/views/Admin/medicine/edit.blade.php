@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h3>Edit Medicine</h3>

<form action="{{ route('medicines.update',$medicine->id) }}"
      method="POST">

@csrf
@method('PUT')

<div class="form-group">
<label>Name</label>
<input type="text"
name="name"
value="{{ $medicine->name }}"
class="form-control">
</div>

<div class="form-group">
<label>Company</label>
<input type="text"
name="company"
value="{{ $medicine->company }}"
class="form-control">
</div>

<div class="form-group">
<label>Quantity</label>
<input type="number"
name="quantity"
value="{{ $medicine->quantity }}"
class="form-control">
</div>

<div class="form-group">
<label>Price</label>
<input type="text"
name="price"
value="{{ $medicine->price }}"
class="form-control">
</div>

<div class="form-group">
<label>Expiry Date</label>
<input type="date"
name="expiry_date"
value="{{ $medicine->expiry_date }}"
class="form-control">
</div>

<button class="btn btn-primary mt-3">
Update
</button>

</form>

</div>

@endsection
