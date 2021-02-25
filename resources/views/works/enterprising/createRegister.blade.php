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
        <form action="{{route('emprendedores.store')}}" method="post" id="formEmp">
          @csrf
          
          <div class="row border rounded mt-3 mb-3">
            <div class="col-sm-6">
              <div class="form-group mt-4 mb-4">
                <label for="nombres"class="@if ($errors->has('nombres')) text-danger @else text-secondary @endif label-description">Nombres *</label>
                <input type="text" name="nombres" class="form-control @if ($errors->has('nombres')) border-danger @endif text required" id="nombres" aria-describedby="nombres-description" autocomplete="off" value="{{old('nombres')}}" maxlength="50">
                <small id="nombres-description" class="form-text @error('nombres')text-danger @enderror">@error('nombres') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4">
                <label for="apellidos"class="@if ($errors->has('apellidos')) text-danger @else text-secondary @endif label-description">Apellidos *</label>
                <input type="text" name="apellidos" class="form-control @if ($errors->has('apellidos')) border-danger @endif text required" id="apellidos" aria-describedby="apellidos-description" autocomplete="off" value="{{old('apellidos')}}" maxlength="50">
                <small id="apellidos-description" class="form-text @error('apellidos')text-danger @enderror">@error('apellidos') {{$message}} @enderror</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label for="sexo"class="@if ($errors->has('sexo')) text-danger @else text-secondary @endif label-description">Sexo:</label>
                <div class="d-flex justify-content-around">
                  @foreach ($sexos as $sexo)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input ignore" type="radio" name="sexo" id="sexo_{{$sexo['_id']}}" value="{{$sexo['_id']}}" @if (old('sexo') == "{$sexo['_id']}") checked @endif>
                      <label class="form-check-label check-default" for="sexo_{{$sexo['_id']}}" role="button">{{$sexo['opt']}}</label>
                    </div>
                  @endforeach
                </div>
                <small id="sexo-description" class="form-text @error('sexo')text-danger @enderror">@error('sexo') {{$message}} @enderror</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label for="tipodoc"class="@if ($errors->has('tipodoc')) text-danger @else text-secondary @endif label-description">Tipo de documento:</label>
                <div class="d-flex justify-content-around">
                  @foreach ($t_docs->all() as $t_doc)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input ignore" type="radio" name="tipodoc" id="tipodoc_{{$t_doc->id}}" value="{{$t_doc->id}}" @if (old('tipodoc') == "{$t_doc->id}") checked @endif>
                      <label class="form-check-label check-default" for="tipodoc_{{$t_doc->id}}" role="button">{{$t_doc->opciones}}</label>
                    </div>
                  @endforeach
                </div>
                <small id="tipodoc-description" class="form-text @error('tipodoc')text-danger @enderror">@error('tipodoc') {{$message}} @enderror</small>
              </div><hr>
              <div class="row">
                <div class="form-group mt-4 mb-4 col-sm-6">
                  <label for="numero de identificacion"class="@if ($errors->has('cedula')) text-danger @else text-secondary @endif label-description">Numero de identificacion *</label>
                  <input type="number" name="cedula" class="form-control @if ($errors->has('cedula')) border-danger @endif num required" id="numero de identificacion" aria-describedby="cedula-description" autocomplete="off" value="{{old('cedula')}}" maxlength="10">
                  <small id="cedula-description" class="form-text @error('cedula')text-danger @enderror">@error('cedula') {{$message}} @enderror</small>
                </div>
                <div class="form-group mt-4 mb-4 col-sm-6">
                  <label for="nacionalidad"class="@if ($errors->has('nacionalidad')) text-danger @else text-secondary @endif label-description">Nacionalidad *</label>
                  <input type="text" name="nacionalidad" class="form-control @if ($errors->has('nacionalidad')) border-danger @endif text required" id="nacionalidad" aria-describedby="nacionalidad-description" autocomplete="off" value="{{old('nacionalidad')}}" maxlength="100">
                  <small id="nacionalidad-description" class="form-text @error('nacionalidad')text-danger @enderror">@error('nacionalidad') {{$message}} @enderror</small>
                </div>
              </div><hr>
              <div class="row">
                <div class="form-group mt-4 mb-4 col-sm-6">
                  <label for="fecha de nacimiento"class="@if ($errors->has('fec_nac')) text-danger @else text-secondary @endif label-description">Fecha de nacimiento *</label>
                  <input type="date" name="fec_nac" class="form-control @if ($errors->has('fec_nac')) border-danger @endif required" id="fecha de nacimiento" aria-describedby="fecha_n-description" autocomplete="off" value="{{old('fec_nac')}}">
                  <small id="fecha_n-description" class="form-text @error('fec_nac')text-danger @enderror">@error('fec_nac') {{$message}} @enderror</small>
                </div>
                <div class="form-group mt-4 mb-4 col-sm-6">
                  <label for="edad"class="@if ($errors->has('edad')) text-danger @else text-secondary @endif label-description">Edad *</label>
                  <input type="number" name="edad" class="form-control @if ($errors->has('edad')) border-danger @endif num required" id="edad" aria-describedby="edad-description" autocomplete="off" value="{{old('edad')}}" maxlength="2">
                  <small id="edad-description" class="form-text @error('edad')text-danger @enderror">@error('edad') {{$message}} @enderror</small>
                </div>
              </div><hr>
              <div class="row">
                <div class="form-group mt-4 mb-4 col-sm-6">
                  <label for="celular"class="@if ($errors->has('celular')) text-danger @else text-secondary @endif label-description">Celular *</label>
                  <input type="number" name="celular" class="form-control @if ($errors->has('celular'))border-danger @endif required num" id="celular" aria-describedby="celular-description" autocomplete="off" value="{{old('celular')}}" maxlength="10">
                  <small id="celular-description" class="form-text @error('celular')text-danger @enderror">@error('celular') {{$message}} @enderror</small>
                </div>
                <div class="form-group mt-4 mb-4 col-sm-6">
                  <label for="telefono"class="@if ($errors->has('telefono')) text-danger @else text-secondary @endif label-description">Telefono fijo</label>
                  <input type="number" name="telefono" class="form-control @if ($errors->has('telefono')) border-danger @endif num" id="telefono" aria-describedby="telefono-description" autocomplete="off" value="{{old('telefono')}}" maxlength="10">
                  <small id="telefono-description" class="form-text @error('telefono')text-danger @enderror">@error('telefono') {{$message}} @enderror</small>
                </div>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label for="red_wa"class="@if ($errors->has('red_wa')) text-danger @else text-secondary @endif label-description">Tiene Whatsapp:</label>
                <div class="d-flex justify-content-around">
                  @foreach ($opts as $op)
                    <div class="form-check form-check-inline" id="red-check">
                      <input class="form-check-input ignore" type="radio" name="red_wa" id="redes_{{$op['_id']}}" value="{{$op['_id']}}" @if (old('red_wa') == "{$op['_id']}") checked @endif>
                      <label class="form-check-label check-default" for="redes_{{$op['_id']}}" role="button">{{$op['opt']}}</label>
                    </div>
                  @endforeach
                </div>
                <small id="red_wa-description" class="form-text @error('red_wa')text-danger @enderror">@error('red_wa') {{$message}} @enderror</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label for="correo electronico"class="@if ($errors->has('email')) text-danger @else text-secondary @endif label-description">Correo electronico *</label>
                <input type="email" name="email" class="form-control @if ($errors->has('email')) border-danger @endif required" id="correo electronico" aria-describedby="email-description" autocomplete="off" value="{{old('email')}}" maxlength="100" placeholder="ejemplo@mail.com">
                <small id="email-description" class="form-text @error('email')text-danger @enderror">@error('email') {{$message}} @enderror</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label class="text-secondary label-description d-block">Nivel de formación educativa:</label>
                <div class="mt-1 mb-1">
                  <label class="text-secondary label-description d-block">1. Basica</label>
                  @foreach ($states->all() as $state)
                  <div class="form-check form-check-inline m-2">
                    <input class="form-check-input ignore" type="radio" name="nivel1" id="{{$state->id}}. Basica" value="{{$state->id}}" @if (old('nivel1') == "{$state->id}") checked @endif>
                    <label class="form-check-label check-default" for="{{$state->id}}. Basica" role="button">{{$state->opciones}}</label>
                  </div>
                  @endforeach
                </div>
                <div class="mt-1 mb-1">
                  <label class="text-secondary label-description d-block">2. Bachillerato</label>
                  @foreach ($states->all() as $state)
                  <div class="form-check form-check-inline m-2">
                    <input class="form-check-input ignore" type="radio" name="nivel2" id="{{$state->id}}. Bachillerato" value="{{$state->id}}" @if (old('nivel2') == "{$state->id}") checked @endif>
                    <label class="form-check-label check-default" for="{{$state->id}}. Bachillerato" role="button">{{$state->opciones}}</label>
                  </div>
                  @endforeach
                </div>
                <div class="mt-1 mb-1">
                  <label class="text-secondary label-description d-block">3. Tercer Nivel</label>
                  @foreach ($states->all() as $state)
                  <div class="form-check form-check-inline m-2">
                    <input class="form-check-input ignore" type="radio" name="nivel3" id="{{$state->id}}. Tercer Nivel" value="{{$state->id}}" @if (old('nivel3') == "{$state->id}") checked @endif>
                    <label class="form-check-label check-default" for="{{$state->id}}. Tercer Nivel" role="button">{{$state->opciones}}</label>
                  </div>
                  @endforeach
                </div>
                <div class="mt-1 mb-1">
                  <label class="text-secondary label-description d-block">4. Cuarto Nivel</label>
                  @foreach ($states->all() as $state)
                  <div class="form-check form-check-inline m-2">
                    <input class="form-check-input ignore" type="radio" name="nivel4" id="{{$state->id}}. Cuarto Nivel" value="{{$state->id}}" @if (old('nivel4') == "{$state->id}") checked @endif>
                    <label class="form-check-label check-default" for="{{$state->id}}. Cuarto Nivel" role="button">{{$state->opciones}}</label>
                  </div>
                  @endforeach
                </div>
              </div><hr>
            </div>

            <div class="col-sm-6">
              <div class="form-group mt-4 mb-4">
                <label for="fecha de graduacion"class="@if ($errors->has('fec_titulacion')) text-danger @else text-secondary @endif label-description">Si posee titulo universitario, ¿Cual es?:</label>
                <input type="date" name="fec_titulacion" class="form-control @if ($errors->has('fec_titulacion')) border-danger @endif required" id="fecha de graduacion" aria-describedby="fecha_n-description" autocomplete="off" value="{{old('fec_titulacion')}}">
                <small id="fecha_n-description" class="form-text @error('fec_titulacion')text-danger @enderror">@error('fec_titulacion') {{$message}} @enderror</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label for="trabajoActual"class="@if ($errors->has('trabajoActual')) text-danger @else text-secondary @endif label-description">¿Trabajas actualmente?</label>
                <div class="d-flex justify-content-around">
                  @foreach ($opts as $op)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input ignore" type="radio" name="trabajoActual" id="tb_{{$op['_id']}}" value="{{$op['_id']}}" @if (old('trabajoActual') == "{$op['_id']}") checked @endif>
                      <label class="form-check-label check-default" for="tb_{{$op['_id']}}" role="button">{{$op['opt']}}</label>
                    </div>
                  @endforeach
                </div>
                <small id="trabajoActual-description" class="form-text @error('trabajoActual')text-danger @enderror">@error('trabajoActual') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4">
                <label for="tipotrabajo"class="@if ($errors->has('tipotrabajo')) text-danger @else text-secondary @endif label-description">Si respondiste “si” ¿Qué tipo de trabajo tiene?</label>
                <div>
                  @foreach ($t_tbs->all() as $t_tb)
                    <div class="form-check form-check-inline mt-1 mb-1">
                      <input class="form-check-input ignore" type="radio" name="tipotrabajo" id="tipotrabajo_{{$t_tb->id}}" value="{{$t_tb->id}}" @if (old('tipotrabajo') == "{$t_tb->id}") checked @endif>
                      <label class="form-check-label check-default input-check-disabled" for="tipotrabajo_{{$t_tb->id}}" role="button">{{$t_tb->opciones}}</label>
                    </div>
                  @endforeach
                </div>
                <small id="tipotrabajo-description" class="form-text @error('tipotrabajo')text-danger @enderror">@error('tipotrabajo') {{$message}} @enderror</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label class="@if ($errors->has('ingreso_e') || $errors->has('ingreso_p')) text-danger @else text-secondary @endif label-description">En caso de que tengas un emprendimiento:</label>
                <label for="ingreso_p"class="@if ($errors->has('ingreso_p')) text-danger @else text-secondary @endif label-description mt-1">1. ¿El emprendimiento es el ingreso principal de tu familia?</label>
                <div class="d-flex justify-content-around">
                  @foreach ($opts as $op)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input ignore" type="radio" name="ingreso_p" id="in1_{{$op['_id']}}" value="{{$op['_id']}}" @if (old('ingreso_p') == "{$op['_id']}") checked @endif>
                      <label class="form-check-label check-default" for="in1_{{$op['_id']}}" role="button">{{$op['opt']}}</label>
                    </div>
                  @endforeach
                </div>
                <label for="ingreso_e"class="@if ($errors->has('ingreso_e')) text-danger @else text-secondary @endif label-description mt-1">2. ¿Podrás vivir unicamente de ingreso de tu emprendimiento?</label>
                <div class="d-flex justify-content-around">
                  @foreach ($opts as $op)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input ignore" type="radio" name="ingreso_e" id="in2_{{$op['_id']}}" value="{{$op['_id']}}" @if (old('ingreso_e') == "{$op['_id']}") checked @endif>
                      <label class="form-check-label check-default" for="in2_{{$op['_id']}}" role="button">{{$op['opt']}}</label>
                    </div>
                  @endforeach
                </div>
                <small id="trabajoActual-description" class="form-text @if ($errors->has('ingreso_e') || $errors->has('ingreso_p'))text-danger @endif">@if ($errors->has('ingreso_e') || $errors->has('ingreso_p')) {{$message}} @endif</small>
              </div><hr>
              <div class="form-group mt-4 mb-4">
                <label class="@if ($errors->has('sector_tb')) text-danger @else text-secondary @endif label-description d-block">En caso de que trabajas en relacion de dependencia ¿ En que sector trabajas?</label>
                @foreach ($sect_tbs->all() as $sect_tb)
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input ignore" type="radio" name="sector_tb" id="sector_tb{{$sect_tb->id}}" value="{{$sect_tb->id}}" @if (old('sector_tb') == "{$sect_tb->id}") checked @endif>
                  <label class="form-check-label check-default" for="sector_tb{{$sect_tb->id}}" role="button">{{$sect_tb->opciones}}</label>
                </div>
                @endforeach
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input ignore" type="radio" name="sector_tb" id="sector_tb" value="0" @if (old('sector_tb') == "0") checked @endif>
                  <label class="form-check-label check-default" for="sector_tb" role="button">Otro</label>
                </div>
                <div class="form-group">
                  <input type="text" name="name_sector" class="form-control @if ($errors->has('name_sector')) border-danger @endif text" id="otro" aria-describedby="name_sector-description" autocomplete="off" value="{{old('name_sector')}}" maxlength="50">
                </div>
              </div><hr>
            </div>
          </div>

          <h5 class="mt-4 mb-4 text-center" style="text-decoration: underline;">DATOS GENERALES DEL EMPRENDIMIENTO</h5>
          <div class="card pl-2 pt-3 pb-3 text-light bg-dark" role="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><p style="font-size:15px;">Toca para visualizar el formulario (<span class="text-info">Complete los datos...</span>)</p></div>

          <div class="collapse" id="collapseExample">
            <div class="row">
              <div class="form-group mt-4 mb-4 col-sm-6">
                <label for="nombre_emp"class="@if ($errors->has('nombre_emp')) text-danger @else text-secondary @endif label-description">1. NOMBRE DEL EMPRENDIMIENTO *</label>
                <input type="text" name="nombre_emp" class="form-control @if ($errors->has('nombre_emp')) border-danger @endif text required" id="nombre_emp" aria-describedby="nombre_emp-description" autocomplete="off" value="{{old('nombre_emp')}}" maxlength="150" data-name="¿pregunta 1?">
              </div>
              <div class="form-group mt-4 mb-4 col-sm-6">
                <label class="@if ($errors->has('opc_dir')) text-danger @else text-secondary @endif label-description">2. ¿LA DIRECCIÓN DE TU CASA ES LA MISMA QUE DE TU EMPRENDIMIENTO? *</label>
                <div class="d-flex justify-content-around">
                  @foreach ($opts as $op)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input ignore" type="radio" name="opc_dir" id="opc_dir_{{$op['_id']}}" data-name="¿pregunta 2?" value="{{$op['_id']}}" @if (old('opc_dir') == "{$op['_id']}") checked @endif>
                      <label class="form-check-label check-default" for="opc_dir_{{$op['_id']}}" role="button">{{$op['opt']}}</label>
                    </div>
                  @endforeach
                </div>
              </div>
            </div><hr>
            <div class="row">
              <div class="form-group mt-4 mb-4 col-sm-6">
                <label for="dir_emp"class="@if ($errors->has('dir_emp')) text-danger @else text-secondary @endif label-description">3. DIRECCION DEL EMPRENDIMIENTO *</label>
                <textarea class="form-control @error('dir_emp') border-danger @enderror text" id="dir_emp" rows="3" name="dir_emp" maxlength="200" style="max-height: 150px;min-height:80px;" data-name="¿pregunta 3?">{{old('dir_emp')}}</textarea>
              </div>  
              <div class="form-group mt-4 mb-4 col-sm-6">
                <label for="desc_emp"class="@if ($errors->has('desc_emp')) text-danger @else text-secondary @endif label-description">4. BREVE DESCRIPCION DEL EMPRENDIMIENTO: ¿QUÉ PRODUCTOS Y SERVICIOS OFRECES? ¿A QUIÉNES? *</label>
                <textarea class="form-control @error('desc_emp') border-danger @enderror text" id="desc_emp" rows="3" name="desc_emp" maxlength="255" style="max-height: 150px;min-height:80px;" data-name="¿pregunta 4?">{{old('desc_emp')}}</textarea>
              </div>
            </div><hr>
            <div class="row">
              <div class="form-group mt-4 mb-4 col-sm-6">
                <label class="@if ($errors->has('tiempoemprendimento')) text-danger @else text-secondary @endif label-description d-block">5. ¿HACE CUÁNTO TIEMPO TIENES TU EMPRENDIMIENTO?</label>
                @foreach ($time_emps->all() as $time_emp)
                  <div class="form-check form-check-inline mt-1 mb-1">
                    <input class="form-check-input ignore" type="radio" name="tiempoemprendimento" id="tiempoemprendimento_{{$time_emp->id}}" value="{{$time_emp->id}}" data-name="¿pregunta 5?" @if (old('tiempoemprendimento') == "{$time_emp->id}") checked @endif>
                    <label class="form-check-label check-default" for="tiempoemprendimento_{{$time_emp->id}}" role="button">{{$time_emp->opciones}}</label>
                  </div>
                @endforeach
              </div>
              <div class="form-group mt-4 mb-4 col-sm-6">
                <label class="@if ($errors->has('razonemprender')) text-danger @else text-secondary @endif label-description d-block">6.	¿CUÁL ES LA RAZÓN POR LA QUE COMENZASTE A EMPRENDER?</label>
                @foreach ($razon_emps->all() as $razon_emp)
                  <div class="form-check form-check-inline mt-1 mb-1">
                    <input class="form-check-input ignore" type="radio" name="razonemprender" id="razonemprender_{{$razon_emp->id}}" value="{{$razon_emp->id}}" data-name="¿pregunta 6?" @if (old('razonemprender') == "{$razon_emp->id}") checked @endif>
                    <label class="form-check-label check-default" for="razonemprender_{{$razon_emp->id}}" role="button">{{$razon_emp->opciones}}</label>
                  </div>
                @endforeach
              </div>
            </div><hr>
            <div class="row">
              <div class="form-group mt-4 mb-4 col-sm-6">
                <label class="@if ($errors->has('tipoemprendimiento')) text-danger @else text-secondary @endif label-description d-block">7. ¿CUAL DE ESTOS TIPOS DE EMPRENDIMIENTO REALIZA USTED?</label>
                @foreach ($type_emps->all() as $type_emp)
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input ignore" type="radio" name="tipoemprendimiento" id="tipoemprendimiento{{$type_emp->id}}" value="{{$type_emp->id}}" data-name="¿pregunta 7?" @if (old('tipoemprendimiento') == "{$type_emp->id}") checked @endif>
                  <label class="form-check-label check-default" for="tipoemprendimiento{{$type_emp->id}}" role="button">{{$type_emp->opciones}}</label>
                </div>
                @endforeach
                <div class="form-check form-check-inline m-2">
                  <input class="form-check-input ignore" type="radio" name="tipoemprendimiento" id="tipoemprendimiento" value="0" @if (old('tipoemprendimiento') == "0") checked @endif>
                  <label class="form-check-label check-default" for="tipoemprendimiento" role="button">Otro</label>
                </div>
                <div class="form-group mt-3">
                  <input type="text" name="tipo_emp" class="form-control @if ($errors->has('tipo_emp')) border-danger @endif text" id="otro_tipo" aria-describedby="tipo_emp-description" autocomplete="off" value="{{old('tipo_emp')}}" maxlength="50" data-name="¿pregunta 7?">
                </div>
              </div>
              <div class="form-group mt-4 mb-4 col-sm-6">
                <label for="producto"class="@if ($errors->has('producto')) text-danger @else text-secondary @endif label-description">8.	¿TIENES UN PRODUCTO QUE VENDES MÁS? *</label>
                <textarea class="form-control @error('producto') border-danger @enderror text" id="producto" rows="3" name="producto" maxlength="255" style="max-height: 150px;min-height:80px;" data-name="¿pregunta 8?" placeholder="¿Cuál?">{{old('producto')}}</textarea>
              </div>
            </div><hr>
            <div class="row">
              <div class="form-group mt-4 mb-4 col-sm-6">
                <label for="materia_prima"class="@if ($errors->has('materia_prima')) text-danger @else text-secondary @endif label-description">9.	¿LE ESTAS DANDO VALOR AGREGADO A LA MATERIA PRIMA?</label>
                <div class="d-flex justify-content-around">
                  @foreach ($opts as $op)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input ignore" type="radio" name="materia_prima" id="mp_{{$op['_id']}}" value="{{$op['_id']}}" data-name="¿pregunta 9?" @if (old('materia_prima') == "{$op['_id']}") checked @endif>
                      <label class="form-check-label check-default" for="mp_{{$op['_id']}}" role="button">{{$op['opt']}}</label>
                    </div>
                  @endforeach
                </div>
                <small id="materia_prima-description" class="form-text @error('materia_prima')text-danger @enderror">@error('materia_prima') {{$message}} @enderror</small>
              </div>
              <div class="form-group mt-4 mb-4 col-sm-6">
                <label for="materiales"class="@if ($errors->has('materiales')) text-danger @else text-secondary @endif label-description">10.	EN CASO DE QUE REALICE SUS PROPIOS PRODUCTOS, ¿CUÁLES SON LOS MATERIALES UTILIZAS?</label>
                <textarea class="form-control @error('materiales') border-danger @enderror text" id="materiales" rows="3" name="materiales" maxlength="255" style="max-height: 150px;min-height:80px;" data-name="¿pregunta 10?">{{old('materiales')}}</textarea>
              </div>
            </div><hr>
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
  @if (session('status_success'))
  //js/config/messageAlert.js
    successAlert('Exitoso','{{session("status_success")}}');
  @endif
});
</script>
@endsection