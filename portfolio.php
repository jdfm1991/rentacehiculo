<?php 
include_once("header.php");
require_once("env.php");
?> 
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>
        
        <div id="prospect" class="row" data-aos="fade-up" data-aos-delay="200">

        </div>

        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="Page navigation example">
                    <ul id="paginator" class="pagination justify-content-center">
                        <!--<li class="page-item '.$active.'"><a class="page-link" href="#" data="'.$i.'">'.$i.'</a></li>-->
                    </ul>
                </nav>
            </div>
        </div>
      </div>
    </section><!-- End Portfolio Section -->
<?php 
if (URI<>$_SERVER["REQUEST_URI"] ) {
    include_once("footer.php");
}
include_once("lib.php");
include_once("modals.php")
?>
</body>

</html>