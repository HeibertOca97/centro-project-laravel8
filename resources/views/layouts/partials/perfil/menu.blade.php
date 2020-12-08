<nav id="bar-menu">
  <p class="txt-clasificador">Opciones</p>
<a href="{{route('user.profiles.index')}}" class="opt-link">
    <div class="{{request()->routeIs('user.profiles.index') ? 'activeRoute' : ' '}}">
      <p>Editar Perfil</p>
    </div>
  </a>
  <a href="{{route('user.profiles.password')}}" class="opt-link">
    <div class="{{request()->routeIs('user.profiles.password') ? 'activeRoute' : ' '}}">
      <p>Cambiar contraseña</p>
    </div>
  </a>
</nav>