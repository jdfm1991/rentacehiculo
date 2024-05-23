<?php 
include_once("header.php");
require_once("env.php");
if (!$_SESSION) {
  header("Location: ./");
  die();
}
?>
<div style="min-width: 540px;height: auto;">
    <section>
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gestion de Solicitudes</h2>
        </div>
        <div class="row">
          <div class="col-sm-5 ">
            <div data-aos="fade-up">
                <div class="card mb-3">
                  <div class="card-header">
                    <h2>Listado de Solicitudes</h2>
                  </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="table-responsive">        
                                  <table id="allrequsertable" class="table table-hover table-condensed table-bordered table-striped text-center" style="width:100%" >
                                      <thead class="text-center" style="background-color: #17A2B8;color: white;">
                                          <tr>
                                            <th>Cod. Solicitud</th>
                                            <th>Cliente</th>
                                            <th>N# de Telefono</th>
                                            <th>Estado</th>
                                          </tr>
                                      </thead>
                                      <tbody>                           
                                      </tbody>
                                      <tfoot style="background-color: #ccc;color: white;">
                                          <tr>
                                            <th>Cod. Solicitud</th>
                                            <th>Cliente</th>
                                            <th>N# de Telefono</th>
                                            <th>Estado</th>
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
          <div class="col-sm-7 order-md-last">
            <div class="card">
              <div class="card-body">
                <picture id="logoreq">
                  <source srcset="assets/img/logo.png" type="image/svg+xml" />
                  <img src="assets/img/logo.png" class="img-fluid" alt="imagen del logo" width="600"/>
                </picture>
                <form id="formRequest" data-bs-spy="scroll" data-bs-smooth-scroll="true" class="scrollspy-example bs-body-tertiry p-3 rounded-2" index="0">
                  <p class="justify-content-centerd-grid gap-2 d-md-flex justify-content-md-end"><strong>ID Solicitud: </strong><strong id="idsol"></strong> / <strong id="estsol"></strong></p> 
                  <div class="row justify-content-md-center">
                    <div class="mb-3 col-sm-6">
                      <strong><label for="" class="form-label">Infomacion de Cliente</label></strong><br>
                      <label for="rname2" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="rname2">
                      <label for="rphone2" class="form-label">N# Telefono</label>
                      <input type="tel" class="form-control" id="rphone2">
                      <label for="dni2" class="form-label">DNI</label>
                      <input type="text" class="form-control" id="dni2">
                    </div>
                    <div class="mb-3 col-sm-6">
                      <strong><label for="" class="form-label">Infomacion de Vehiculo</label></strong><br>
                      <label for="rbrand2" class="form-label">Marca</label>
                      <input type="text" class="form-control" id="rbrand2">
                      <label for="rmodel2" class="form-label">Modelo</label>
                      <input type="text" class="form-control" id="rmodel2">
                      <div class="row mb-3 ">
                        <div class="col-sm-6">
                          <label for="ranno2" class="form-label">Annio</label>
                          <input type="text" class="form-control" id="ranno2">
                        </div>
                        <div class="col-sm-6">
                          <label for="rplate2" class="form-label">Matricula</label>
                          <input type="text" class="form-control" id="rplate2">
                        </div>
                      </div>
                    </div>
                    <div class="mb-3 col-sm-4">
                      <strong><label for="" class="form-label">Infomacion de Pago</label></strong><br>
                      <label for="metho2" class="form-label">Metodo de pago</label>
                      <input id="metho2" type="text" class="form-control">
                      <label for="fechap2" class="form-label">Fecha de Pago</label>
                      <input id="fechap2" type="date" class="form-control">
                      <label for="reference2" class="form-label">N# Referencia</label>
                      <input type="text" class="form-control" id="reference2">
                    </div>
                    <div class="mb-3 col-sm-4">
                      <strong><label for="" class="form-label">Infomacion de Alquiler</label></strong><br>
                      <label for="fechar2" class="form-label">Fecha Renta</label>
                      <input id="fechar2" type="date" class="form-control">
                      <label for="fechae2" class="form-label">Fecha Entrega</label>
                      <input id="fechae2" type="date" class="form-control">
                      <div class="mt-3 form-floating">
                        <select class="form-select" id="newstatus"  aria-label="Default select example" required>
                          <!-- ======= Carga a Traves de Ajax ======= --> 
                        </select>
                        <label for="newstatus">Estatus</label>
                      </div>
                    </div>
                    <div class="mb-3 col-sm-4">
                      <strong><label for="" class="form-label">Comprobante de Pago</label></strong><br>
                      <div id="datamethod2">
                        
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                      <button type="submit" class="btn btn-outline-primary">Enviar</button>
                  </div>
                </form> 
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
