@extends('Admin.layout')

@section('content')

<div class="container mt-4">

    <h2>Add News</h2>

    <form action="{{ route('latest-news.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text"
                   name="category"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description"
                      rows="5"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file"
                   name="image"
                   class="form-control">
        </div>

        <button type="submit"
                class="btn btn-primary">
            Save News
        </button>

    </form>

</div>

@endsection
