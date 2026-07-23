@extends('Admin.layout')


@section('content')


<div class="container-fluid">


<h3 class="mb-4">
System Settings
</h3>



@if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif




<form action="{{route('admin.settings.update')}}"
method="POST"
enctype="multipart/form-data">


@csrf



<div class="form-group">

<label>
Hospital Name
</label>


<input type="text"
name="hospital_name"
class="form-control"
value="{{$setting->hospital_name ?? ''}}">

</div>




<div class="form-group">

<label>
Email
</label>


<input type="email"
name="email"
class="form-control"
value="{{$setting->email ?? ''}}">

</div>




<div class="form-group">

<label>
Phone
</label>


<input type="text"
name="phone"
class="form-control"
value="{{$setting->phone ?? ''}}">

</div>




<div class="form-group">

<label>
Address
</label>


<textarea name="address"
class="form-control">

{{$setting->address ?? ''}}

</textarea>


</div>




<div class="form-group">

<label>
Logo
</label>


<input type="file"
name="logo"
class="form-control">


</div>




@if($setting && $setting->logo)

<img src="{{asset($setting->logo)}}"
width="150"
class="img-thumbnail">

@endif





<button class="btn btn-primary">

Save Settings

</button>



</form>



</div>


@endsection
