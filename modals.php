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