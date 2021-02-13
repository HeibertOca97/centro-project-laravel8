<div class="dropdown">
  <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acciones
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    @can('Activities.edit')
      <a class="dropdown-item" href="{{route('actividades.edit',$id)}}">Editar</a>
      <div class="dropdown-divider"></div>
    @endcan
    @can('Activities.destroy')
    <form action="{{route('actividades.destroy',$id)}}" method="post" class="formDelete">
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