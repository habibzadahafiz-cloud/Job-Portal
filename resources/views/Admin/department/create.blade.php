@extends('Admin.layout')

@section('content')

<div class="container-fluid">

    <h3>Add Department</h3>

    <form action="{{ route('departments.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label>Department Name</label>

            <input type="text"
                   name="name"
                   class="form-control">
        </div>

        <div class="mt-3 form-group">
            <label>Description</label>

            <textarea name="description"
                      class="form-control"></textarea>
        </div>

        <button class="mt-3 btn btn-primary">
            Save
        </button>

    </form>

</div>

@endsection
