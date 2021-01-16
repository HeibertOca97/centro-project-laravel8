@extends('components.modals')

@extends('layouts.app')

@section('title') Plan de Trabajo @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/modules/planes/createPlanes.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  
  <div class="container-xl">
    <h1 class="title-module"><i class="fas fa-book"></i> Plan de Trabajo</h1>
  </div>
  
  <nav aria-label="breadcrumb" id="box-route">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    @can('plantrabajo.index')
    <li class="breadcrumb-item"><a href="{{route('planes.index')}}">Plan de Trabajo</a></li>
    @endcan
    <li class="breadcrumb-item active" aria-current="page">Crear</li>
    </ol>
  </nav>

  <div class="card container-xl">
    <div class="card-header">Registro de trabajo</div>
    <div class="card-body box-style-default">
      <img src="{{asset('image/imageFondos/undraw/add_completed_tasks.svg')}}" alt="CELID - add_tasks">

    <form action="{{route('planes.store')}}" method="post" id="formPlanTrabajo">
        @csrf

        <div class="mb-4">
          <label for="eventos" class="form-label label-description @if ($errors->has('evento')) text-danger @else text-secondary @endif">Evento</label>
          <textarea class="form-control @error('evento') border-danger @enderror" id="eventos" rows="3" name="evento" maxlength="255" style="max-height: 150px;min-height:80px;">{{old('evento')}}</textarea>
          <small class="form-text @error('evento') text-danger @enderror">@error('evento') {{$message}} @enderror</small>
        </div>

        <div class="mb-4 mt-4">
          <label for="lugar" class="form-label label-description @if ($errors->has('lugar')) text-danger @else text-secondary @endif">Lugar</label>
          <input type="text" class="form-control @if ($errors->has('lugar')) border-danger @endif" id="lugar" value="{{old('lugar')}}" maxlength="100" autocomplete="off" name="lugar">
          <small class="form-text @error('lugar')text-danger @enderror">@error('lugar') {{$message}} @enderror</small>
        </div>

        <div class="mb-4 mt-4">
          <label for="responsables" class="form-label label-description @if ($errors->has('responsables')) text-danger @else text-secondary @endif">Responsables</label>
          <textarea class="form-control @error('responsables') border-danger @enderror text" id="responsables" rows="3" name="responsables" maxlength="200" style="max-height: 150px;min-height:80px;">{{old('responsables')}}</textarea>
          <small class="form-text @error('responsables')text-danger @enderror">@error('responsables') {{$message}} @enderror</small>
        </div>

        <div class="mb-4 mt-4">
          <label for="fecha" class="form-label label-description @if ($errors->has('fecha')) text-danger @else text-secondary @endif">Fecha</label>
          <input type="date" class="form-control @if ($errors->has('fecha')) border-danger @endif" id="fecha" value="{{old('fecha')}}" autocomplete="off" name="fecha">
          <small class="form-text @error('fecha')text-danger @enderror">@error('fecha') {{$message}} @enderror</small>
        </div>

        <div class="mb-4 mt-4">
          <label for="hora" class="form-label label-description @if ($errors->has('hora')) text-danger @else text-secondary @endif">Hora</label>
          <input type="text" class="form-control @if ($errors->has('hora')) border-danger @endif" id="hora" value="{{old('hora')}}" maxlength="50" autocomplete="off" name="hora">
          <small class="form-text @error('hora')text-danger @enderror">@error('hora') {{$message}} @enderror</small>
        </div>

        <br><hr>
          <button type="submit" class="btn btn-success  mr-3 mb-3">Crear</button>
          <a href="{{route('planes.index')}}" class="btn btn-light mb-3">Volver</a>
        
      </form>
    </div>
  </div>
@endsection
@section('js')
<script src="{{asset('js/validations/planes/validation.planes.js')}}"></script>
<script src="{{asset("js/config/validations.js")}}"></script>
<script>
document.addEventListener('DOMContentLoaded',()=>{
  // js/config/validations.js
  removeStyleErrorFormatOne('input');
  removeStyleErrorFormatOne('textarea');
  // js/components/planes/validation.planes.js
  sendDataFormPlanTrabajo();
  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection