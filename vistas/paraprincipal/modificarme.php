 <script src='https://www.google.com/recaptcha/api.js'></script>
  <div class="container" style="margin-top: 5%">
    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="login-box well">
                
                <form action="index.php?accion=actualizarperfil" role="form" method="POST" enctype="multipart/form-data">
                     
                    
                         <br><br>
                        
                         <div class="form-group" class="form-group required">
                            <label for="id" >ID</label>
                            <input name='id'  type="text" class="form-control"  value="<?php  if(isset($_SESSION['modificarme'])){ echo $_SESSION['modificarme']['ID'];} ?>" readonly='readonly' />
                            
                        </div>
                        <div class="form-group" class="form-group required">
                            <img src="images//identity.png" /> <label for="nif" >NIF*</label>
                            <input name='nif'  type="text" class="form-control"  value="<?php  if(isset($_SESSION['modificarme'])){ echo $_SESSION['modificarme']['Nif'];} ?>" />
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nif'):"" ?></span>
                        </div>
                          
                        <div class="form-group">
                            <img src="images//student.png" /><label for="nombre">Nombre*</label>
                            <input name="nombre"   type="text" class="form-control" value="<?php if(isset($_SESSION['modificarme'])){ echo ''.$_SESSION['modificarme']['Nombre'];} ?>" />
                          <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'):"" ?></span>
                          </div>
                        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password'):"" ?>
                         
                        <div class="form-group">
                            <img src="images//identification.png" /><label for="APELLIDO1">Apellidos*</label>
                            <input name="apellido1"    type="text" class="form-control" value="<?php if(isset($_SESSION['modificarme'])){ echo ''.$_SESSION['modificarme']['Apellido1'];} ?>" />
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido1'):"" ?></span>
                            <input name="apellido2"    type="text" class="form-control"  value="<?php if(isset($_SESSION['modificarme'])){ echo ''.$_SESSION['modificarme']['Apellido2'];} ?>"/>
                            <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido2'):"" ?></span>
                           
                        </div>
                         
                         
                         <div class="form-group">
                             <img src="images//photo-camera.png" /><input type="hidden"  />
                             <input type="file" name="imagen" />
                             <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'foto'):"" ?></span>
                         </div>
                         
                         
                         
                        <div class="form-group">
                            <img src="images//cellphone.png" /><label for="TELEFONOMOVIL">Telefono Movil*</label>
                            <input name="telefonomovil"    type="number" class="form-control" value="<?php if(isset($_SESSION['modificarme'])){ echo $_SESSION['modificarme']['Telefonomovil'];} ?>"  />
                           <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'telefonomovil'):"" ?></span>
                            <img src="images//phone.png" /><label for="TELEFONOFIJO">Telefono Fijo*</label>
                            <input name="telefonofijo"    type="number" class="form-control" value="<?php if(isset($_SESSION['modificarme'])){ echo $_SESSION['modificarme']['Telefonofijo'];} ?>" />
                           <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'telefonofijo'):"" ?></span>
                        </div>
                          
                         <div class="form-group">
                            <img src="images//mailbox.png" /><label for="email">Email*</label>
                            <input name="email" type="text" class="form-control" value="<?php if(isset($_SESSION['modificarme'])){ echo $_SESSION['modificarme']['Email'];} ?>" />
                             <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email'):"" ?></span>

                        </div>
                         
                        <div class="form-group">
                            <img src="images//conversation.png" /><label for="DEPARTAMENTO">Departamento*</label>
                            <input name="departamento" type="text" class="form-control" value="<?php if(isset($_SESSION['modificarme'])){ echo $_SESSION['modificarme']['Departamento'];} ?>" />
                           <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'departamento'):"" ?></span>

                        </div>
                         
                        <div class="form-group">
                            <img src="images//www.png" /><label for="PAGINAWEB">Página Web</label>
                            <input name="paginaweb"    type="text" class="form-control" value="<?php if(isset($_SESSION['modificarme'])){ echo $_SESSION['modificarme']['Paginaweb'];} ?>" />
                        </div>
                        
                         <div class="form-group">
                            <img src="images//blogging.png" /><label for="DIRECCIONBLOG">Dirección del Blog</label>
                            <input name="direccionblog"   type="text" class="form-control" value="<?php if(isset($_SESSION['modificarme'])){ echo $_SESSION['modificarme']['Direccionblog'];} ?>" />
                        </div>
                         
                         <div class="form-group">
                            <img src="images//twitter.png" /><label for="CUENTATWITTER">Cuenta Twitter</label>
                            <input name="cuentatwitter"   type="text" class="form-control"  value="<?php if(isset($_SESSION['modificarme'])){ echo $_SESSION['modificarme']['Cuentatwitter'];} ?>"/>
                        </div>
                         
                         <div class="form-group">
                            <label for="usuario">Login</label>
                            <input name="usuariologin"   type="text" class="form-control"  value="<?php if(isset($_SESSION['modificarme'])){ echo $_SESSION['modificarme']['UsuarioLogin'];} ?>"/>
                             <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'usuariologin'):"" ?></span>

                        </div>
                          <div class="g-recaptcha" data-sitekey="6Le6vH8UAAAAACuOyDn7ffwt8TEcT4a_oFnaadtc"></div>
                          <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'captcha'):"" ?></span>
                        
                        <div class="form-group">
                             <input type="submit" name="Actualizarme" value="Actualizarme" class="btn btn-info btn-block"/>
                             
                        </div>
                       
                             
                    </form>
               <?php borrarErrores()?>
            </div>
        </div>
        <div class='col-md-3'></div>
    </div>
</div>
  
  </body>
</html>


