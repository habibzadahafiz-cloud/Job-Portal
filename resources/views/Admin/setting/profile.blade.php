@extends('Admin.layout')


@section('content')


<div class="container-fluid">


<h3 class="mb-4">
Admin Profile
</h3>


@if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif



<form action="{{route('admin.profile.update')}}"
method="POST">


@csrf


<div class="form-group">

<label>Name</label>

<input type="text"
name="name"
value="{{$user->name}}"
class="form-control">

</div>



<div class="form-group">

<label>Email</label>

<input type="email"
name="email"
value="{{$user->email}}"
class="form-control">

</div>



<div class="form-group">

<label>New Password</label>

<input type="password"
name="password"
class="form-control">

</div>



<button class="btn btn-primary">

Update Profile

</button>


</form>


</div>


@endsection
