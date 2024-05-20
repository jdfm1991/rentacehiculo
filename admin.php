<?php
include_once("header.php");
require_once("env.php");
if (!$_SESSION) {
  header("Location: ./");
  die();
}
?>
  <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contador Iniciales</h2>
        </div>
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span class="counting" id="nclient">0</span>
              <p>Cantidad De Clientes</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span class="counting" id="nuser">0</span>
              <p>Cantidad De Usuario Root</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span class="counting" id="ncar">0</span>
              <p>Cantidad De Vehiculos</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-award"></i>
              <span class="counting" id="nrent">0</span>
              <p>Cantidad De Alquileres</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Facts Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Indicadores</h2>
        </div>
        <div id="solicitud" class="row skills-content justify-content-center">
        </div>
      </div>
    </section><!-- End Skills Section -->
<?php 
include_once("modals.php");
if (URI<>$_SERVER["REQUEST_URI"] ) {
  include_once("footer.php");
}
include_once("lib.php");
?>
</body>
</html>