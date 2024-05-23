<?php 
include_once("header.php");
require_once("env.php");
if (!$_SESSION) {
  header("Location: ./");
  die();
}
?> 
<!--<input type="hidden" id="idreq">-->
<div class="container" style="min-width: 540px;height: auto;">
    <section class="section-bg mt-3">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Perfil de Usuario</h2>
        </div>
        <div class="row g-5">
          <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">Solicitudes Pendientes</span>
              <span id="reqc" class="badge bg-primary rounded-pill"></span>
            </h4>
            <ul id="reqv" class="list-group mb-3">
              <!-- ======= Carga a Traves de Ajax ======= -->
            </ul>
          </div>
          <div class="col-md-7 col-lg-8">
            <div class="row">
              <div id="imguser" class="col-sm-3">
                <!-- ======= Carga a Traves de Ajax ======= -->
              </div>
              <div class="col-sm-6">
                <h4 class="mb-3 section-title">Informacion de Usuario</h4>
                <div id="messegep" class="alert" role="alert">
                  <p id="errorp" class="mb-0"></p>
                </div>
              </div>
            </div>
            <form id="formClient">
              <input type="hidden" id="pstatus">
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="pname" class="form-label">Nombre y Apellido</label>
                  <input type="text" class="form-control" id="pname" placeholder="Por Favor Ingrese Su Nombre y Apellido" required>
                </div>
                <div class="col-sm-6">
                  <label for="pdni" class="form-label">Identificacion</label>
                  <div class="row">
                    <div class="col-sm-3">
                      <select id="pdnil" class="form-control">
                        <option value="V">V</option>
                        <option value="E">E</option>
                        <option value="G">G</option>
                        <option value="J">J</option>
                      </select>
                    </div>
                    <div class="col-sm-9">
                      <input  type="text" class="form-control" id="pdnin" name="pdnin" placeholder="Ingrese el Numero" required>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <label for="pemail" class="form-label">Email </label>
                  <input type="email" class="form-control" id="pemail" placeholder="you@example.com" required>
                </div>
                <div class="col-sm-6">
                  <label for="ppassw" class="form-label">Contraseña </label>
                  <input type="text" class="form-control" id="ppassw" placeholder="Ingrese Contrasenna">
                </div>
                <div class="col-sm-6">
                  <label for="pphone" class="form-label">Telefono </label>
                  <input type="number" class="form-control" id="pphone" placeholder="Ingrese Numero de Telefono" required>
                </div>
                <div class="col-sm-12">
                  <label for="paddress" class="form-label">Direccion</label>
                  <input type="text" class="form-control" id="paddress" placeholder="1234 Main St" required>
                </div>
                <div class="col-sm-6">
                  <label for="supportid" class="form-label">Soporte de Indentificacion</label>
                  <input type="file" class="form-control" id="supportid">
                </div>
                <div class="col-sm-6">
                  <label for="imageu" class="form-label">Imagen de Usuario</label>
                  <input type="file" class="form-control" id="imageu">
                </div>
                
                <div id="idsupport" class="col-sm-6">
                  
                  
                </div>
              </div>
              <hr class="my-4">
              <div class="modal-footer">
                <button class="btn btn btn-outline-primary" type="submit">Actualizar</button>
              </div>

              
            </form>
          </div>
        </div> 
      </div>
    </section>
</div>
<script src="assets/js/profile.js"></script>
<?php 
if (URI<>$_SERVER["REQUEST_URI"] ) {
  include_once("footer.php");
}
include_once("modals.php");
include_once("lib.php");
?>

</body>

</html>