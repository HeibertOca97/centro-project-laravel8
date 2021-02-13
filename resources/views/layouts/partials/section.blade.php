<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
<!--CSS-->
<link rel="stylesheet" href="{{asset('css/config/estructura.css')}}">
<link rel="stylesheet" href="{{asset('css/config/navegacion.css')}}">
<!--HTML-->
<section class="section">
<!-- ELEMENTO SUPERIOR HEADER-->
  <section id="box-nav" state="false" class="scroll-default">
    @yield('barra-menu')
  </section>
<!-- ELEMENTO INFERIOR SECTION DEL CONTENIDO-->
  <section id="box-section" class="scroll-default">
    <div class="mg-content-box">
      @yield('section-content')
    </div>
  </section>

</section>
<!-- JS -->
<script src="{{asset('js/config/request.js')}}"></script>
<script src="{{asset('js/config/nav.js')}}"></script>