@extends('Admin.layout')

@section('content')

<div class="container-fluid">

```
<div class="d-flex justify-content-between mb-3">

    <h3>Medicine List</h3>

    <a href="{{ route('medicines.create') }}"
       class="btn btn-primary">

        Add Medicine

    </a>

</div>

<table class="table table-bordered">

    <thead>

    <tr>

        <th>#</th>

        <th>Name</th>

        <th>Company</th>

        <th>Quantity</th>

        <th>Price</th>

        <th>Expiry Date</th>

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

        <td>{{ $medicine->price }}</td>

        <td>{{ $medicine->expiry_date }}</td>

        <td>

            <a href="{{ route('medicines.edit',$medicine->id) }}"
               class="btn btn-warning btn-sm">

                Edit

            </a>

            <form action="{{ route('medicines.destroy',$medicine->id) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm">

                    Delete

                </button>

            </form>

        </td>

    </tr>

    @endforeach

    </tbody>

</table>
```

</div>

@endsection
