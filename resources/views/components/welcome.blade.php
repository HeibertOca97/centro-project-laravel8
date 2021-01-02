<link rel="stylesheet" href="{{asset('css/modules/components/cards-status.css')}}">

<div id="box-main-content">
  @if (!Auth::user()->nombres || !Auth::user()->apellidos || !Auth::user()->cedula || !Auth::user()->cargo)
    <div class="container bg-light mt-3">
      <div class="alert alert-warning" role="alert">
        Complete la informacion faltante de su perfil! (cedula, nombres, apellidos, cargo)<a href="{{route('user.profiles.index')}}"> ir a completar</a>
      </div>
    </div>
  @endif
  
  <h1 class="titulo-interface"><i class="fas fa-tachometer-alt"></i> Tablero</h1>
 <div class="box-cards-data">
   <article class="bg-back-card">
     <div class="box-icon-info  bg-card-info-users">
       <i class="fas fa-user"></i>
     </div>
     <h3>Nombre de usuario</h3>  
     <small>{{Auth::user()->username}}</small>
   </article>
   <article class="bg-back-card">
    <div class="box-icon-info  bg-card-info-entrepreneur">
      <i class="fas fa-user-tag"></i>
    </div>
    <h3>Rol</h3>  
    <small>{{Auth::user()->getRoleNames()[0]}}</small>
  </article>
  <article class="bg-back-card">
    <div class="box-icon-info  bg-card-info-projects">
      <i class="fas fa-user-shield"></i>
    </div>
    <h3>Permisos</h3>  
    <p>{{$numPermission}}</p>
  </article>
 </div>

 <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="card-title">Bienvenido <small class="text-primary">{{Auth::user()->nombres}} {{Auth::user()->apellidos}}</small></div>
        <img src="{{asset('image/imageFondos/undraw/add_teamwork.svg')}}" class="img-fluid" alt="add teamwork">  
        <div class="card-footer text-primary">Sistema de Gestion</div>
      </div>
    </div>
  </div>


</div>