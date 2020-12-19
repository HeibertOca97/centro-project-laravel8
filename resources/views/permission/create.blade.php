@extends('components.modals')

@extends('layouts.root')

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
    <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permisos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Crear</li>
    </ol>
  </nav>

  <div class="card container-xl">
    <div class="card-header">Registro de permisos</div>
    <div class="card-body d-flex justify-content-center">
    <form action="{{route('permissions.store')}}" method="post" class="w-auto col-12" style="max-width: 450px;" id="formPermission">
        @csrf

        <div class="mb-4 mt-4">
          <label for="nombre" class="form-label label-description @if ($errors->has('nombre')) text-danger @else text-secondary @endif">Nombre *</label>
        <input type="text" class="form-control text @if ($errors->has('nombre')) border-danger @endif" id="nombre" value="{{old('nombre')}}" maxlength="191" autocomplete="off" name="nombre" required>
        <small class="form-text @error('nombre')text-danger @enderror">@error('nombre') {{$message}} @enderror</small>
        </div>

        <div class="mb-4">
          <label for="descripcion" class="form-label label-description @if ($errors->has('descripcion')) text-danger @else text-secondary @endif">Descripcion</label>
          <textarea class="form-control text @error('descripcion') border-danger @enderror" id="descripcion" rows="3" name="descripcion" maxlength="191" style="max-height: 150px;">{{old('descripcion')}}</textarea>
          <small class="form-text @error('descripcion') text-danger @enderror">@error('descripcion') {{$message}} @enderror</small>
        </div>

        <br><hr>
          <button type="submit" class="btn btn-success  mr-3 mb-3">Crear</button>
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
  // js/components/permiso/validation.permission.js
  sendDataFormPermission();

  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection

