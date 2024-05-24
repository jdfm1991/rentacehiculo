<?php 
include_once("header.php");
require_once("env.php");
if (!$_SESSION) {
  header("Location: ./");
  die();
}
?>
<input type="hidden" id="settingID">
<div style="min-width: 540px;height: auto;">
    <section>
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Seccion de Configuracion</h2>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div data-aos="fade-up">
                <div class="card mb-3">
                  <div class="card-header">
                    <h2>Listado de Usuario</h2>
                    <div class="justify-content-centerd-grid gap-2 d-md-flex justify-content-md-end hide">
                      <button id="btnuser" type="button" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i><i class="bi bi-car-front"></i>
                          <span class="tsearch">Registrar Usuario</span>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="usertable" class="table table-hover table-condensed table-bordered table-striped text-center" style="width:100%" >
                          <thead class="text-center" style="background-color: #17A2B8;color: white;">
                              <tr>
                                <th>Correo</th>
                                <th>Accion</th>
                              </tr>
                          </thead>
                          <tbody>                           
                          </tbody>
                          <tfoot style="background-color: #ccc;color: white;">
                              <tr>
                                <th>Correo</th>
                                <th>Accion</th>
                              </tr>
                          </tfoot>        
                      </table>               
                    </div>
                  </div>
                </div>      
            </div>      
          </div>
          <div class="col-sm-6">
            <div data-aos="fade-up">
                <div class="card mb-3">
                  <div class="card-header">
                    <h2>Listado de Regiones</h2>
                    <div class="justify-content-centerd-grid gap-2 d-md-flex justify-content-md-end hide">
                      <button id="btnregion" type="button" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i><i class="bi bi-car-front"></i>
                          <span class="tsearch">Registrar Usuario</span>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="regiontable" class="table table-hover table-condensed table-bordered table-striped text-center" style="width:100%" >
                          <thead class="text-center" style="background-color: #17A2B8;color: white;">
                              <tr>
                                <th>Region</th>
                                <th>Accion</th>
                              </tr>
                          </thead>
                          <tbody>                           
                          </tbody>
                          <tfoot style="background-color: #ccc;color: white;">
                              <tr>
                                <th>Region</th>
                                <th>Accion</th>
                              </tr>
                          </tfoot>        
                      </table>               
                    </div>
                  </div>
                </div>      
            </div>             
          </div>
          <div class="col-sm-6">
            <div data-aos="fade-up">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="table-responsive">
                      <!--<div class="justify-content-centerd-grid gap-2 d-md-flex justify-content-md-end hide">
                        <button id="newuser" type="button" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i><i class="bi bi-car-front" disabled></i>
                            <span class="tsearch">Registrar Usuario</span>
                        </button>
                      </div>-->
                      <table id="usertable" class="table table-hover table-condensed table-bordered table-striped text-center" style="width:100%" >
                          <thead class="text-center" style="background-color: #17A2B8;color: white;">
                              <tr>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>N# Telefono</th>
                                <th>Correo</th>
                                <th>Estatus</th>
                                <th>Tipo</th>
                                <th>Accion</th>
                              </tr>
                          </thead>
                          <tbody>                           
                          </tbody>
                          <tfoot style="background-color: #ccc;color: white;">
                              <tr>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>N# Telefono</th>
                                <th>Correo</th>
                                <th>Estatus</th>
                                <th>Tipo</th>
                                <th>Accion</th>
                              </tr>
                          </tfoot>        
                      </table>               
                    </div>
                  </div>
                </div>      
            </div>      
          </div>
          <div class="col-sm-6">
            <div data-aos="fade-up">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="table-responsive">
                      <!--<div class="justify-content-centerd-grid gap-2 d-md-flex justify-content-md-end hide">
                        <button id="newuser" type="button" class="btn btn-primary mb-3"><i class="bi bi-plus-lg"></i><i class="bi bi-car-front" disabled></i>
                            <span class="tsearch">Registrar Usuario</span>
                        </button>
                      </div>-->
                      <table id="usertable" class="table table-hover table-condensed table-bordered table-striped text-center" style="width:100%" >
                          <thead class="text-center" style="background-color: #17A2B8;color: white;">
                              <tr>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>N# Telefono</th>
                                <th>Correo</th>
                                <th>Estatus</th>
                                <th>Tipo</th>
                                <th>Accion</th>
                              </tr>
                          </thead>
                          <tbody>                           
                          </tbody>
                          <tfoot style="background-color: #ccc;color: white;">
                              <tr>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>N# Telefono</th>
                                <th>Correo</th>
                                <th>Estatus</th>
                                <th>Tipo</th>
                                <th>Accion</th>
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
    </section>
</div>
<script src="assets/js/setting.js"></script>
<?php 
if (URI<>$_SERVER["REQUEST_URI"] ) {
  include_once("footer.php");
}
include_once("modals.php");
include_once("lib.php");
?>

</body>

</html>
