@extends('maindesign')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <h1 class="mb-3">
                {{ $news->title }}
            </h1>

            <p>
                <strong>Category:</strong>
                {{ $news->category }}
            </p>

            @if($news->image)

                <img src="{{ asset('News/'.$news->image) }}"
                     class="img-fluid mb-4">

            @endif

            <p>
                {{ $news->description }}
            </p>

            <a href="{{ url('/') }}"
               class="btn btn-secondary">
                Back
            </a>

        </div>

    </div>

</div>

@endsection
