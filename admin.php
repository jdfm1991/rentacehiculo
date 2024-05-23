<?php
include_once("header.php");
require_once("env.php");
if (!$_SESSION) {
  header("Location: ./");
  die();
}
?>
<div style="min-width: 540px;height: auto;">
    <section class="section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Infomacion General</h2>
        </div>
        <div class="row">
          <div class="col-md-5 col-lg-4 order-md-last">
             <!-- ======= Facts Section ======= -->
              <div id="facts" class="facts">
                <div class="container" data-aos="fade-up">

                  <div class="section-title">
                    <h2>Contador</h2>
                  </div>
                  <div class="row justify-content-center">

                    <div class="col-lg-6 col-md-6">
                      <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <span class="counting" id="nclient">0</span>
                        <p>Clientes</p>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-5 mt-md-0">
                      <div class="count-box">
                        <i class="bi bi-journal-richtext"></i>
                        <span class="counting" id="nuser">0</span>
                        <p>Administradores</p>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-5 mt-lg-0">
                      <div class="count-box">
                        <i class="bi bi-headset"></i>
                        <span class="counting" id="ncar">0</span>
                        <p>Vehiculos</p>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-5 mt-lg-0">
                      <div class="count-box">
                        <i class="bi bi-award"></i>
                        <span class="counting" id="nrent">0</span>
                        <p>Alquileres</p>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- End Facts Section -->
          </div>
          <div class="col-md-7 col-lg-8">
            <!-- ======= Skills Section ======= -->
            <div id="skills" class="skills section-bg">
              <div class="container" data-aos="fade-up">
                <div class="section-title">
                  <h2>Indicadores</h2>
                </div>
                <div class="about mt-3">
                  <div class="pt-4 pt-lg-0 content">
                    <h3 class="text-center">Porcentaje de Solicitudes</h3>
                  </div>
                </div>
                <div id="solicitud" class="row skills-content justify-content-center">
                </div>
                <div class="about mt-3">
                  <div class="pt-4 pt-lg-0 content">
                    <h3 class="text-center">Porcentaje de Vehiculos</h3>
                  </div>
                </div>
                <div id="vehiculo" class="row skills-content justify-content-center">
                </div>
                <div class="about mt-3">
                  <div class="pt-4 pt-lg-0 content">
                    <h3 class="text-center">Porcentaje de Clientes</h3>
                  </div>
                </div>
                <div id="usuario" class="row skills-content justify-content-center">
                </div>
              </div>
            </div>
            <!-- End Skills Section -->
          </div>
        </div> 
      </div>
    </section>
</div>
<?php 
if (URI<>$_SERVER["REQUEST_URI"] ) {
  include_once("footer.php");
}
include_once("modals.php");
include_once("lib.php");
?>
</body>
</html>