@extends('layout.App')

@section("contact")


 <h1>This is a yeild and section page</h1>

<h2 style="color:red; background-color: blue;">This is a css casecading style sheet</h2>
{{-- @if(count($people) > 0) --}}
@foreach ($people as $person)
<ul>
<li>{{ $person }}</li>
</ul>
@endforeach
{{-- @endif --}}


@endsection
@section("sidebar")
<script>
alert("This is an alert  page");
</script>

@endsection
