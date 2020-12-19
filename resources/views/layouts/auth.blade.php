<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{asset('image/logo/logo-mini.png')}}" type="image/x-icon">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Grandstander&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Grandstander:wght@500&display=swap" rel="stylesheet">
    <!--ICON-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!--LIBS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/lib/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lib/toastr.min.css')}}">
    <!--JQUERY-->
    <script src="{{asset('js/lib/jquery-3.5.1.min.js')}}"></script>
    <!--JQUERY POPPER-->
    <script src="{{asset('js/lib/popper.min.js')}}"></script>
    @yield('css')

    @yield('lib')
</head>
<body>
  <div class="box-loaded"><img src="{{asset('image/logo/logo.png')}}" alt="Logo"><p>Cargando....</p></div>

  @yield('content')

  <script src="{{asset('js/glob.js')}}"></script>
  <script src="{{asset('js/lib/sweetalert2.all.min.js')}}"></script>
  <script src="{{asset('js/lib/toastr.min.js')}}"></script>
  @yield('js')
</body>
</html>