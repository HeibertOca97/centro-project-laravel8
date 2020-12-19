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
  
  @role('super admin')
    @include('components.cards-status',[
      'num_users'=>$users,
      'numPermission'=>$numPermission
    ])
  @else
    @include('components.welcome',['numPermission'=>$numPermission])
  @endrole
  
@endsection