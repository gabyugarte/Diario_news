   

   <!-- Modal Se recomienda poner el Modal por último fuera de las secciones-->
   <div class="modal fade" id="modalCompra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php if(!empty($mensaje)): ?>
              <div class="alert alert-danger" role="alert">
                <p> <?= $mensaje; ?></p>
              </div>
            <?php endif;  ?> 
                <!-- Agregamos el formiulario al Modal. form-group -->
            <form method="POST" action="administrador/login.php">
                <div class="mb-3 row">
                    <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="usuario" name="usuario" >
                      <small id="emailHelp" class="form-text text-muted">Nunca compartas tu nombre de usuario y contraseña</small>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword" name = "contrasenia">
                    </div>
                  </div>
                <div class="modal-footer">
                    <a href="index.php"class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                    <button type="submit" name = "submit" class="btn btn-news">Entrar</button>
                </div>
            </form>

            </div>
           
        </div>
        </div>
    </div>