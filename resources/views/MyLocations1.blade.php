<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenu chez AutoCar</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 <!-- Favicons -->
<link href="{{ asset('favicon.png') }}" rel="icon">
<link href="{{ asset('apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('../assets/css/mylocations.css') }}" rel="stylesheet">


  <!-- =======================================================
  * Template Name: KnightOne
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background: #E4E9E7;">

  <!-- ======= Header ======= -->

<!-- ======= Header ======= -->
<header id="header" class="fixed-top " style="background: black;">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="/">Auto<span style="color:#00b371;">Car</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto active" href="/">Home</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
              {{-- @if(session()->has('user_id'))
            <a href="">{{ session()->get('email') }}</a>
            @else --}}
            @if(!auth()->user())

          <li><a href="{{route('inscription')}}" class="">login<i class="bi-sign-do-not-enter-fill" style="color:#00b371;"></i></li></a>
          @elseif(auth()->user()->admin)
            <li><a href="{{ route('myLocations') }}" class="nav-link scrollto">Mes Locations</a></li>
            <li><a href="{{ route('dashboard') }}" class="nav-link scrollto">Dashboard</a></li>
            <li><a href="{{ route('deconnexion') }}" class="nav-link scrollto">logout</a></li>
            @else
             <li><a href="{{ route('myLocations') }}" class="nav-link scrollto">Mes Locations</a></li>
             <li><a class="nav-link scrollto" href="{{route('allCars')}}">Voitures</a></li>
             <li><a href="{{ route('deconnexion') }}" class="nav-link scrollto">logout</a></li>



            @endif

        {{-- @endif --}}
         {{-- <button class="login_btn" id="login_btn">login</button> --}}
          </nav><!-- .navbar -->

        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <section class="home_section" style="width: 100%;" >
    <div class="details">
      <div class="recent_project">
        <div class="card_header" style="text-align: center;">
          <h2 style="display: inline;">Vos locations</h2> <span><input type="search"  class= "form-control" style="width:40%; display:inline; margin-left:30%;" placeholder="Rechercher une voiture"></span>
        </div>
        <table>
          <thead>
           <tr>
              <td>Utilisateur</td>
              <td>Voiture</td>
              <td>Date debut</td>
              <td>Date fin</td>
             <td>Cout total</td>
              <td>Statut</td>
            </tr>
          </thead>
          <tbody>
             @foreach ($locations as $location)
            <tr>
              <td>{{ $location->nomPrenom }}</td>
                 <td><img style="width:40px;" src="{{ $location->image }}" alt="">{{ $location->marque }} {{ $location->modele }}</td>
                                    <td>{{ $location->date_debut }}</td>
                                    <td>{{ $location->date_fin }}</td>
                                    <td>{{ $location->cout_total }} FCFA</td>
                                    @if( $location->statut == 0)
                                    <td>
                                        <!-- <p class="status cancelled">Loué</p> -->
                                         <span class="badge bg_danger">
                                         Loué
                                          </span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="badge bg_danger">
                                         Rendu
                                        </span>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Auto<span style="color:#00b371;">Car</span></h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span> Auto<span style="color:#00b371;">Car</span></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
         <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">AutoCar</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>
