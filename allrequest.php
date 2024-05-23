<?php 
include_once("header.php");
require_once("env.php");
if (!$_SESSION) {
  header("Location: ./");
  die();
}
?> 
<div class="container" style="min-width: 540px;height: auto;">
    <section class="section-bg mt-3">
      <div class="container" data-aos="fade-up">
        <div class="section-title content-header">
          <h2>Lsitado de Solicitudes</h2>
        </div>
        <div class="content-wrapper">
            <!-- ======= Services Section ======= -->
            <div class="container" data-aos="fade-up">
                <div>
                    <!--begin::Table Widget 6-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                  <div class="table-responsive">        
                                      <table id="allrequsertable" class="table table-hover table-condensed table-bordered table-striped text-center" style="width:100%" >
                                          <thead class="text-center" style="background-color: #17A2B8;color: white;">
                                              <tr>
                                                <th>Cod. Solicitud</th>
                                                <th>Fec. Solicitud</th>
                                                <th>Marca de Vehiculo</th>
                                                <th>Modelo de Vehiculo</th>
                                                <th>Monto Pagado</th>
                                                <th>Estado</th>
                                                <th>Comprobante</th>
                                              </tr>
                                          </thead>
                                          <tbody>                           
                                          </tbody>
                                          <tfoot style="background-color: #ccc;color: white;">
                                              <tr>
                                                <th>Cod. Solicitud</th>
                                                <th>Fec. Solicitud</th>
                                                <th>Marca de Vehiculo</th>
                                                <th>Modelo de Vehiculo</th>
                                                <th>Monto Pagado</th>
                                                <th>Estado</th>
                                                <th>Comprobante</th>
                                              </tr>
                                          </tfoot>        
                                      </table>               
                                  </div>
                                </div>
                            </div>  
                        </div>
                    </div>      
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