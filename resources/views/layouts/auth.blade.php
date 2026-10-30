<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', 'Login - INDRACO Document Management System')</title>
   <link rel="shortcut icon" href="{{ asset('assets/images/icon_indraco.ico') }}" type="image/x-icon">
   <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons-1.13.1/bootstrap-icons.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
   <script src="{{ asset('assets/js/app.js') }}"></script>
   @stack('styles')
</head>

<body>
   <div class="app-wrapper position-relative"
      style="background-image: url('{{ asset('assets/images/indraco_bg.jpg') }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">

      <div class="bg-overlay w-100 h-100 position-absolute top-50 start-50 z-0"
         style="background-image: radial-gradient(transparent, var(--bs-body-bg)); background-repeat: no-repeat; background-position: center; background-size: cover; backdrop-filter: blur(2px); transform: translate(-50%, -50%) scale(1.2);">
      </div><!-- end bg overlay -->

      <!-- Menu Utility Halaman Login & Tombol Tutup Web View -->
      <div class="login-utility-menu position-absolute top-0 end-0 m-3 z-2 d-flex align-items-center gap-2">
         <x-utility-buttons size="sm" />
         <button class="btn btn-sm btn-danger rounded-1" type="button" aria-label="Tutup aplikasi" title="Tutup Aplikasi">
            <i class="bi bi-power" aria-hidden="true"></i>
         </button>
      </div><!-- end login utility menu -->

      @yield('content')

   </div><!-- end wrapper -->

   <script src="{{ asset('assets/vendors/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
   @stack('scripts')
</body>

</html>
