<?php
$today = date('Y-m-d');
$newday = strtotime('+1 day', strtotime($today));
$tomorrow = date('Y-m-d', $newday);
?>
<!--
  *************************************************
  Modal Para Registro de Usuario e Inicio de Sesion
  *************************************************
-->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login - Modulo Admin</h1>
        <button type="button" id="closeLogin" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formLogin">    
                <div class="modal-body">
                  <div id="optreg">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" placeholder="Ingrese Nombre y Apellido">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">N# Telefono</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Ingrese Numero Telefonico">
                    </div>
                  </div>
                  <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Email" required>
                  </div>
                  <div class="mb-3">
                      <label for="pass" class="form-label">Contraseña</label>
                      <input type="password" class="form-control" id="pass" placeholder="Contraseña" required>
                  </div>              
                </div>
                <div class="modal-footer">
                <div id="options" class="mx-3 px-3">
                    <a href="" id="lnkRegister">Registrarme</a>
                    <br>
                    <a href="" id="forget">Olvide Contraseña</a>
                  </div>
                    <button type="button" id="cncLogin" class="btn btn-outline-danger btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnStart" class="btn btn-outline-primary btn-light">Entrar</button>
                    <button type="button" id="btnRegister" class="btn btn-outline-primary btn-light">Registar</button>
                </div>
                <div id="messegel" class="alert alert-warning" role="alert">
                  <p id="errorl" class="mb-0">Alert Description</p>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>
<!--
  *************************************************
  Modal Para Opcion de Olvide Contrase#a
  *************************************************
-->
<div class="modal fade" id="forgetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login - Modulo Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formforget">    
                <div class="modal-body">
                  <div class="mb-3">
                      <label for="emailf" class="form-label">Email</label>
                      <input type="email" class="form-control" id="emailf" placeholder="Email" required>
                  </div>            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnforget" class="btn btn-outline-primary btn-light">Enviar Solicitud</button>
                </div>
                <div id="messegef" class="alert alert-warning" role="alert">
                  <p id="errorf" class="mb-0">Alert Description</p>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>
<!--
  *************************************************
  Modal Para Opcion de Busqueda Avanzada
  *************************************************
-->
<div class="modal fade" id="advanceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Busqueda Avanzada, Selecciones los Filtros</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="mb-3">
        <div class="row justify-content-center">
          <div class="col-sm-3">
            <div class="form-floating">
              <select class="form-select" id="region"  aria-label="Default select example">
                <!-- ======= Carga a Traves de Ajax ======= --> 
              </select>
              <label for="region">Selecione un Region</label>
            </div>
          </div>
          <div id="cbrand" class="col-sm-3">
            <div class="form-floating">
              <select id="brand" class="form-select" aria-label="Default select example">
                <!-- ======= Carga a Traves de Ajax ======= -->
              </select>
              <label for="brand">Selecione una Marca</label>
            </div>
          </div>
          <div id="cmodel" class="col-sm-3">
            <div class="form-floating">
              <select id="model" class="form-select" aria-label="Default select example">
                <!-- ======= Carga a Traves de Ajax ======= -->
              </select>
              <label for="model">Selecione un Modelo</label>
            </div>
          </div>
          <div id="canno" class="col-sm-3">
            <div class="form-floating">
              <select id="anno" class="form-select" aria-label="Default select example">
                <!-- ======= Carga a Traves de Ajax ======= -->
              </select>
              <label for="anno">Selecione un Año</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div id="alertma" class="alert" role="alert">
          <div id="messagema" class="row justify-content-sm-center mb-3">
            <!-- ======= Carga a Traves de Ajax ======= -->
          </div>
        </div>
        <section class="portfolio section-bg">
          <div id="advancep" class="row" data-aos="fade-up" data-aos-delay="200">
            <!-- ======= Carga a Traves de Ajax ======= -->
          </div>
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-light" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!--
  *************************************************
  Modal Para Registro de Renta de Vehiculo
  *************************************************
