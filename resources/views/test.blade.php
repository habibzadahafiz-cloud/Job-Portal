@extends("layout.App")
@section("contact")

<h4>This is a text  project</h4>
@if(count($arr) > 0)
@foreach ($arr as $array)
<ul style="color:blue; display: flex;">
    <li style=" border:1px solid green;">{{ $array }}</li>
</ul>

@endforeach

@endif
@endsection
