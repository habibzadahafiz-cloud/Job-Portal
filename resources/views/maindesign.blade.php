<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="front_end/assets/css/maicons.css">

  <link rel="stylesheet" href="front_end/assets/css/bootstrap.css">

  <link rel="stylesheet" href="front_end/assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="front_end/assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="front_end/assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

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
    @if(Auth::user()->user_type == 'admin')

        <li class="nav-item">
            <a class="btn btn-primary ml-lg-3"
               href="{{ route('dashboard') }}">
                Admin Dashboard
            </a>
        </li>

    @endif
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
<!--   Page Hero -->

  <!-- Doctors section -->
@yield('index_page')
<div class="page-section bg-light">
    <div class="container">

        <h1 class="text-center wow fadeInUp">Latest News</h1>

        <div class="mt-5 row">

            @foreach($news as $item)

            <div class="py-2 col-lg-4 wow zoomIn news-card">
                <div class="card-blog">

                    <div class="header">
                        <div class="post-category">
                            <a href="#">{{ $item->category }}</a>
                        </div>

                        <a href="#" class="post-thumb">
                            <img src="{{ asset('News/'.$item->image) }}" alt="">
                        </a>
                    </div>

                    <div class="body">
                        <h5 class="post-title">
                            <a href="#">{{ $item->title }}</a>
                        </h5>

                        <p>
                            {{ Str::limit($item->description, 80) }}
                        </p>

                        <div class="site-info">
                            <span class="mai-time"></span>
                            {{ $item->created_at->diffForHumans() }}
                        </div>
                    </div>

                </div>
            </div>

            @endforeach

        </div>

        <!-- Read More Button -->
<div class="mt-4 text-center">
    <button id="loadMoreBtn"
            class="btn btn-primary">
        Read More
    </button>
</div>

    </div>
</div>

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

     <form action="{{ route('appointment.store.front') }}" method="POST">
    @csrf

    <input type="text" name="name" class="form-control" placeholder="Patient Name">

    <input type="email" name="email" class="form-control" placeholder="Email">

    <input type="text" name="phone" class="form-control" placeholder="Phone">
    <input type="number" name="age" class="form-control" placeholder="Age">
    <select name="gender" class="form-control">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>

    <textarea name="address" class="form-control" placeholder="Address"></textarea>

    <select name="doctor_id" class="form-control">
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}">
                {{ $doctor->name }}
            </option>
        @endforeach
    </select>

    <input type="date" name="appointment_date" class="form-control">

    <input type="time" name="appointment_time" class="form-control">

    <button type="submit" class="btn btn-primary">
        Book Appointment
    </button>
</form>
    </div>
  </div> <!-- .page-section -->

  <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="front_end/assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="mb-3 font-weight-normal">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="front_end/assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="front_end/assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->

  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="py-3 col-sm-6 col-lg-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="py-3 col-sm-6 col-lg-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="py-3 col-sm-6 col-lg-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="py-3 col-sm-6 col-lg-3">
          <h5>Contact</h5>
          <p class="mt-2 footer-link">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">healthcare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="mt-3 footer-sosmed">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

<script>
document.addEventListener("DOMContentLoaded", function () {

    let cards = document.querySelectorAll('.news-card');
    let btn = document.getElementById('loadMoreBtn');

    let expanded = false;

    function hideExtraNews() {
        cards.forEach((card, index) => {
            if (index >= 3) {
                card.style.display = 'none';
            }
        });

        btn.innerText = 'Read More';
        expanded = false;
    }

    function showAllNews() {
        cards.forEach(card => {
            card.style.display = 'block';
        });

        btn.innerText = 'Show Less';
        expanded = true;
    }

    hideExtraNews();

    btn.addEventListener('click', function () {

        if (expanded) {
            hideExtraNews();
        } else {
            showAllNews();
        }

    });

});
</script>


<script src="front_end/assets/js/jquery-3.5.1.min.js"></script>

<script src="front_end/assets/js/bootstrap.bundle.min.js"></script>

<script src="front_end/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="front_end/assets/vendor/wow/wow.min.js"></script>

<script src="front_end/assets/js/theme.js"></script>

</body>
</html>
