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
        <button type="button" id="closeLogin" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formforget">    
                <div class="modal-body">
                  <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Email" required>
                  </div>            
                </div>
                <div class="modal-footer">
                    <button type="button" id="cncLogin" class="btn btn-outline-danger btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
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
  Modal Para Opcion de Olvide Contrase#a
  *************************************************
-->
<div class="modal fade" id="advanceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Busqueda Avanzada, Selecciones los Filtros</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="">
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
        <div id="advancep" class="row" data-aos="fade-up" data-aos-delay="200">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>