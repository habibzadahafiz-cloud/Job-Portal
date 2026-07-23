@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h3 class="mb-4">
    Medicine Stock Management
</h3>

<table class="table table-bordered">

    <thead>

    <tr>

        <th>#</th>

        <th>Medicine Name</th>

        <th>Company</th>

        <th>Quantity</th>

        <th>Status</th>
        <th>Action</th>

    </tr>

    </thead>

    <tbody>

    @foreach($medicines as $medicine)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $medicine->name }}</td>

        <td>{{ $medicine->company }}</td>

        <td>{{ $medicine->quantity }}</td>

        <td>

            @if($medicine->quantity <= 10)

                <span class="badge badge-danger">
                    Low Stock
                </span>

            @else

                <span class="badge badge-success">
                    In Stock
                </span>

            @endif

        </td>
        <td>

<a href="{{ route('medicine.stockin.form',$medicine->id) }}"
class="btn btn-success btn-sm">

Stock In

</a>

<a href="{{ route('medicine.stockout.form',$medicine->id) }}"
class="btn btn-danger btn-sm">

Stock Out

</a>

</td>

    </tr>

    @endforeach

    </tbody>

</table>

</div>

@endsection
