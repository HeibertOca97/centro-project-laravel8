<div class="dropdown">
  <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acciones
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    @can('emprendedor.edit')
      @if(\App\Models\InscripcionNuevoEmprendedor::where('emprendedor_id','=',$id)->get()->isNotEmpty())
        <a class="dropdown-item" href="{{route('emprendedores.editnew',$slug)}}">Editar <span class="badge badge-info">new</span></a>
        <div class="dropdown-divider"></div>
      @endif
      @if(\App\Models\InscripcionEmprendedor::where('emprendedor_id','=',$id)->get()->isNotEmpty())
        <a class="dropdown-item" href="{{route('emprendedores.edit',$id)}}">Editar</a>
        <div class="dropdown-divider"></div>
      @endif
    @endcan
    @can('emprendedor.destroy')
    <form action="{{route('emprendedores.destroy',$slug)}}" method="post" class="formDelete">
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