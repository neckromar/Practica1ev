<!DOCTYPE html>
<html>
    <title><?= $parametros["tituloventana"] ?></title>
  <head>
      
    <?php require_once 'includes/head.php'; ?>
    
  </head>
  
  <body  >
      

      <div class="container">
    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="login-box well">
                    <form action="#">
                        <img  class="alineadoTextoImagen" src="images//login.png"   />
                         <br><br>
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input value='' id="User" placeholder="Usuario" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" value=''  placeholder="Password" type="password" class="form-control" />
                        </div>
                        <div class="input-group">
                          <div class="checkbox">
                            <label>
                              <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-default btn-login-submit btn-block m-t-md" value="Login" />
                        </div>
                        <span class='text-center'><a href="index.php?accion=contraseñaolvidada"> Contraseña Olvidada?</a></span>
                        <div class="form-group">
                            <p class="text-center m-t-xs text-sm">No tienes cuenta?</p> 
                            <a  href="index.php?accion=registrarse"> Registro </a>
                        </div>
                    </form>
                
            </div>
        </div>
        <div class='col-md-3'></div>
    </div>
</div>
  </body>
</html>
