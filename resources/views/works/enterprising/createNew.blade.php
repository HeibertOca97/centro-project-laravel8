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
    <h1 class="title-module"><i class="fab fa-black-tie"></i> Gestion de emprendedores</h1>
  </div>
  
  <div class="container-xl">
    <nav aria-label="breadcrumb" id="box-route">
      <ol class="breadcrumb bg-white container-xl">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
      @can('emprendedor.index')
      <li class="breadcrumb-item"><a href="{{route('emprendedores.index')}}">Emprendedores</a></li>
      @endcan
        <li class="breadcrumb-item active" aria-current="page">Crear</li>
      </ol>
    </nav>
  </div>
  
  <div class="container-xl">
    <div class="card">
      <div class="card-header">Formulario de inscripción: Incubadora de negocio</div>
      <div class="card-body">
        <h5 class="mt-4 mb-4 text-center" style="text-decoration: underline;">DATOS DEL EMPRENDEDOR</h5>
        <form action="{{route('emprendedores.storeNew')}}" method="post" id="formEmp">
          @csrf
          
          <div class="row border rounded mt-3 mb-3">
            <div class="col-sm-6">
              <div class="form-group mt-4 mb-4">
                <label for="fec_nac"class="@if ($errors->has('fec_nac')) text-danger @else text-secondary @endif label-description">Fecha de nacimiento *</label>
                <input type="date" name="fec_nac" class="form-control @if ($errors->has('fec_nac')) border-danger @endif required" id="fec_nac" aria-describedby="fecha_n-description" autocomplete="off" value="{{old('fec_nac')}}" data-name="fecha de nacimiento">
                <small id="fecha_n-description" class="form-text @error('fec_nac')text-danger @enderror">@error('fec_nac') {{$message}} @enderror</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label for="cedula"class="@if ($errors->has('cedula')) text-danger @else text-secondary @endif label-description">Cedula de identidad *</label>
                <input type="number" name="cedula" class="form-control @if ($errors->has('cedula')) border-danger @endif num required" id="cedula" aria-describedby="cedula-description" autocomplete="off" value="{{old('cedula')}}" maxlength="10" data-name="cedula de identidad">
                <small id="cedula-description" class="form-text @error('cedula')text-danger @enderror">@error('cedula') {{$message}} @enderror</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label for="nombres"class="@if ($errors->has('nombres')) text-danger @else text-secondary @endif label-description">Nombres *</label>
                <input type="text" name="nombres" class="form-control @if ($errors->has('nombres')) border-danger @endif text required" id="nombres" aria-describedby="nombres-description" autocomplete="off" value="{{old('nombres')}}" maxlength="50" data-name="nombres">
                <small id="nombres-description" class="form-text @error('nombres')text-danger @enderror">@error('nombres') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4">
                <label for="apellidos"class="@if ($errors->has('apellidos')) text-danger @else text-secondary @endif label-description">Apellidos *</label>
                <input type="text" name="apellidos" class="form-control @if ($errors->has('apellidos')) border-danger @endif text required" id="apellidos" aria-describedby="apellidos-description" autocomplete="off" value="{{old('apellidos')}}" maxlength="50" data-name="apellidos">
                <small id="apellidos-description" class="form-text @error('apellidos')text-danger @enderror">@error('apellidos') {{$message}} @enderror</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label for="email"class="@if ($errors->has('email')) text-danger @else text-secondary @endif label-description">Email *</label>
                <input type="email" name="email" class="form-control @if ($errors->has('email')) border-danger @endif required" id="email" aria-describedby="email-description" autocomplete="off" value="{{old('email')}}" maxlength="100" placeholder="usuario@servidor.dominio" data-name="email">
                <small id="email-description" class="form-text @error('email')text-danger @enderror">@error('email') {{$message}} @enderror</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label for="ciudad"class="@if ($errors->has('ciudad')) text-danger @else text-secondary @endif label-description">Ciudad *</label>
                <input type="text" name="ciudad" class="form-control @if ($errors->has('ciudad')) border-danger @endif text required" id="ciudad" aria-describedby="ciudad-description" autocomplete="off" value="{{old('ciudad')}}" maxlength="100" data-name="ciudad">
                <small id="ciudad-description" class="form-text @error('ciudad')text-danger @enderror">@error('ciudad') {{$message}} @enderror</small>
              </div><hr>
            </div>

            <div class="col-sm-6">
              <div class="form-group mb-4 mt-4">
                <label for="direccion" class="form-label label-description @if ($errors->has('direccion')) text-danger @else text-secondary @endif">Direccion *</label>
                <textarea class="form-control @error('direccion') border-danger @enderror required text" id="direccion" rows="3" name="direccion" maxlength="200" style="max-height: 150px;min-height:80px;" data-name="direccion">{{old('direccion')}}</textarea>
                <small class="form-text @error('direccion')text-danger @enderror">@error('direccion') {{$message}} @enderror</small>
              </div><hr>
              <div class="row">
                <div class="form-group mt-4 mb-4 col-sm-6">
                  <label for="celular"class="@if ($errors->has('celular')) text-danger @else text-secondary @endif label-description">Celular *</label>
                  <input type="number" name="celular" class="form-control @if ($errors->has('celular'))border-danger @endif required num" id="celular" aria-describedby="celular-description" autocomplete="off" value="{{old('celular')}}" maxlength="10" data-name="celular">
                  <small id="celular-description" class="form-text @error('celular')text-danger @enderror">@error('celular') {{$message}} @enderror</small>
                </div>
                <div class="form-group mt-4 mb-4 col-sm-6">
                  <label for="telefono"class="@if ($errors->has('telefono')) text-danger @else text-secondary @endif label-description">Telefono fijo</label>
                  <input type="number" name="telefono" class="form-control @if ($errors->has('telefono')) border-danger @endif num" id="telefono" aria-describedby="telefono-description" autocomplete="off" value="{{old('telefono')}}" maxlength="10" data-name="telefono">
                  <small id="telefono-description" class="form-text @error('telefono')text-danger @enderror">@error('telefono') {{$message}} @enderror</small>
                </div>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label class="@if ($errors->has('red_wa')) text-danger @else text-secondary @endif label-description">Tiene Whatsapp:</label>
                <div class="d-flex justify-content-around">
                  @foreach ($opt1 as $op)
                    <div class="form-check form-check-inline" id="red-check">
                      <input class="form-check-input ignore" type="radio" name="red_wa" id="redes_{{$op['_id']}}" value="{{$op['_id']}}" @if (old('red_wa') == "{$op['_id']}") checked @endif>
                      <label class="form-check-label check-default" for="redes_{{$op['_id']}}" role="button">{{$op['opt']}}</label>
                    </div>
                  @endforeach
                </div>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label class="@if ($errors->has('nivel')) text-danger @else text-secondary @endif label-description d-block">Ultimo nivel de educación alcanzado:</label>
                @foreach ($ne->all() as $nivel)
                <div class="form-check form-check-inline m-2" id="nivel-check">
                  <input class="form-check-input ignore" type="radio" name="nivel" id="n_{{$nivel->id}}" value="{{$nivel->id}}" @if (old('nivel') == "{$nivel->id}") checked @endif>
                  <label class="form-check-label check-default" for="n_{{$nivel->id}}" role="button">{{$nivel->opciones}}</label>
                </div>
                @endforeach
                <small id="nivel-description" class="form-text @error('nivel')text-danger @enderror">@error('nivel') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4" id="nom_instituto">
                <label for="estudio"class="@if ($errors->has('estudio')) text-danger @else text-secondary @endif label-description">- Si tu respuesta es tercer nivel ¿En qué universidad estudiaste?</label>
                <textarea class="form-control @error('estudio') border-danger @enderror text" id="estudio" rows="3" name="estudio" maxlength="255" style="max-height: 150px;min-height:70px;" data-name="¿En que universidad estudiaste?">{{old('estudio')}}</textarea>
              </div><hr>
            </div>
          </div>

          <h5 class="mt-4 mb-4 text-center" style="text-decoration: underline;">DATOS SOBRE SU IDEA DE NEGOCIO</h5>
          <div class="card pl-2 pt-3 pb-3 text-light bg-dark" role="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><p style="font-size:15px;">Toca para visualizar el formulario (<span class="text-info">Complete los datos...</span>)</p></div>

          <div class="collapse" id="collapseExample">            
            <div class="row border rounded mt-3 mb-3">
              <div class="col-sm-6">
                <div class="form-group mt-4 mb-4">
                  <label for="nom_idea"class="@if ($errors->has('nom_idea')) text-danger @else text-secondary @endif label-description">1. Idea de negocio *</label>
                  <input type="text" name="nom_idea" class="form-control @if ($errors->has('nom_idea')) border-danger @endif required" id="nom_idea" maxlength="255" aria-describedby="nom_idea-description" autocomplete="off" value="{{old('nom_idea')}}" data-name="idea de negocio">
                  <small id="nom_idea-description" class="form-text @error('nom_idea')text-danger @enderror">@error('nom_idea') {{$message}} @enderror</small>
                </div><hr>
                <div class="form-group mt-4 mb-4">
                  <label class="@if ($errors->has('t_plan')) text-danger @else text-secondary @endif label-description d-block">2. ¿Tiene redactado un plan de negocio?</label>
                  @foreach ($opt2 as $op)
                  <div class="form-check form-check-inline m-2" id="t_plan-check">
                    <input class="form-check-input ignore" type="radio" name="t_plan" id="pn_{{$op['_id']}}" value="{{$op['_id']}}" data-name="¿pregunta 2?" @if (old('t_plan') == "{$op['_id']}") checked @endif>
                    <label class="form-check-label check-default" for="pn_{{$op['_id']}}" role="button">{{$op['opt']}}</label>
                  </div>
                  @endforeach
                </div><hr>
                <div class="form-group mt-4 mb-4">
                  <label for="sector_act"class="@if ($errors->has('sector_act')) text-danger @else text-secondary @endif label-description">3. Sector de actividad de su idea de negocio</label>
                  <input type="text" name="sector_act" class="form-control @if ($errors->has('sector_act')) border-danger @endif text" id="sector_act" aria-describedby="sector_act-description" autocomplete="off" value="{{old('sector_act')}}" maxlength="255" data-name="¿pregunta 3?">
                  <small id="sector_act-description" class="form-text @error('sector_act')text-danger @enderror">@error('sector_act') {{$message}} @enderror</small>
                </div><hr>
                <div class="form-group mb-4 mt-4">
                  <label for="consumidor" class="form-label label-description @if ($errors->has('consumidor')) text-danger @else text-secondary @endif">4. ¿Cuáles son sus principales consumidores?</label>
                  <textarea class="form-control @error('consumidor') border-danger @enderror text" id="consumidor" rows="3" name="consumidor" maxlength="255" style="max-height: 150px;min-height:80px;" data-name="¿pregunta 4?">{{old('consumidor')}}</textarea>
                  <small class="form-text @error('consumidor')text-danger @enderror">@error('consumidor') {{$message}} @enderror</small>
                </div><hr>
                <div class="form-group mb-4 mt-4">
                  <label for="competidor" class="form-label label-description @if ($errors->has('competidor')) text-danger @else text-secondary @endif">5. ¿Cuáles son sus principales competidores?</label>
                  <textarea class="form-control @error('competidor') border-danger @enderror text" id="competidor" rows="3" name="competidor" maxlength="255" style="max-height: 150px;min-height:80px;" data-name="¿pregunta 5?">{{old('competidor')}}</textarea>
                  <small class="form-text @error('competidor')text-danger @enderror">@error('competidor') {{$message}} @enderror</small>
                </div><hr>
              </div>

              <div class="col-sm-6">
                <div class="form-group mb-4 mt-4">
                  <label for="habilidades" class="form-label label-description @if ($errors->has('habilidades')) text-danger @else text-secondary @endif">6. ¿Qué habilidades personales y/o profesionales tiene para implementar su idea de negocio?</label>
                  <textarea class="form-control @error('habilidades') border-danger @enderror text" id="habilidades" rows="3" name="habilidades" maxlength="255" style="max-height: 150px;min-height:80px;" data-name="¿pregunta 6?">{{old('habilidades')}}</textarea>
                  <small class="form-text @error('habilidades')text-danger @enderror">@error('habilidades') {{$message}} @enderror</small>
                </div><hr>
                <div class="form-group mb-4 mt-4">
                  <label for="debilidades" class="form-label label-description @if ($errors->has('debilidades')) text-danger @else text-secondary @endif">7. ¿Cuáles son las debilidades más importantes para llevar a cabo su idea emprendedora?</label>
                  <textarea class="form-control @error('debilidades') border-danger @enderror text" id="debilidades" rows="3" name="debilidades" maxlength="255" style="max-height: 150px;min-height:80px;" data-name="¿pregunta 7?">{{old('debilidades')}}</textarea>
                  <small class="form-text @error('debilidades')text-danger @enderror">@error('debilidades') {{$message}} @enderror</small>
                </div><hr>
                <div class="form-group mb-4 mt-4">
                  <label for="t_apoyo" class="form-label label-description @if ($errors->has('t_apoyo')) text-danger @else text-secondary @endif">8. ¿Qué tipo de apoyo necesita o espera obtener?</label>
                  <textarea class="form-control @error('t_apoyo') border-danger @enderror text" id="t_apoyo" rows="3" name="t_apoyo" maxlength="255" style="max-height: 150px;min-height:80px;" data-name="¿pregunta 8?">{{old('t_apoyo')}}</textarea>
                  <small class="form-text @error('t_apoyo')text-danger @enderror">@error('t_apoyo') {{$message}} @enderror</small>
                </div><hr>
              </div>

            </div>  
          </div>

          <br><hr>
            <button type="submit" class="btn btn-success  mr-3 mb-3">Guardar</button>
            <a href="{{route('emprendedores.index')}}" class="btn btn-light mb-3">Volver</a>
          
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
  removeStyleErrorFormatOne('input');
  removeStyleErrorFormatOne('textarea');
  // js/validations/enterprising/validation.enterprising.js
  sendDataFormEnterprising();
  @if ($errors->all())
    toggleElementAnswerEnterprisingError();
  @endif

  @if (session('status_success'))
  //js/config/messageAlert.js
    successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection

