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
            </select>
            <label for="region">Selecione un Region</label>
            </div>
          </div>
          <div id="cbrand" class="col-sm-3">
            <div class="form-floating">
              <select id="brand" class="form-select" aria-label="Default select example">
              </select>
              <label for="brand">Selecione una Marca</label>
            </div>
          </div>
          <div id="cmodel" class="col-sm-3">
            <div class="form-floating">
              <select id="model" class="form-select" aria-label="Default select example">
              </select>
              <label for="model">Selecione un Modelo</label>
            </div>
          </div>
          <div id="canno" class="col-sm-3">
            <div class="form-floating">
              <select id="anno" class="form-select" aria-label="Default select example">
              </select>
              <label for="anno">Selecione un Año</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div id="alertma" class="alert" role="alert">
          <div id="messagema" class="row justify-content-sm-center mb-3">
          </div>
        </div>
        <section class="portfolio section-bg">
          <div id="advancep" class="row" data-aos="fade-up" data-aos-delay="200">
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
<div class="modal fade" id="rentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <strong><label for="" class="form-label">Infomacion de Alquiler</label></strong>
                    <div class="mb-3 col-sm-6">
                      <label for="fechar" class="form-label">Fecha Renta</label>
                      <input type="date" class="form-control" id="fechar">
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="fechae" class="form-label">Fecha Entrega</label>
                        <input type="date" class="form-control" id="fechae">
                    </div>
                  </div>
                  <div class="mb-3">
                      <label for="payment" class="form-label">Soporte de Pago</label>
                      <input type="file" class="form-control" id="payment">
                  </div>
                  <div id="messeger2" class="alert alert-warning" role="alert">
                    <p id="errorr2" class="mb-0">Alert Description</p>
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