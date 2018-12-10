
  <div class="container" style="margin-top: 5%">
    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="login-box well">
                
                <form action="index.php?accion=modificar" role="form" method="POST" enctype="multipart/form-data">
                     
                    
                         <br><br>
                         <div class="form-group" class="form-group required">
                            <label for="id" >ID*</label>
                           <input name='ID'  type="text" class="form-control"  value="<?php  if(isset($_SESSION['modificar'])){ echo $_SESSION['modificar']['ID'];} ?>" />
                          
                        </div>
                        <div class="form-group" class="form-group required">
                            <img src="images//identity.png" /> <label for="nif" >NIF*</label>
                           <input name='nif'  type="text" class="form-control"  value="<?php  if(isset($_SESSION['modificar'])){ echo $_SESSION['modificar']['Nif'];} ?>" />
                          
                        </div>
                          
                        <div class="form-group">
                            <img src="images//student.png" /><label for="nombre">Nombre*</label>
                            <input name="nombre"   type="text" class="form-control" value="<?php if(isset($_SESSION['modificar'])){ echo ''.$_SESSION['modificar']['Nombre'];} ?>" />
                          
                          </div>
                        
                         
                        <div class="form-group">
                            <img src="images//identification.png" /><label for="APELLIDO1">Apellidos*</label>
                            <input name="apellido1"    type="text" class="form-control" value="<?php if(isset($_SESSION['modificar'])){ echo ''.$_SESSION['modificar']['Apellido1'];} ?>" />
                            
                            <input name="apellido2"    type="text" class="form-control"  value="<?php if(isset($_SESSION['modificar'])){ echo ''.$_SESSION['modificar']['Apellido2'];} ?>"/>
                           
                        </div>
                         
                         <div class="form-group">
                             <img src="images//photo-camera.png" /><input type="hidden"  />
                             <input type="text" name="foto" value="<?php if(isset($_SESSION['modificar'])){ echo ''.$_SESSION['modificar']['Foto'];} ?>" />
                             
                         </div>
                         
                         
                        <div class="form-group">
                            <img src="images//cellphone.png" /><label for="TELEFONOMOVIL">Telefono Movil*</label>
                            <input name="telefonomovil"    type="number" class="form-control" value="<?php if(isset($_SESSION['modificar'])){ echo $_SESSION['modificar']['Telefonomovil'];} ?>"  />
                           
                            <img src="images//phone.png" /><label for="TELEFONOFIJO">Telefono Fijo*</label>
                            <input name="telefonofijo"    type="number" class="form-control" value="<?php if(isset($_SESSION['modificar'])){ echo $_SESSION['modificar']['Telefonofijo'];} ?>" />
                           
                        </div>
                         
                        <div class="form-group">
                            <img src="images//conversation.png" /><label for="DEPARTAMENTO">Departamento*</label>
                            <input name="departamento" type="text" class="form-control" value="<?php if(isset($_SESSION['modificar'])){ echo $_SESSION['modificar']['Departamento'];} ?>" />
                          
                        </div>
                         
                        <div class="form-group">
                            <img src="images//www.png" /><label for="PAGINAWEB">Página Web</label>
                            <input name="paginaweb"    type="text" class="form-control" value="<?php if(isset($_SESSION['modificar'])){ echo $_SESSION['modificar']['Paginaweb'];} ?>" />
                        </div>
                        
                         <div class="form-group">
                            <img src="images//blogging.png" /><label for="DIRECCIONBLOG">Dirección del Blog</label>
                            <input name="direccionblog"   type="text" class="form-control" value="<?php if(isset($_SESSION['modificar'])){ echo $_SESSION['modificar']['Direccionblog'];} ?>" />
                        </div>
                         
                         <div class="form-group">
                            <img src="images//twitter.png" /><label for="CUENTATWITTER">Cuenta Twitter</label>
                            <input name="cuentatwitter"   type="text" class="form-control"  value="<?php if(isset($_SESSION['modificar'])){ echo $_SESSION['modificar']['Cuentatwitter'];} ?>"/>
                        </div>
                         
                         <div class="form-group">
                            <label for="usuario">Tipo de Usuario</label>
                            <input name="usuario"   type="text" class="form-control"  value="<?php if(isset($_SESSION['modificar'])){ echo $_SESSION['modificar']['Usuario'];} ?>"/>
                        </div>
                         
                         <div class="form-group">
                            <label for="activado">Activado?</label>
                            <input name="activado"   type="number" class="form-control"  value="<?php if(isset($_SESSION['modificar'])){ echo $_SESSION['modificar']['Aceptado'];} ?>"/>
                        </div>
                        <div class="form-group">
                             <input type="submit" name="Actualizar" value="Actualizar" class="btn btn-info btn-block"/>
                             
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

