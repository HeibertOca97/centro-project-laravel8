<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{asset('image/logo/logo-mini.png')}}" type="image/x-icon">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'CELID') }}</title>
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Grandstander&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Grandstander:wght@500&display=swap" rel="stylesheet">
    <!--ICON-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!--LIBS-->
    <!--BOOTSTRAP CSS 4.5.3-->
    <link rel="stylesheet" href="{{asset("css/lib/bootstrap.min.css")}}">
    <!--JQUERY-->
    <script src="{{asset('js/lib/jquery-3.5.1.min.js')}}"></script>
    <!--JQUERY POPPER 1.16.0-->
    <script src="{{asset('js/lib/popper.min.js')}}"></script>
    <!--BOOTSTRAP JS 4.4.1-->
    <script src="{{asset('js/lib/bootstrap.min.js')}}"></script>
    <!-- css personalizado-->
    <link rel="stylesheet" href="{{asset("css/config/glob.css")}}">
    <link rel="stylesheet" href="{{asset('css/lib/sweetalert2.min.css')}}">
    <script src="{{asset('js/lib/push.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/lib/toastr.min.css')}}">
    @yield('css')

    @yield('lib')

</head>
<body>  
  <div class="box-loaded"><img src="{{asset('image/logo/logo.png')}}" alt="Logo"><p>Cargando....</p></div>

  @include('layouts.partials.section')

  <script src="{{asset('js/glob.js')}}"></script>
  <script src="{{asset('js/lib/sweetalert2.all.min.js')}}"></script>
  <script src="{{asset('js/config/messageAlert.js')}}"></script>
  <script src="{{asset('js/lib/toastr.min.js')}}"></script>
  @yield('js')
  
</body>
</html>