<?php 
include_once("header.php");
require_once("env.php")
?> 
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
        </div>
        <!--
        <div class="row justify-content-md-center mb-3">
          <div class="form-floating col-sm-4 mb-2">
            <select id="model" class="form-select" aria-label="Default select example">
              <option selected>Selecione un Modelo</option>
            </select>
          </div>
          <div class="form-floating col-sm-4 mb-2">
            <select id="brand" class="form-select" aria-label="Default select example">
              <option selected>Selecione una Marca</option>
            </select>
          </div>
          <div class="form-floating col-sm-4 mb-2">
            <select id="anno" class="form-select" aria-label="Default select example">
              <option selected>Selecione un Año</option>
            </select>
          </div>
          <div class="form-floating col-sm-4 mb-2">
            <select id="region" class="form-select" aria-label="Default select example">
              <option selected>Selecione un Region</option>
            </select>
          </div>
        </div>
        -->

        <div id="prospect" class="row" data-aos="fade-up" data-aos-delay="200">

        </div>

        <div id="paginator" class="btn-group justify-content-center" rol="group" aria-label="basic outl">
          
        </div>
      </div>
    </section><!-- End Portfolio Section -->
<?php 
if (URI<>$_SERVER["REQUEST_URI"] ) {
    include_once("footer.php");
}
include_once("lib.php");
?>
</body>

</html>