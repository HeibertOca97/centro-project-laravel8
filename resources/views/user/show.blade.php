@extends('components.modals')

@extends('layouts.root')

@section('title') Gestion de usuarios @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/modules/user/createUser.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  
  <div class="container-xl">
    <h1 class="title-module"><i class="fas fa-users"></i> Gestion de usuarios</h1>
  </div>
  
  <nav aria-label="breadcrumb" id="box-route">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver</li>
    </ol>
  </nav>

  <div class="card container-xl">
    <div class="card-header">Informacion del usuario n° {{$user->id}}</div>
    <div class="card-body content-info">
      <img src="@if ($user->avatar) {{asset($user->avatar)}} @else {{asset('image/perfil/user_man.svg')}}  @endif" alt="{{$user->nombre}}">
      <div class="info-user">
        <div>
          <h6>Rol: </h6>
          <p class="text-secondary"> @if ($user->getRoleNames()->toArray()) {{$user->getRoleNames()[0]}} @else Sin especificar @endif</p>
        </div><hr>
        
        <div>
          <h6>Cedula: </h6>
          <p class="text-secondary"> @if ($user->cedula) {{$user->cedula}} @else Sin especificar @endif</p>
        </div><hr>
        
        <div>
          <h6>Nombres completos: </h6>
          <p class="text-secondary"> @if ($user->nombres && $user->apellidos) {{$user->nombres}} {{$user->apellidos}} @else Sin especificar @endif</p>
        </div><hr>

        <div>
          <h6>Correo: </h6>
          <p class="text-secondary">@if ($user->email) {{$user->email}}@else Sin especificar @endif</p>
        </div><hr>
        
        <div>
          <h6>Nombre de usuario: </h6>
          <p class="text-secondary">@if ($user->username) {{$user->username}}@else Sin especificar @endif</p>
        </div><hr>
        
        <div>
          <h6>Cargo: </h6>
          <p class="text-secondary">@if ($user->cargo) {{$user->cargo}}@else Sin especificar @endif</p>
        </div><hr>
        
        <div>
          <h6>Estado de cuenta: </h6>
          <p class="text-secondary">@if ($user->status == 1) <span class="badge badge-success">Activo</span> @else <span class="badge badge-danger">Inactivo</span> @endif</p>
        </div><hr>
        
        <div>
          <h6>Fecha de creacion: </h6>
          <p class="text-secondary">@if ($user->created_at) {{$user->created_at->toFormattedDateString()}}@endif</p>
        </div><hr>
          <h6>Ultima actualizacion: </h6>
          <p class="text-secondary">@if ($user->updated_at) {{$user->updated_at->diffForHumans()}}@endif</p>
        </div><hr>

      </div>
    </div>
    <div class="card-footer">
      <a href="{{route('users.editAll',$user)}}" class="btn btn-info d-block">Editar</a>

    </div>
  </div>
@endsection
@section('js')

@endsection

