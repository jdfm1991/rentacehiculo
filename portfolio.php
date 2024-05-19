<?php 
include_once("header.php");
require_once("env.php");
?> 
    <!-- ======= Portfolio Section ======= -->
    <button id="search" type="button" class="btn btn-primary btnsearch" data-bs-toggle="modal" data-bs-target="#advanceModal"><i class="bi bi-search"></i>
      <span class="tsearch">Busqueda Avanzada</span>
    </button>
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Portfolio</h2>
        </div> 
        <div id="prospect" class="row" data-aos="fade-up" data-aos-delay="200">
          <!-- ======= Carga a Traves de Ajax ======= -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="Page navigation example">
                    <ul id="paginator" class="pagination justify-content-center">
                      <!-- ======= Carga a Traves de Ajax ======= -->
                      <!--<li class="page-item '.$active.'"><a class="page-link" href="#" data="'.$i.'">'.$i.'</a></li>-->
                    </ul>
                </nav>
            </div>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <section id="mobile" class="portfolio section-bg">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="portfolio-details-slider swiper">
              <div id="portfoliomobile" class="swiper-wrapper align-items-center">
                <!-- ======= Carga a Traves de Ajax ======= -->
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>

      </div>
    </section>
<?php 
include_once("modals.php");
if (URI<>$_SERVER["REQUEST_URI"] ) {
  include_once("footer.php");
}
include_once("lib.php");
?>
</body>

</html>