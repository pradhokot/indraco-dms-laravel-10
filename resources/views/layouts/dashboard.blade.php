<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', 'Dashboard - INDRACO Document Management System')</title>
   <link rel="shortcut icon" href="{{ asset('assets/images/icon_indraco.ico') }}" type="image/x-icon">
   <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons-1.13.1/bootstrap-icons.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
   <style>
      .app-content {
         padding: 2rem;

         @media (min-width: 1400px) {
            padding: 3rem;
         }
      }
   </style>
   @stack('styles')
</head>

<body>
   <div class="app-wrapper vstack">
      @include('partials.app-header')
      @include('partials.app-nav')
      <main class="app-content flex-grow-1 overflow-y-auto overflow-x-hidden">
         @yield('content')
      </main><!-- end app content -->
      @include('partials.app-footer')
   </div><!-- end app wrapper -->
   @include('partials.app-setting')

   <script src="{{ asset('assets/vendors/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
   @stack('scripts')
</body>

</html>