-->
<div class="modal fade mt-5" id="rentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Informacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formRent">    
                <div class="modal-body">
                  <input type="hidden" id="rstatus">
                  <div id="messeger" class="alert alert-warning" role="alert">
                    <p id="errorr" class="mb-0">Alert Description</p>
                  </div>
                  <div class="row justify-content-md-center">
                    <strong><label for="" class="form-label">Infomacion de Cliente</label></strong>
                    <div class="mb-3 col-sm-6">
                        <label for="rname" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="rname">
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label for="rphone" class="form-label">N# Telefono</label>
                      <input type="tel" class="form-control" id="rphone">
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label for="rdni" class="form-label">DNI</label>
                      <input type="number" class="form-control" id="rdni">
                    </div>
                    <div class="mb-3 col-sm-6"></div>
                    <strong><label for="" class="form-label">Infomacion de Vehiculo</label></strong>
                    <div class="mb-3 col-sm-6">
                      <label for="rbrand" class="form-label">Marca</label>
                      <input type="text" class="form-control" id="rbrand">
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label for="rmodel" class="form-label">Modelo</label>
                      <input type="text" class="form-control" id="rmodel">
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label for="ranno" class="form-label">Annio</label>
                      <input type="text" class="form-control" id="ranno">
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label for="rplate" class="form-label">Matricula</label>
                      <input type="text" class="form-control" id="rplate">
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label for="rcost" class="form-label">Costo Por Dia</label>
                      <input type="text" class="form-control" id="rcost">
                    </div>
                    <strong><label for="" class="form-label">Infomacion de Alquiler</label></strong>
                    <div class="mb-3 col-sm-6">
                      <label for="fechar" class="form-label">Fecha Renta</label>
                      <input id="fechar" type="date" class="form-control" value=<?php echo $today; ?> min=<?php echo $today; ?>>
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label for="fechae" class="form-label">Fecha Entrega</label>
                      <input id="fechae" type="date" class="form-control" value=<?php echo $tomorrow; ?> min=<?php echo $tomorrow; ?>>
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="diaa" class="form-label"> <strong>Dias de Alquiler: <span id="diaa"></span></strong> </label>
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="mont" class="form-label">Monto a Pagar</label>
                        <input type="text" class="form-control" id="mont">
                    </div>
                  </div>
                  <div class="mb-3">
                      <label for="payment" class="form-label">Soporte de Pago</label>
                      <input type="file" class="form-control" id="payment" required>
                      <div id="paymentimg"></div>
                  </div>
                  <div id="messeger2" class="alert alert-warning" role="alert">
                    <p id="errorr2" class="mb-0">Alert Description</p>
                  </div>                                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button id="save" type="submit" class="btn btn-outline-primary">Registar</button>
                    <button id="send" type="button" class="btn btn-outline-primary">Enviar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>
<!--
  *************************************************
  Toast para Actualizar Solicitudes de Rentas
  *************************************************
-->
<div class="toast-container position-fixed top-0 end-0 p-5 m-5">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="assets/img/exclamacion.png" class="rounded me-2" height=20>
      <strong class="me-auto">Por Favor Escoja Una Opcion</strong>
      <small>Ahora</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <button id="sendreq" type="button" class="btn btn-outline-success btn-sm">Enviar Solicitud</button>
      <button id="cancreq" type="button" class="btn btn-outline-danger btn-sm">Cancelar Solicitud</button>
  </div>
  </div>
</div>

<!--
  *************************************************
  Modal Para Registro de Registro de Vehiculo
  *************************************************
-->
<div class="modal fade mt-5" id="VehicleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Informacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formVehicle">    
                <div class="modal-body">
                  <input type="hidden" id="id">
                  <div class="row justify-content-md-center">
                    <strong><label for="" class="form-label">Infomacion del Vehiculo</label></strong>
                    <div class="mb-3 col-sm-6">
                        <label for="plate" class="form-label">Placa / Matricula</label>
                        <input type="text" class="form-control" id="plate" placeholder="Ingrese el Numero de Placa / Matricula" style="text-transform:uppercase" required>
                    </div>
                    <div class="mt-3 mb-3 col-sm-6">
                      <div class="form-floating">
                        <select class="form-select" id="vregion"  aria-label="Default select example" required>
                          <!-- ======= Carga a Traves de Ajax ======= --> 
                        </select>
                        <label for="vregion">Selecione un Region</label>
                      </div>
                    </div>
                    <div class="mb-3 col-sm-6">
                      <div class="form-floating">
                        <select class="form-select" id="vbrand"  aria-label="Default select example" required>
                          <!-- ======= Carga a Traves de Ajax ======= --> 
                        </select>
                        <label for="vbrand">Selecione una Marca</label>
                      </div>
                    </div>
                    <div class="mb-3 col-sm-6">
                      <div class="form-floating">
                        <select class="form-select" id="vmodel"  aria-label="Default select example" required>
                          <!-- ======= Carga a Traves de Ajax ======= --> 
                        </select>
                        <label for="vmodel">Selecione un Modelo</label>
                      </div>
                    </div>
                    <div class="mb-3 col-sm-3">
                      <label for="vanno" class="form-label">Annio</label>
                      <input type="text" class="form-control" id="vanno" name="vanno" required>
                    </div>
                    <div class="mb-3 col-sm-3">
                      <label for="vcost" class="form-label">Costo Por Dia</label>
                      <input type="text" class="form-control" id="vcost" name="vcost" required>
                    </div>
                    <div class="mt-3 mb-3 col-sm-6">
                      <div class="form-floating">
                        <select class="form-select" id="vstatus"  aria-label="Default select example" required>
                          <!-- ======= Carga a Traves de Ajax ======= --> 
                        </select>
                        <label for="vstatus">Selecione un Estado</label>
                      </div>
                    </div>
                    <div class="mb-3">
                        <label for="carimg" class="form-label">Soporte de Pago</label>
                        <input type="file" class="form-control" id="carimg" accept="image/x-png,image/gif,image/jpeg" multiple required>
                    </div>
                    <div id="messegev" class="alert" role="alert">
                      <p id="errorv" class="mb-0"></p>
                    </div>                                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" class="btn btn-outline-primary">Registar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>