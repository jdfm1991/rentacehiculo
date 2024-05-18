<?php 
include_once("header.php");
require_once("env.php");
if (!$_SESSION) {
  header("Location: ./");
  die();
}
?> 
<div class="container">
    <section class="section-bg mt-3">
      <div class="container" data-aos="fade-up">
        <div class="section-title content-header">
          <h2>mis Solicitudes</h2>
        </div>
        <div class="content-wrapper">
            <!-- ======= Services Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="table-responsive col-sm">
                    <!--begin::Table Widget 6-->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="table-responsive">        
                                      <table id="requsertable" class="table table-hover table-condensed table-bordered table-striped text-center" style="width:100%" >
                                          <thead class="text-center" style="background-color: #17A2B8;color: white;">
                                              <tr>
                                                  <th>Cod</th>
                                                  <th>Producto</th>
                                                  <th>Referencia</th>
                                                  <th>Marca</th>
                                                  <th>Disp.</th>
                                              </tr>
                                          </thead>
                                          <tbody>                           
                                          </tbody>
                                          <tfoot style="background-color: #ccc;color: white;">
                                              <tr>
                                                  <th>Cod</th>
                                                  <th>Producto</th>
                                                  <th>Referencia</th>
                                                  <th>Marca</th>
                                                  <th>Disp.</th>
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
include_once("modals.php");
if (URI<>$_SERVER["REQUEST_URI"] ) {
  include_once("footer.php");
}
include_once("lib.php");
?>

</body>

</html>