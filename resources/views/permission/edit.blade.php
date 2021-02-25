@extends('components.modals',['modal'=>''])

@extends('layouts.app')

@section('title') Gestion de permisos @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/modules/permission/createPermission.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  
  <div class="container-xl">
    <h1 class="title-module"><i class="fas fa-user-shield"></i> Gestion de permisos</h1>
  </div>
  
  <nav aria-label="breadcrumb" id="box-route">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    @can('permission.index')
    <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permisos</a></li>
    @endcan
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
    </ol>
  </nav>

  <div class="card container-xl">
    <div class="card-header">Actualizacion de permiso</div>
    <div class="card-body d-flex justify-content-center">
    <form action="{{route('permissions.update',$permission)}}" method="post" class="w-auto col-12" style="max-width: 450px;" id="formPermission">
        @csrf
        @method('PUT')

        <div class="mb-4 mt-4">
          <label for="nombre" class="form-label label-description @if ($errors->has('nombre')) text-danger @else text-secondary @endif">Nombre *</label>
        <input type="text" class="form-control text @if ($errors->has('nombre')) border-danger @endif" id="nombre" value="{{old('nombre',$permission->name)}}" maxlength="191" autocomplete="off" name="nombre" data-name="nombre">
        <small class="form-text @error('nombre')text-danger @enderror">@error('nombre') {{$message}} @enderror</small>
        </div>

        <div class="mb-4">
          <label for="descripcion" class="form-label label-description @if ($errors->has('descripcion')) text-danger @else text-secondary @endif">Descripcion</label>
          <textarea class="form-control text @error('descripcion') border-danger @enderror" id="descripcion" rows="3" name="descripcion" maxlength="191" style="max-height: 150px;" data-name="descripcion">{{old('descripcion',$description[0])}}</textarea>
          <small class="form-text @error('descripcion') text-danger @enderror">@error('descripcion') {{$message}} @enderror</small>
        </div>

        <br><hr>
          <button type="submit" class="btn btn-success  mr-3 mb-3">Actualizar</button>
          <a href="{{route('permissions.index')}}" class="btn btn-light mb-3">Volver</a>
  
      </form>
    </div>
  </div>
@endsection
@section('js')
<script src="{{asset("js/validations/permission/validation.permission.js")}}"></script>
<script src="{{asset("js/config/validations.js")}}"></script>
<script>
document.addEventListener('DOMContentLoaded',()=>{
  //js/config/validations.js
  removeStyleErrorFormatOne('input');
  removeStyleErrorFormatOne('textarea');
  // js/components/permiso/validation.permission.js
  sendDataFormPermission();
  
  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection

