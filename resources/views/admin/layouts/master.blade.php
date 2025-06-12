<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    @include('admin.includes.link')
  </head>
  <body>
   @include('admin.includes.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100">
     @include('admin.includes.header')
     @yield('content')
     @include('admin.includes.footer')
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('assets/admin/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/simplebar.min.js') }}"></script>
    <script>
      const header = document.querySelector('header.header');
      
      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
      
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset('assets/admin/js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/admin/js/coreui-chartjs.js') }}"></script>
    <script src="{{ asset('assets/admin/js/index.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <script> 
    </script>
  </body>
</html>