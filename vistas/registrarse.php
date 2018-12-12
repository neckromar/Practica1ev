<!DOCTYPE html>
<html>
    <title><?= $parametros["tituloventana"] ?> </title>
  <head>
   
      <script src='https://www.google.com/recaptcha/api.js'></script>
      
  </head>
  <body >
  <div class="container">
    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="login-box well">
                
                <form action="index.php?accion=registro" role="form" method="POST" enctype="multipart/form-data">
                    
                    <h3 class="panel-title">Bienvenido Por Favor Registrese </h3>
                         <br><br>
                        <div class="form-group" class="form-group required">
                            <img src="images//identity.png" /> <label for="nif" >NIF*</label>
                           <input name='nif' placeholder="NIF" type="text" class="form-control" required/>
                           <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nif'):"" ?></span>
                        </div>
                          
                        <div class="form-group">
                            <img src="images//student.png" /><label for="nombre">Nombre*</label>
                            <input name="nombre"   placeholder="NOMBRE" type="text" class="form-control" required/>
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'):"" ?></span>
                          </div>
                        
                         
                        <div class="form-group">
                            <img src="images//identification.png" /><label for="APELLIDO1">Apellidos*</label>
                            <input name="apellido1"   placeholder="APELLIDO1" type="text" class="form-control" required/>
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido1'):"" ?></span>
                            <input name="apellido2"   placeholder="APELLIDO2" type="text" class="form-control" />
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido2'):"" ?></span>
                        </div>
                         
                         <div class="form-group">
                             <img src="images//photo-camera.png" /><input type="hidden"  />
                             <input type="file" name="imagen" />
                             <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'foto'):"" ?></span>
                         </div>
                         
                         <div class="form-group">
                            <img src="images//user.png" /><label for="usuario">Nombre Login*</label>
                            <input name="usuariologin"   placeholder="USUARIO LOGIN" type="text" class="form-control" required/>
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'usuariologin'):"" ?></span>
                          </div>
                         
                        <div class="form-group">
                           <img src="images//password.png" /> <label for="PASSWORD">Contraseña*</label>
                            <input name="password"   placeholder="PASSWORD" type="password" class="form-control" required/>
                             <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password'):"" ?></span>
                        </div>
                        
                         
                        <div class="form-group">
                            <img src="images//cellphone.png" /><label for="TELEFONOMOVIL">Telefono Movil*</label>
                            <input name="telefonomovil"   placeholder="TELEFONO MOVIL" type="text" class="form-control" required />
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'telefonomovil'):"" ?></span>
                            <img src="images//phone.png" /><label for="TELEFONOFIJO">Telefono Fijo*</label>
                            <input name="telefonofijo"   placeholder="TELEFONO FIJO" type="text" class="form-control" required/>
                           <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'telefonofijo'):"" ?></span>
                        </div>
                         
                         <div class="form-group">
                            <img src="images//mailbox.png" /><label for="EMAIL">Correo*</label>
                            <input name="email"   placeholder="EMAIL" type="email" class="form-control" required/>
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email'):"" ?></span>
                        </div>
                         
                         
                        <div class="form-group">
                            <img src="images//conversation.png" /><label for="DEPARTAMENTO">Departamento*</label>
                            <input name="departamento"  placeholder="DEPARTAMENTO" type="text" class="form-control" required/>
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'departamento'):"" ?></span>
                        </div>
                         
                        <div class="form-group">
                            <img src="images//www.png" /><label for="PAGINAWEB">Página Web</label>
                            <input name="paginaweb"   placeholder="PAGINAWEB" type="text" class="form-control" />
                        </div>
                        
                         <div class="form-group">
                            <img src="images//blogging.png" /><label for="DIRECCIONBLOG">Dirección del Blog</label>
                            <input name="direccionblog"  placeholder="DIRECCIONBLOG" type="text" class="form-control" />
                        </div>
                         
                         <div class="form-group">
                            <img src="images//twitter.png" /><label for="CUENTATWITTER">Cuenta Twitter</label>
                            <input name="cuentatwitter"  placeholder="CUENTATWITTER" type="text" class="form-control" />
                        </div>
                         
                         
                         <div class="g-recaptcha" data-sitekey="6Le6vH8UAAAAACuOyDn7ffwt8TEcT4a_oFnaadtc"></div>
                          <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'captcha'):"" ?></span>
                         
                        <div class="form-group">
                             <input type="submit" name="Registrarse" value="Registrarse" class="btn btn-info btn-block"/>
                             
                        </div>
                         <p><a  href="index.php?accion=index"> Deseas Volver a la pagina de Inicio?</a></p>
                             
                    </form>
               <?php borrarErrores()?>
            </div>
        </div>
        <div class='col-md-3'></div>
    </div>
</div>
  
  </body>
</html>

