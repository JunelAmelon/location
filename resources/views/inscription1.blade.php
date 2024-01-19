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
</head>

<body>

  <!-- ======= Header ======= -->
<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="index.html">Auto<span style="color:#00b371;">Car</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        
          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">About</a></li>
              <li><a class="nav-link scrollto" href="#services">Services</a></li>
              <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

          <a href="/connexion" class="get-started-btn scrollto">login</a>
        </div>
      </div>
 
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h1>Auto<span style="color:#00b371;">Car</span> - Pour un choix de modèle de voiture haut de gamme</h1>
          <h2>Optez pour nos services et rejoignez nous maintenant</h2>
          <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <!-- ====Header end ======== -->


  <!-- ====Header end ======== -->

  <!-- Connection card -->

    <form method="POST" action="{{route('inscription')}}" class="container mt-5" style="width:50%; margin-bottom:4%; padding:0%; ">
      @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <p style="text-align: center; color: #ea1f33;">{{$error}}</p>
                    @endforeach
                    @endif
    <div class="row">
          <div class="mb-5 text-center" style="color:#00b371; font-weight: bold; font-size:38px" >Inscription</div>
          <!-- <div style="background-color:#00b371; width: 50%; height:1vh;" class="mb-5 pl-0"></div> -->
        <div class=" form-group ">
                  <input type="text" class="form-control" name="nomPrenom" id="nomPrenom" placeholder="Nom et Prénom" required> <br>
        </div><br>
        <div class="form-group ">
                  <input type="email" class= "form-control"  name="email" id="email" placeholder="Email" required> <br>
        </div><br>
         <div class="form-group ">
                  <input class="form-control" type="text" name="adresse" id="adresse" placeholder="Adresse" required>
                  <br>
          </div><br>
         <div class="form-group ">
                   <input class="form-control" type="password" name="password" id="password-input" placeholder="Mot de passe" required><br>
                   <i class="toggle-password fa fa-eye-slash" aria-hidden="true"></i> <br>
        </div><br><br>
        </div>
         <div class="form-group">
            <input class="btn mt-1 w-25 " style="background-color:#00b371; color:white;" type="submit" name ="inscription" value="S'inscrire"><br>
        </div> <br>  
        Vous avez déjà un compte ? <a href="{{route('connexion')}}" style="color:#00b371; font-style: none;">Connectez-vous !</a>
      @csrf
    </form>

  <!-- end connection card -->


</body>
 <!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</html>