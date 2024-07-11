<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Informasi Kerja Sama Daerah "SIMERAH" Kabupaten Bengkalis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('images/favicon.png')}}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('Personal/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('Personal/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('Personal/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('Personal/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('Personal/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('Personal/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('Personal/assets/css/style.css')}}" rel="stylesheet">
	@stack('css')
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  
      <!--header-->
      @include('frontend.partials.header')
      <!--/header-->

            @yield('content')

      <!--Footer-->
      @include('frontend.partials.footer')
      <!--/footer-->


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('Personal/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('Personal/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Personal/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('Personal/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('Personal/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('Personal/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('Personal/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('Personal/assets/js/main.js')}}"></script>
@stack('js')
</body>
</html>