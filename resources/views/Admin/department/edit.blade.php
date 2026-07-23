@extends('Admin.layout')

@section('content')

<div class="container-fluid">

<h3>Edit Department</h3>

<form action="{{ route('departments.update',$department->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $department->name }}"
               class="form-control">
    </div>

    <div class="mt-3 form-group">
        <label>Description</label>

        <textarea name="description"
                  class="form-control">{{ $department->description }}</textarea>
    </div>

    <button class="mt-3 btn btn-primary">
        Update
    </button>

</form>

</div>

@endsection
