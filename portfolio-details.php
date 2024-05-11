<?php 
include_once("header.php");
require_once("env.php")
?> 

  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div id="img_propect" class="swiper-wrapper align-items-center">

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>informacion Del Vehiculo</h3>
              <ul id="text_prospect">
                
              </ul>
            </div>
            <div id="desc_prospect" class="portfolio-description">
              
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
?>
</body>

</html>