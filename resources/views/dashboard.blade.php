@extends('components.modals')

@extends('layouts.app')

@section('title') Dashboard @endsection
<!--SECCION DE LA BARRA MENU-->
@section('barra-menu')
  @include('layouts.partials.menu')
@endsection
<!--SECCION DEL CONTENIDO HEADER Y SECTION-->
@section('section-content')
  @include('layouts.partials.header')
  <div id="box-main-content">
    
    @include('components.cards-status',[
      'num_users'=>$users,
      'numPermission'=>$numPermission
    ])
    
  </div>
@endsection