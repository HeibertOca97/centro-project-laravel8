<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
<!--CSS-->
<link rel="stylesheet" href="{{asset('css/config/estructura.css')}}">
<link rel="stylesheet" href="{{asset('css/config/navegacion.css')}}">
<!--MODAL-->
{{-- <div id="modals" class="modals"></div> --}}
<!--HTML-->
<section class="section">
<!-- ELEMENTO SUPERIOR HEADER-->
  <section id="box-nav" state="false">
    @yield('barra-menu')
  </section>
<!-- ELEMENTO INFERIOR SECTION DEL CONTENIDO-->
  <section id="box-section">
    @yield('section-content')
  </section>

</section>
<!-- JS -->
<script src="{{asset('js/config/peticiones.js')}}"></script>
<script src="{{asset('js/config/nav.js')}}"></script>