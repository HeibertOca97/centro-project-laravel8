<div class="dropdown">
  <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acciones
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    @can('user.show')
      <a class="dropdown-item" href="{{route('users.show',$id)}}">Ver</a>
    @endcan
      <div class="dropdown-divider"></div>
    @can('user.edit')
      <a class="dropdown-item" href="{{route('users.edit',$id)}}">Editar</a>
    @endcan
      <div class="dropdown-divider"></div>
    @can('user.destroy')
    <form action="{{route('users.destroy',$id)}}" method="post">
      @csrf
      @method('delete')
      <button class="dropdown-item" >Eliminar</button>
  </form>
    @endcan
  </div>
</div>