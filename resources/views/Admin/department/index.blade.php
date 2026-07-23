@extends('Admin.layout')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between">

        <h3>Departments</h3>

        <a href="{{ route('departments.create') }}"
           class="btn btn-success">
           Add Department
        </a>

    </div>

    <table class="table mt-4">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($departments as $department)

            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->description }}</td>

            <td>

<a href="{{ route('departments.edit',$department->id) }}"
   class="btn btn-warning btn-sm">
   Edit
</a>

<form action="{{ route('departments.destroy',$department->id) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('DELETE')

    <button class="btn btn-danger btn-sm"
            onclick="return confirm('Delete Department?')">
        Delete
    </button>

</form>

</td>
</tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection
