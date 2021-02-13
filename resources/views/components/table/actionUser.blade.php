<div class="dropdown">
  <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acciones
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    @can('user.show')
      <a class="dropdown-item" href="{{route('users.show',$slug)}}">Ver</a>
      <div class="dropdown-divider"></div>
    @endcan
    @can('user.edit')
      <a class="dropdown-item" href="{{route('users.edit',$slug)}}">Editar</a>
      <div class="dropdown-divider"></div>
    @endcan
    @can('user.destroy')
    <form action="{{route('users.destroy',$slug)}}" method="post" class="formDelete">
      @csrf
      @method('delete')
      <button class="dropdown-item" >Eliminar</button>
  </form>
    @endcan
  </div>
</div>

<script>
  //js/config/validations.js
   actionDelete();
</script>