<!DOCTYPE html>
<html>
    <title><?= $parametros["tituloventana"] ?></title>
  <head>
      
  </head>
  
  <body  >
      

      <div class="container">
    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="login-box well">
                <form action="index.php?accion=loginaceptado" method="POST" enctype="multipart/form-data">
                        <img  class="alineadoTextoImagen" src="images//login.png"   />
                         <br><br>
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input  name="usuario" placeholder="Usuario" type="text" class="form-control" />
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'usuario'):"" ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="passwordlogin"   placeholder="Password" type="password" class="form-control" />
                            <span ><?php  echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'], 'password'):"" ?></span>
                        </div>
                        <div class="input-group">
                          <div class="checkbox">
                            <label>
                              <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-default btn-login-submit btn-block m-t-md" name="acceder" value="Login" />
                             
                        </div>
                        <span class='text-center'><a href="index.php?accion=contraseñaolvidada"> Contraseña Olvidada?</a></span>
                        <div class="form-group">
                            <p class="text-center m-t-xs text-sm">No tienes cuenta?</p> 
                            <a  href="index.php?accion=registrarse"> Registro </a>
                        </div>
                    </form>
                 <span ><?php  echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'],'noaceptado'):"" ?></span>
                 <span ><?php  echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'],'registradoexito',true):"" ?></span>
                <?php borrarErrores() ?>
            </div>
        </div>
        <div class='col-md-3'></div>
    </div>
</div>
  </body>
</html>
