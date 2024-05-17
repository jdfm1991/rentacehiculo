<?php
include_once("header.php");
require_once("env.php");
?>
  <!-- ======= Hero Section ======= --> 
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Nombre de la Empresa</h1>
      <p>Somos tu mejor opcion en alquiler de <span class="typed" data-typed-items="carros, camiones, pick up y mas"></span></p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </section><!-- End Hero -->
  <?php 
if (URI!=$_SERVER["REQUEST_URI"] ) {
    include_once("footer.php");
}
include_once("lib.php");
include_once("modals.php")
?>

</body>

</html>