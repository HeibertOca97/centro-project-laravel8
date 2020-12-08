@extends('components.modals')

@extends('layouts.root')

@section('title') Dashboard @endsection
<!--SECCION DE LA BARRA MENU-->
@section('barra-menu')
  @include('layouts.partials.menu')
@endsection
<!--SECCION DEL CONTENIDO HEADER Y SECTION-->
@section('section-content')
  @include('layouts.partials.header')
  
  @include('components.box-status',[
    'num_users'=>$users
  ])

@endsection