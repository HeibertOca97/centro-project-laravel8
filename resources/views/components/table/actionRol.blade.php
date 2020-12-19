<div class="dropdown">
  <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acciones
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    @can('permission.edit')
      <a class="dropdown-item" href="{{route('roles.edit',$id)}}">Editar</a>
      <div class="dropdown-divider"></div>
    @endcan
    @can('permission.destroy')
    <form action="{{route('roles.destroy',$id)}}" method="post" class="formDelete">
      @csrf
      @method('delete')
      <button class="dropdown-item" >Eliminar</button>
  </form>
    @endcan
  </div>
</div>

<script>
  // js/validations/rol/validation.rol.js
  actionDelete();
</script>