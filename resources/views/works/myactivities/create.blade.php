@extends('components.modals')

@extends('layouts.app')

@section('title') Mis Actividades @endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/modules/activities/createActivities.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  <div class="container-xl">
    <h1 class="title-module"><i class="far fa-calendar-check"></i> Mis actividades</h1>
  </div>

  <nav aria-label="breadcrumb" id="box-route">
    <ol class="breadcrumb bg-white container-xl">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
    @can('matrizActividad.index')
    <li class="breadcrumb-item"><a href="{{route('mis-actividades.index')}}">Actividades</a></li>
    @endcan
    <li class="breadcrumb-item active" aria-current="page">Crear</li>
    </ol>
  </nav>

  <div class="card container-xl">
    <div class="card-header">Registro de actividad</div>
    <div class="card-body box-style-default">
      <img src="{{asset('image/imageFondos/undraw/add_no_data.svg')}}" alt="CELID - add_no_data">

      <form action="{{route('mis-actividades.store')}}" method="post" id="mActividad">
        @csrf

        <div class="mb-4 mt-4">
          <label for="fecha" class="form-label label-description @if ($errors->has('fecha')) text-danger @else text-secondary @endif">Fecha *</label>
          <input type="date" class="form-control @if ($errors->has('fecha')) border-danger @endif required" id="fecha" value="{{old('fecha')}}" autocomplete="off" name="fecha">
          <small class="form-text @error('fecha')text-danger @enderror">@error('fecha') {{$message}} @enderror</small>
        </div>

        <div class="mb-4 mt-4">
          <label for="horario" class="form-label label-description @if ($errors->has('horario')) text-danger @else text-secondary @endif">Horario</label>
          <input type="text" class="form-control @if ($errors->has('horario')) border-danger @endif" id="horario" value="{{old('horario')}}" maxlength="100" autocomplete="off" name="horario">
          <small class="form-text @error('horario')text-danger @enderror">@error('horario') {{$message}} @enderror</small>
        </div>

        <div class="mb-4 mt-4">
          <label for="modalidad" class="form-label label-description @if ($errors->has('modalidad')) text-danger @else text-secondary @endif">Modalidad</label>
          <input type="text" class="form-control text @if ($errors->has('modalidad')) border-danger @endif" id="modalidad" value="{{old('modalidad')}}" maxlength="150" autocomplete="off" name="modalidad">
          <small class="form-text @error('modalidad')text-danger @enderror">@error('modalidad') {{$message}} @enderror</small>
        </div>

        <div class="mb-4 mt-4">
          <label for="number" class="form-label label-description text-secondary">Actividades</label>
          <div class="box-control-activities">
            <input type="number" name="number" id="number" value="{{old('number',1)}}" class="form-control ignore">
            <span id="btn-increment"><i class="fas fa-plus-square"></i> Agregar</span>
            <span id="btn-decrement"><i class="fas fa-minus-square"></i> Remover</span>
          </div>
          <div class="mb-3 mt-3 box-activities"></div>
        </div>

        <div class="mb-4 mt-4">
          <label for="observacion" class="form-label label-description @if ($errors->has('observacion')) text-danger @else text-secondary @endif">Observacion</label>
          <textarea class="form-control @error('observacion') border-danger @enderror text" id="observacion" rows="3" name="observacion" maxlength="255" style="max-height: 150px;min-height:80px;">{{old('observacion')}}</textarea>
          <small class="form-text @error('observacion')text-danger @enderror">@error('observacion') {{$message}} @enderror</small>
        </div>

        <br><hr>
        <button class="btn btn-success mr-3 mb-3" id="btn-fr">Crear</button>
        <a href="{{route('mis-actividades.index')}}" class="btn btn-light mb-3">Volver</a>
      </form>

    </div>
  </div>

@endsection
@section('js')
<script src="{{asset('js/config/peticiones.js')}}"></script>
<script src="{{asset('js/validations/activities/validation.activities.js')}}"></script>
<script src="{{asset("js/config/validations.js")}}"></script>
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    //js/config/validations.js
    @if ($errors->any())
    removeStyleErrorFormatOne('input');
    removeStyleErrorFormatOne('textarea');
    removeStyleErrorFormatOne('select');
    @endif
    //js/validations/activities/validation.activities.js
    createdElementForDefault();
    actionEventIncrementAndDecrementButton();
    actionEventChangeInputNumber();
    actionEventKeyupInputNumber();
    actionEventDeleteElement();
    sendDataFormMatrizActividad();
    //validar en que interfaz estamos
    setModo('personal');

    @if (session('status_success'))
      //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
    @endif

    //obtener el valor del array - contar sus elemento - rellenar los campos nuevamente
    @if (is_array(old('actividades')))
      @foreach (old('actividades') as $key => $item)
      returnValueElementCreated({{$key}},"{{$item}}");
      @endforeach
    @endif
  });
</script>
@endsection