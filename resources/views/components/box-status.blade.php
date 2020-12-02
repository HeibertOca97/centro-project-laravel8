<link rel="stylesheet" href="{{asset('css/components/box-status.css')}}">

<div id="box-main-content">
  <h1 class="titulo-interface"><i class="fas fa-tachometer-alt"></i> Tablero</h1>
 <div class="box-cards-data">
  <article class="bg-back-card">
    <div class="box-icon-info  bg-card-info-users">
      <i class="fas fa-users"></i>
    </div>
    <h3>Usuarios</h3>  
    <p>{{$num_users}}</p>
  </article>
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
</div>


{{-- <i class="fas fa-cloud-download-alt"></i>
<i class="fas fa-cloud-upload-alt"></i>
<i class="fas fa-coffee"></i>
<i class="fas fa-cog"></i>
<i class="fas fa-cogs"></i>
<i class="fas fa-coins"></i>
<i class="fas fa-comment-alt"></i>
<i class="far fa-copy"></i>
<i class="fas fa-couch"></i>
<i class="fas fa-database"></i> --}}