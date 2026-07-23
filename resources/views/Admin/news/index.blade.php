@extends('Admin.layout')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">

        <h2>All News</h2>

        <a href="{{ route('latest-news.create') }}"
           class="btn btn-success">
            Add News
        </a>

    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        @foreach($news as $item)

            <tr>

                <td>{{ $item->id }}</td>

                <td width="120">

                    @if($item->image)

                        <img src="{{ asset('News/'.$item->image) }}"
                             width="80">

                    @endif

                </td>

                <td>{{ $item->title }}</td>

                <td>{{ $item->category }}</td>

                <td>

                    <a href="{{ route('latest-news.edit',$item->id) }}"
                       class="btn btn-primary btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('latest-news.destroy',$item->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete News?')">
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
