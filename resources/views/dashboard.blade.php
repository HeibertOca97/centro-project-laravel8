@extends('components.modals')

@extends('layouts.root')

@section('title') Dashboard @endsection
<!--SECCION DE LA BARRA MENU-->
@section('barra-menu')
  <nav id="bar-menu">
  <p class="txt-clasificador">Principal</p>
  <a href="{{route('dashboard')}}" class="opt-link">
    <div class="{{request()->routeIs('dashboard') ? 'activeRoute' : ' '}}">
      <i class="fas fa-tachometer-alt"></i>
    <p>Tablero</p>
    </div>
  </a>
  <hr>
  <p class="txt-clasificador">Gestiones</p>
  <a href="" class="opt-link">
    <div>
      <i class="fas fa-tachometer-alt"></i>
      <p>Usuarios</p>
    </div>
  </a>
  <div class="opt-list">
    <div state="false">
      <i class="fas fa-book"></i><p>Academico</p><i class="fas fa-plus"></i>
    </div>
    <main class="list-link">
      <a href="#">
        <div>
          <i class="fas fa-check"></i>
          <p>Facultades</p>
        </div>
      </a>
      <a href="#">
        <div>
          <i class="fas fa-check"></i>
          <p>Carreras</p>
        </div>
      </a>
      <a href="#">
        <div>
          <i class="fas fa-check"></i>
          <p>Periodos</p>
        </div>
      </a>
    </main>
  </div>
  <div class="opt-list">
    <div state="false">
      <i class="fas fa-briefcase"></i><p>Proyectos</p><i class="fas fa-plus"></i>
    </div>
    <main class="list-link">
      <a href="#">
        <div>
          <i class="fas fa-check"></i>
          <p>Estudiantiles</p>
        </div>
      </a>
      <a href="#">
        <div>
          <i class="fas fa-check"></i>
          <p>Escuela de lideres</p>
        </div>
      </a>
    </main>
  </div>
</nav>
@endsection
<!--SECCION DEL CONTENIDO HEADER Y SECTION-->
@section('section-content')

@include('components.header')

<button class="btn btn-primary">Bootstrap</button>

<!-- Button trigger modal -->



@endsection