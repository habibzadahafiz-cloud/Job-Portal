
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('Admin_front/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('Admin_front/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('Admin_front/css/font.css') }}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('Admin_front/css/style.default.css') }}" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes-->
    {{--  <link rel="stylesheet" href="{{ asset('Admin_front/css/custom.css') }}">  --}}
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('Admin_front/img/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
@include('Admin.header')
    <div class="d-flex align-items-stretch">
@include('Admin.sidebar')
      <div class="page-content">
{{--  @include('Admin.content')  --}}
@yield('content')

        </div>

    </div>
@include('Admin.footer')
    <!-- JavaScript files-->
    <script src="{{ asset('Admin_front/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin_front/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('Admin_front/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Admin_front/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('Admin_front/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('Admin_front/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('Admin_front/js/charts-home.js') }}"></script>
    <script src="{{ asset('Admin_front/js/front.js') }}"></script>



    <style>

    /* Chrome, Edge, Safari scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #1e1e1e; /* د scrollbar شالید */
}

::-webkit-scrollbar-thumb {
    background: #333; /* د حرکت کوونکي برخې رنګ */
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: #555;
}


/* Firefox scrollbar */
* {
    scrollbar-width: thin;
    scrollbar-color: #333 #1e1e1e;
}
</style>
  </body>
</html>
