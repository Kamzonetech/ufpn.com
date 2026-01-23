<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>{{ $title ?? 'Khahus' }}</title>

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_NG">
    <meta property="og:url" content="{{ \URL::current() }}">
    <meta property="og:title" content="{{ $title ?? 'Khahus' }}">
    <meta property="og:description"
        content="{{ $description ?? 'Khahus is specialize in providing top-tier consulting services tailored to the telecommunications industry. With over 20 years of experience in the telecommunication industry specializing in Sales and Customer Acquisition Strategies' }}">
    <meta property="og:image" content="{{ $logo ?? asset('assets/img/Meta-logo.png') }}">

    <meta property="twitter:type" content="website">
    <meta property="twitter:locale" content="en_NG">
    <meta property="twitter:url" content="{{ \URL::current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'Khahus' }}">
    <meta property="twitter:description"
        content="{{ $description ?? 'Khahus is specialize in providing top-tier consulting services tailored to the telecommunications industry. With over 20 years of experience in the telecommunication industry specializing in Sales and Customer Acquisition Strategies' }}">
    <meta property="twitter:image" content="{{ $logo ?? asset('assets/img/Meta-logo.png') }}">

    <meta name="google:card" content="summary_large_image">
    <meta name="google:url" content="{{ \URL::current() }}">
    <meta name="google:description" content="{{ $description ?? 'Khahus is specialize in providing top-tier consulting services tailored to the telecommunications industry. With over 20 years of experience in the telecommunication industry specializing in Sales and Customer Acquisition Strategies' }}">
    <meta name="google:title" content="{{ $title ?? 'Khahus' }}">
    <meta name="google:image" content="{{ $logo ?? asset('assets/img/Meta-logo.png') }}">

    <meta name="description"
        content="{{ $description ?? 'Khahus.' }}" />
    <meta name="author" content="Khahus" />
    <meta name="url" content="{{ \URL::current() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="Strategic Consulting, Technology, Advisory, Sales, Growth , Mentorship, Acquisition, Regulatory Compliance, Daimun, Training " />

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    @stack('styles')
    @livewireStyles()
</head>

<body class="index-page">

        @include('livewire.guest.includes.header')
        

        {{ $slot }}

        @include('livewire.guest.includes.footer')


     <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

   <!-- JavaScript Libraries -->
   @livewireScripts()
   @stack('scripts')

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
