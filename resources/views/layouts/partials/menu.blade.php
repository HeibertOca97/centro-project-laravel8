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
  
  <div class="opt-list">
    <div state="false">
      <i class="fas fa-book"></i><p>Academico</p><i class="fas fa-plus"></i>
    </div>
    <main class="list-link">
      <a href="#">
        <div>
          <i class="fas fa-check"></i>
          <p>Facultades</p>
        </div>
      </a>
      <a href="#">
        <div>
          <i class="fas fa-check"></i>
          <p>Carreras</p>
        </div>
      </a>
      <a href="#">
        <div>
          <i class="fas fa-check"></i>
          <p>Periodos</p>
        </div>
      </a>
    </main>
  </div>
  <div class="opt-list">
    <div state="false">
      <i class="fas fa-briefcase"></i><p>Proyectos</p><i class="fas fa-plus"></i>
    </div>
    <main class="list-link">
      <a href="#">
        <div>
          <i class="fas fa-check"></i>
          <p>Estudiantiles</p>
        </div>
      </a>
      <a href="#">
        <div>
          <i class="fas fa-check"></i>
          <p>Escuela de lideres</p>
        </div>
      </a>
    </main>
  </div>
</nav>