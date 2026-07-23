@extends('maindesign')


{{--
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
    <link rel="stylesheet" href="Admin_front/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="Admin_front/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="Admin_front/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="Admin_front/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="Admin_front/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="Admin_front/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>


    <style>
        .dropdown-item:hover {
    background-color: #f8f9fa;
    color: #fff !important;
}
button.dropdown-item:hover {
    background-color: #f8f9fa;
    color: #fff !important;
}
    </style>
    <div class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="Admin_front/index.html" class="navbar-brand">
              <div class="visible brand-text brand-big text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>

          <div class="center-menu list-inline no-margin-bottom">
            <div class="list-inline-item"><a>one</a></div>
            <div class="list-inline-item"><a>Two</a></div>
            <div class="list-inline-item"><a>Three</a></div>
          </div>

          <div class="right-menu list-inline no-margin-bottom">
            <div class="list-inline-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><span class="d-none d-sm-inline-block">English</span></a>
              <div aria-labelledby="languages" class="dropdown-menu"><a rel="nofollow" href="{{ url('lang/en') }}" class="dropdown-item"><span>English</span></a><a rel="nofollow" href="{{ url('lang/ps') }}" class="dropdown-item"> <span>Pashto</span></a></div>
            </div>

    <!-- User Dropdown -->
    <div class="list-inline-item dropdown">
        <a id="userDropdown"
           href="#"
           data-toggle="dropdown"
           aria-haspopup="true"
           aria-expanded="false"
           class="nav-link dropdown-toggle">

            {{ Auth::user()->name }}
        </a>

        <div aria-labelledby="userDropdown" class="dropdown-menu dropdown-menu-right">

            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                <i class="fa fa-user"></i> Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item" style="color: inherit; border:none; ">
                    <i class="fa fa-sign-out"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>
        </div>
      </nav>
      </div>
    </header>



        <!-- JavaScript files-->
    <script src="Admin_front/vendor/jquery/jquery.min.js"></script>
    <script src="Admin_front/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="Admin_front/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="Admin_front/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="Admin_front/vendor/chart.js/Chart.min.js"></script>
    <script src="Admin_front/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="Admin_front/js/charts-home.js"></script>
    <script src="Admin_front/js/front.js"></script>
  </body>
</html>  --}}
