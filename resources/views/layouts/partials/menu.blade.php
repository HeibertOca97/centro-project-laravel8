<nav id="bar-menu">
  <br>
  <a href="{{route('dashboard')}}" class="opt-link"  title="Dashboard">
    <div class="{{request()->routeIs('dashboard') ? 'activeRoute' : ' '}}">
      <i class="fas fa-tachometer-alt"></i>
    <p>Tablero</p>
    </div>
  </a>
  <hr>
  <p class="txt-clasificador">Gestiones</p>
  @can('user.index')
  <a href="{{route('users.index')}}" class="opt-link" title="Usuarios">
    <div class="{{request()->routeIs('users.*') ? 'activeRoute' : ' '}}">
      <i class="fas fa-users"></i>
      <p>Usuarios</p>
    </div>
  </a>
  @endcan

  @can('role.index')
  <a href="{{route('roles.index')}}" class="opt-link" title="Roles">
    <div class="{{request()->routeIs('roles.*') ? 'activeRoute' : ' '}}">
      <i class="fas fa-user-tag"></i>
      <p>Roles</p>
    </div>
  </a>
  @endcan
  
  @can('permission.index')
  <a href="{{route('permissions.index')}}" class="opt-link" title="Permisos">
    <div class="{{request()->routeIs('permissions.*') ? 'activeRoute' : ' '}}">
      <i class="fas fa-user-shield"></i>
      <p>Permisos</p>
    </div>
  </a>
  @endcan
 
  @if(Auth::user()->hasAnyPermission(['matrizActividad.index','plantrabajo.index']))
  <div class="opt-list">
    <div state="{{request()->routeIs('planes.*') || request()->routeIs('actividades.*') || request()->routeIs('mis-actividades.*') ? 'true' : 'false'}}" class="{{request()->routeIs('planes.*') || request()->routeIs('actividades.*') || request()->routeIs('mis-actividades.*') ? 'activeRoute' : ' '}}">
      <i class="fas fa-clipboard-list"></i><p>Tareas</p><i class="fas fa-plus"></i>
    </div>
    <main class="list-link">
      @can('plantrabajo.index')
      <a href="{{route('planes.index')}}">
        <div class="{{request()->routeIs('planes.*') ? 'activeRoute' : ' '}}">
          <i class="fas fa-book"></i>
          <p>Plan de trabajo</p>
        </div>
      </a>
      @endcan
      @can('matrizActividad.index')
      <a href="{{route('actividades.index')}}">
        <div class="{{request()->routeIs('actividades.*') ? 'activeRoute' : ' '}}">
          <i class="fas fa-clipboard-check"></i>
          <p>Matriz de actividades</p>
        </div>
      </a>
      @endcan
      {{-- @can('matrizActividad.index') --}}
      <a href="{{route('mis-actividades.index')}}">
        <div class="{{request()->routeIs('mis-actividades.*') ? 'activeRoute' : ' '}}">
          <i class="far fa-calendar-check"></i>
          <p>Mis actividades</p>
        </div>
      </a>
      {{-- @endcan --}}
    </main>
  </div>
  @endif
  
</nav>