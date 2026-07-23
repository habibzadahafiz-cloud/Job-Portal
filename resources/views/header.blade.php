
@extends('maindesign')

@section('header')

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="text-sm col-sm-8">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="text-sm text-right col-sm-4">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="shadow-sm navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="ml-auto navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ Route('index') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="front_end/html/about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="front_end/html/doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="front_end/html/blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="front_end/html/contact.html">Contact</a>
            </li>
            @if(!Auth::check())
             <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
            </li>
             <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
            </li>
            @else
            <li class="nav-item">

                <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

            </li>
              <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('dashboard') }}">dashboard</a>
            </li>
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
@endsection
