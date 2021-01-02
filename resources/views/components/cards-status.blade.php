<link rel="stylesheet" href="{{asset('css/modules/components/cards-status.css')}}">


  @if (!Auth::user()->nombres || !Auth::user()->apellidos || !Auth::user()->cedula || !Auth::user()->cargo)
    <div class="container bg-light mt-3">
      <div class="alert alert-warning" role="alert">
        <small>Complete la informacion faltante de su perfil! (cedula, nombres, apellidos, cargo)<a href="{{route('user.profiles.index')}}"> ir a completar</a></small>
      </div>
    </div>
  @endif

<!--Contenedor de la bienvenida-->
  <div class="container mb-3 mt-4">
  <div class="card">
    
    <div class="card-body box-welcome">
      <div class="card-title text-primary">Sistema de Gestion</div>
      <img src="{{asset('image/imageFondos/undraw/add_teamwork.svg')}}" class="img-fluid" alt="CELID - add teamwork">  
      @if (Auth::user()->nombres && Auth::user()->apellidos)
        <div class="card-title">Bienvenido <span class="text-secondary">{{explode(' ',Auth::user()->nombres)[0]}} {{explode(' ',Auth::user()->apellidos)[0]}}</span></div>
      @endif
      <div class="card-title text-primary">Equipo CELID</div>
    </div>
    
  </div>
 </div>

<!--Contenedor del tablero-->
  <div class="container-xl">
    <h1 class="title-module"><i class="fas fa-tachometer-alt"></i> Tablero</h1>
  </div>
 
  <div class="box-cards-data container bg-light mb-3">
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
    <small>{{Auth::user()->getRoleNames()->isEmpty() ? 'ninguno' : Auth::user()->getRoleNames()[0]}}</small>
  </article>
  <article class="bg-back-card">
    <div class="box-icon-info  bg-card-info-projects">
      <i class="fas fa-user-shield"></i>
    </div>
    <h3>Permisos</h3>  
    <p>{{$numPermission}}</p>
  </article>
   @can('user.index')
   <article class="bg-back-card">
     <div class="box-icon-info  bg-card-info-users">
       <i class="fas fa-users"></i>
     </div>
     <h3>Usuarios</h3>  
     <p>{{$num_users}}</p>
   </article>
   @endcan
  <article class="bg-back-card">
    <div class="box-icon-info  bg-card-info-entrepreneur">
      <i class="fab fa-black-tie"></i>
    </div>
    <h3>Emprendedores</h3>  
    <p>0</p>
  </article>
  <article class="bg-back-card">
    <div class="box-icon-info  bg-card-info-projects">
      <i class="fas fa-project-diagram"></i>
    </div>
    <h3>Proyectos de emprendimiento</h3>  
    <p>0</p>
  </article>
  <article class="bg-back-card">
    <div class="box-icon-info  bg-card-info-business">
      <i class="fas fa-briefcase"></i>
    </div>
    <h3>Ideas de negocio</h3>  
    <p>0</p>
  </article>
 </div>

<!--Contenedor para creadores-->
 <div class="container mb-3">
  <div class="card">
    <div class="card-body">
      <div class="card-title"><i class="fas fa-plus"></i> Crear nuevo</div><hr>
      <div class="d-flex align-content-center flex-wrap">
        @if (Auth::user()->getRoleNames()->isEmpty())
            <small class="text-secondary">Por el momento no cuenta con ningun permiso, que le permita realizar alguna accion.</small>
        @else
            
          @can('user.create')
          <a href="{{route('users.create')}}" class="card d-block text-center mr-2 mb-2" role="button" style="text-decoration: none;">
            <div class="card-body">
              <div class="card-title"><i  style="font-size:30px;" class="fas fa-plus-circle"></i></div>
              <p class="card-text text-secondary ">Usuarios</p>
            </div>
          </a>
          @endcan
          @can('role.create')
          <a href="{{route('roles.create')}}" class="card d-block text-center mr-2 mb-2" role="button" style="text-decoration: none;">
            <div class="card-body">
              <div class="card-title"><i  style="font-size:30px;" class="fas fa-plus-circle"></i></div>
              <p class="card-text text-secondary ">Roles</p>
            </div>
          </a>
          @endcan
          @can('permission.create')
          <a href="{{route('permissions.create')}}" class="card d-block text-center mr-2 mb-2" role="button" style="text-decoration: none;">
            <div class="card-body">
              <div class="card-title"><i  style="font-size:30px;" class="fas fa-plus-circle"></i></div>
              <p class="card-text text-secondary ">Permisos</p>
            </div>
          </a>
          @endcan
        @endif

      </div>
    </div>
  </div>
 </div>

{{-- <i class="fas fa-cloud-download-alt"></i>
<i class="fas fa-cloud-upload-alt"></i>

<i class="fas fa-plus-circle"></i>
<i class="fas fa-coffee"></i>
<i class="fas fa-cog"></i>
<i class="fas fa-cogs"></i>
<i class="fas fa-coins"></i>
<i class="fas fa-comment-alt"></i>
<i class="far fa-copy"></i>
<i class="fas fa-couch"></i>
<i class="fas fa-database"></i> --}}