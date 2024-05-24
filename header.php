<?php 
session_name('R3nt@k4r');
session_start();
date_default_timezone_set('America/Caracas')
?> <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Demo - Sistema de Renta de Vehiculos</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- File jquery v3.7.0 -->
  <script src="assets/js/jquery-3.7.0.min.js"></script>
  <!-- File Datatables -->
  <link href="assets/dataTables/datatables.min.css" rel="stylesheet">
  <script src="assets/dataTables/datatables.min.js"></script>
  <script src="assets/dataTables/dataTables.responsive.min.js"></script>

  <!-- File sweetalert2 -->
  <script src="assets/sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
</head>

<body>
  <?php
  if ($_SESSION) {
    echo '<input type="hidden" id="session" value="'.$_SESSION['id'].'">';
  }
  ?>
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="./" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <?php
        if ($_SESSION) {
          if ($_SESSION['idtype']==1) {
            echo '
            <li><a href="admin.php" class="nav-link scrollto"><i class="bi bi-building"></i> <span>Dashboard</span></a></li>
            ';
          }
        }
        ?>
        <li><a href="./portfolio.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
        <?php
        if ($_SESSION) {
          if ($_SESSION['idtype']==1) {
            echo '
            <li><a href="vehicle.php" class="nav-link scrollto"><i class="bi bi-car-front"></i> <span>Lista de Vehiculos</span></a></li>
            <li><a href="client.php" class="nav-link scrollto"><i class="bi bi-person-lines-fill"></i> <span>Lista de Clientes</span></a></li>
            <li><a href="allrequest.php" class="nav-link scrollto"><i class="bi bi-send-arrow-up"></i> <span>Lista de Solicitudes</span></a></li>
            <li><a href="setting.php" class="nav-link scrollto"><i class="bi bi-gear-wide-connected"></i> <span>Configuraciones</span></a></li>
            ';
          }
          if ($_SESSION['idtype']==2) {
            echo '
            <li><a href="profile.php" class="nav-link scrollto"><i class="bi bi-person-gear"></i> <span>Mi Perfil</span></a></li>
            <li><a href="myrequest.php" class="nav-link scrollto"><i class="bi bi-send-arrow-up"></i> <span>Mis Solicitudes</span></a></li>
            <li><a href="whoiam.php" class="nav-link scrollto"><i class="bi bi-buildings"></i> <span>Policas E Infomacion</span></a></li>
            <li><a href="howtouseme.php" class="nav-link scrollto"><i class="bi bi-question-square"></i> <span>Como Usar La pagina</span></a></li>
            ';
          }
          
        }else {
          echo '
            <li><a href="whoiam.php" class="nav-link scrollto"><i class="bi bi-buildings"></i> <span>Policas E Infomacion</span></a></li>
            <li><a href="howtouseme.php" class="nav-link scrollto"><i class="bi bi-question-square"></i> <span>Como Usar La pagina</span></a></li>
            ';
        }
        ?>
      </ul>
    </nav><!-- .nav-menu -->
  </header><!-- End Header -->
<?php
if ($_SESSION) { ?>
<button id="btnLogout" type="button" class="btn btn-outline-danger btnlogin radius"><i class="bi bi-person-fill-x"></i><span class="tsearch">Cerrar Sesion</span>
    </button>
<?php
} else { ?>
<button id="btnLogin" type="button" class="btn btn-outline-success btnlogin radius"><i class="bx bx-user"></i><span class="tsearch"> Iniciar Sesion</span>
    </button>
<?php
}
?>
<?php
if ($_SESSION) { 
  if ($_SESSION['idtype']==2) {
    ?>
<button id="viewreq" type="button" class="btn btn-outline-info btnreq">
  <i class="bi bi-cart-check-fill"></i>
  <span id="reqc2" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
    <!-- ======= Carga a Traves de Ajax ======= --> 
  </span>
</button>
<?php   } } ?>