<?php 
include_once("header.php");
require_once("env.php");
?> 

  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details mt-3">
      <div class="container">
        <div class="row gy-4">
          <div class="col-sm-8">
            <div class="portfolio-details-slider swiper">
              <div id="img_propect" class="swiper-wrapper align-items-center">
                <!-- ======= Se Carga A traves de Ajax ======= -->
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="portfolio-info">
              <h3>informacion Del Vehiculo <?php echo $tomorrow ?></h3>
              <ul id="text_prospect">
                <!-- ======= Se Carga A traves de Ajax ======= -->
              </ul>
            </div>
            <div id="desc_prospect" class="portfolio-description">
              <!-- ======= Se Carga A traves de Ajax ======= -->
            </div>
            <div id="avail_prospect"></div>
            <div id="messeged" class="alert alert-info mt-2" role="alert">
              <p id="errord" class="mb-0"></p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <?php 
if (URI<>$_SERVER["REQUEST_URI"] ) {
    include_once("footer.php");
}
include_once("lib.php");
include_once("modals.php")
?>
</body>

</html>