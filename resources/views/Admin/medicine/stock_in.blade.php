@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h3>Stock In</h3>

<form method="POST"
action="{{ route('medicine.stockin',$medicine->id) }}">

@csrf

<div class="form-group">

<label>Quantity</label>

<input type="number"
name="quantity"
class="form-control">

</div>

<button class="btn btn-success">

Add Stock

</button>

</form>

</div>

@endsection
