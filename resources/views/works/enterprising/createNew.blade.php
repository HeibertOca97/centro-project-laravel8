@extends('components.modals',['modal'=>''])

@extends('layouts.app')

@section('title') Gestion de emprendedores @endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/modules/enterprising/createEnterprising.css')}}">
@endsection

@section('barra-menu')
  @include('layouts.partials.menu')
@endsection

@section('section-content')
  @include('layouts.partials.header')
  
  <div class="container-xl">
    <h1 class="title-module"><i class="fas fa-user-shield"></i> Gestion de emprendedores</h1>
  </div>
  
  <div class="container-xl">
    <nav aria-label="breadcrumb" id="box-route">
      <ol class="breadcrumb bg-white container-xl">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
      @can('emprendedor.index')
      <li class="breadcrumb-item"><a href="{{route('emprendedores.index')}}">Emprendedores</a></li>
      @endcan
        <li class="breadcrumb-item active" aria-current="page">Formulario Inscripcion</li>
      </ol>
    </nav>
  </div>
  
  <div class="container-xl">
    <div class="card">
      <div class="card-header">Formulario de Inscripcion: <span class="badge badge-danger">New</span></div>
      <div class="card-body">
        <h5 class="mt-4 mb-4 text-center" style="text-decoration: underline;">DATOS DEL EMPRENDEDOR</h5>
      <form action="{{route('emprendedores.store')}}" method="post" id="formEmp">
          @csrf
          <div class="row border rounded mt-3 mb-3">
            <div class="col-sm-6">
              <div class="form-group mt-4 mb-4">
                <label for="fecha_n"class="@if ($errors->has('fec_nac')) text-danger @else text-secondary @endif label-description">Fecha de nacimiento *</label>
                <input type="date" name="fec_nac" class="form-control @if ($errors->has('fec_nac')) border-danger @endif required" id="fecha_n" aria-describedby="fecha_n-description" autocomplete="off" value="{{old('fec_nac')}}">
                <small id="fecha_n-description" class="form-text @error('fec_nac')text-danger @enderror">@error('fec_nac') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4">
                <label for="cedula"class="@if ($errors->has('cedula')) text-danger @else text-secondary @endif label-description">Cedula de identidad *</label>
                <input type="number" name="cedula" class="form-control @if ($errors->has('cedula')) border-danger @endif num required" id="cedula" aria-describedby="cedula-description" autocomplete="off" value="{{old('cedula')}}" maxlength="10">
                <small id="cedula-description" class="form-text @error('cedula')text-danger @enderror">@error('cedula') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4">
                <label for="nombres"class="@if ($errors->has('nombres')) text-danger @else text-secondary @endif label-description">Nombres *</label>
                <input type="text" name="nombres" class="form-control @if ($errors->has('nombres')) border-danger @endif text required" id="nombres" aria-describedby="nombres-description" autocomplete="off" value="{{old('nombres')}}" maxlength="50">
                <small id="nombres-description" class="form-text @error('nombres')text-danger @enderror">@error('nombres') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4">
                <label for="apellidos"class="@if ($errors->has('apellidos')) text-danger @else text-secondary @endif label-description">Apellidos *</label>
                <input type="text" name="apellidos" class="form-control @if ($errors->has('apellidos')) border-danger @endif text required" id="apellidos" aria-describedby="apellidos-description" autocomplete="off" value="{{old('apellidos')}}" maxlength="50">
                <small id="apellidos-description" class="form-text @error('apellidos')text-danger @enderror">@error('apellidos') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4">
                <label for="email"class="@if ($errors->has('email')) text-danger @else text-secondary @endif label-description">Email *</label>
                <input type="email" name="email" class="form-control @if ($errors->has('email')) border-danger @endif required" id="email" aria-describedby="email-description" autocomplete="off" value="{{old('email')}}" maxlength="100" placeholder="ejemplo@mail.com">
                <small id="email-description" class="form-text @error('email')text-danger @enderror">@error('email') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4">
                <label for="ciudad"class="@if ($errors->has('ciudad')) text-danger @else text-secondary @endif label-description">Ciudad</label>
                <input type="text" name="ciudad" class="form-control @if ($errors->has('ciudad')) border-danger @endif text" id="ciudad" aria-describedby="ciudad-description" autocomplete="off" value="{{old('ciudad')}}" maxlength="100">
                <small id="ciudad-description" class="form-text @error('ciudad')text-danger @enderror">@error('ciudad') {{$message}} @enderror</small>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="mb-4 mt-4">
                <label for="direccion" class="form-label label-description @if ($errors->has('direccion')) text-danger @else text-secondary @endif">Direccion</label>
                <textarea class="form-control @error('direccion') border-danger @enderror text" id="direccion" rows="3" name="direccion" maxlength="200" style="max-height: 150px;min-height:80px;">{{old('direccion')}}</textarea>
                <small class="form-text @error('direccion')text-danger @enderror">@error('direccion') {{$message}} @enderror</small>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group mt-4 mb-4">
                    <label for="celular"class="@if ($errors->has('celular')) text-danger @else text-secondary @endif label-description">Celular</label>
                    <input type="number" name="celular" class="form-control @if ($errors->has('celular')) border-danger @endif num" id="celular" aria-describedby="celular-description" autocomplete="off" value="{{old('celular')}}" maxlength="10">
                    <small id="celular-description" class="form-text @error('celular')text-danger @enderror">@error('celular') {{$message}} @enderror</small>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group mt-4 mb-4">
                    <label for="telefono"class="@if ($errors->has('telefono')) text-danger @else text-secondary @endif label-description">Telefono fijo</label>
                    <input type="number" name="telefono" class="form-control @if ($errors->has('telefono')) border-danger @endif num" id="telefono" aria-describedby="telefono-description" autocomplete="off" value="{{old('telefono')}}" maxlength="10">
                    <small id="telefono-description" class="form-text @error('telefono')text-danger @enderror">@error('telefono') {{$message}} @enderror</small>
                  </div>
                </div>
              </div>
              <div class="form-group mt-4 mb-4">
                <label for="red_wa"class="@if ($errors->has('red_wa')) text-danger @else text-secondary @endif label-description">Tiene Whatsapp:</label>
                <div class="d-flex justify-content-around">
                  @foreach ($opt as $op)
                    <div class="form-check form-check-inline" id="red-check">
                      <input class="form-check-input" type="radio" name="red_wa" id="redes_{{$op['_id']}}" value="{{$op['_id']}}" @if (old('red_wa') == "{$op['_id']}") checked @endif>
                      <label class="form-check-label check-default" for="redes_{{$op['_id']}}">{{$op['opt']}}</label>
                    </div>
                  @endforeach
                </div>
                <small id="red_wa-description" class="form-text @error('red_wa')text-danger @enderror">@error('red_wa') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4">
                <label for="nivel"class="@if ($errors->has('nivel')) text-danger @else text-secondary @endif label-description d-block">Ultimo nivel de educación alcanzado:</label>
                @foreach ($ne as $nivel)
                <div class="form-check form-check-inline m-2" id="nivel-check">
                  <input class="form-check-input" type="radio" name="nivel" id="n_{{$nivel->id}}" value="{{$nivel->id}}" @if (old('nivel') == "{{$nivel->id}}") checked @else checked @endif>
                  <label class="form-check-label check-default" for="n_{{$nivel->id}}">{{$nivel->nivel_edu}}</label>
                </div>
                @endforeach
                <small id="nivel-description" class="form-text @error('nivel')text-danger @enderror">@error('nivel') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4" id="nom_instituto">
                <label for="estudio"class="@if ($errors->has('estudio')) text-danger @else text-secondary @endif label-description">- Si tu respuesta es tercer nivel ¿En qué universidad estudiaste?</label>
                <input type="text" name="estudio" class="form-control @if ($errors->has('estudio')) border-danger @endif text" id="estudio" aria-describedby="estudio-description" autocomplete="off" value="{{old('estudio')}}" maxlength="100">
                <small id="estudio-description" class="form-text @error('estudio')text-danger @enderror">@error('estudio') {{$message}} @enderror</small>
              </div>
            </div>

          </div>

          <div class="card pl-2 pt-3 pb-3" role="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><span>Idea de negocio<span></div>

          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
            </div>
          </div>
          <br><hr>
            <button type="submit" class="btn btn-success  mr-3 mb-3">Crear</button>
            <a href="{{route('permissions.index')}}" class="btn btn-light mb-3">Volver</a>
          
        </form>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script src="{{asset("js/validations/enterprising/validation.enterprising.js")}}"></script>
<script src="{{asset("js/config/validations.js")}}"></script>
<script>
document.addEventListener('DOMContentLoaded',()=>{
  //js/config/validations.js
  // removeStyleErrorFormatOne('input');
  // removeStyleErrorFormatOne('textarea');
  // js/components/permiso/validation.permission.js
  // sendDataFormPermission();

  @if (session('status_success'))
  //js/config/messageAlert.js
      successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection

