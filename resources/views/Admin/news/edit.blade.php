@extends('Admin.layout')

@section('content')

<div class="container mt-4">

    <h2>Edit News</h2>
<form action="{{ route('latest-news.update', ['latest_news' => $news->id]) }}"
      method="POST"
      enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   value="{{ $news->title }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text"
                   name="category"
                   value="{{ $news->category }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description"
                      rows="5"
                      class="form-control">{{ $news->description }}</textarea>
        </div>

        <div class="mb-3">

            <label>Current Image</label><br>

            @if($news->image)

                <img src="{{ asset('News/'.$news->image) }}"
                     width="120">

            @endif

        </div>

        <div class="mb-3">
            <label>New Image</label>
            <input type="file"
                   name="image"
                   class="form-control">
        </div>

        <button type="submit"
                class="btn btn-success">
            Update News
        </button>

    </form>

</div>

@endsection
