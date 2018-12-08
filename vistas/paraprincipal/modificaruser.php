<!DOCTYPE html>
<html>
    <title><?= $parametros["tituloventana"] ?> </title>
  <head>
     
      <?php require_once '../includes/helpers.php'; ?>
      
  </head>
  <body >
  <div class="container">
    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="login-box well">
                
                <form action="modificaruser.php" role="form" method="POST" enctype="multipart/form-data">
                    
                    
                         <br><br>
                        <div class="form-group" class="form-group required">
                            <img src="images//identity.png" /> <label for="nif" >NIF*</label>
                           <input name='nif'  type="text" class="form-control"  value="<?php echo $_SESSION['modificar'][1]; ?>" required/>
                          
                        </div>
                          
                        <div class="form-group">
                            <img src="images//student.png" /><label for="nombre">Nombre*</label>
                            <input name="nombre"   type="text" class="form-control" value="<?php echo $_SESSION['modificar'][2]; ?>" required/>
                          
                          </div>
                        
                         
                        <div class="form-group">
                            <img src="images//identification.png" /><label for="APELLIDO1">Apellidos*</label>
                            <input name="apellido1"    type="text" class="form-control" value="<?php echo $_SESSION['modificar'][3]; ?>" required/>
                            
                            <input name="apellido2"    type="text" class="form-control"  value="<?php echo $_SESSION['modificar'][4]; ?>"/>
                           
                        </div>
                         
                         <div class="form-group">
                             <img src="images//photo-camera.png" /><input type="hidden"  />
                             <input type="text" name="foto" value="<?php echo $_SESSION['modificar'][12]; ?>" />
                             
                         </div>
                         
                         
                        <div class="form-group">
                            <img src="images//cellphone.png" /><label for="TELEFONOMOVIL">Telefono Movil*</label>
                            <input name="telefonomovil"    type="number" class="form-control" value="<?php echo $_SESSION['modificar'][5]; ?>" required />
                           
                            <img src="images//phone.png" /><label for="TELEFONOFIJO">Telefono Fijo*</label>
                            <input name="telefonofijo"    type="number" class="form-control" value="<?php echo $_SESSION['modificar'][6]; ?>" required/>
                           
                        </div>
                         
                        <div class="form-group">
                            <img src="images//conversation.png" /><label for="DEPARTAMENTO">Departamento*</label>
                            <input name="departamento" type="text" class="form-control" value="<?php echo $_SESSION['modificar'][7]; ?>" required/>
                          
                        </div>
                         
                        <div class="form-group">
                            <img src="images//www.png" /><label for="PAGINAWEB">Página Web</label>
                            <input name="paginaweb"    type="text" class="form-control" value="<?php echo $_SESSION['modificar'][8]; ?>" />
                        </div>
                        
                         <div class="form-group">
                            <img src="images//blogging.png" /><label for="DIRECCIONBLOG">Dirección del Blog</label>
                            <input name="direccionblog"   type="text" class="form-control" value="<?php echo $_SESSION['modificar'][9]; ?>" />
                        </div>
                         
                         <div class="form-group">
                            <img src="images//twitter.png" /><label for="CUENTATWITTER">Cuenta Twitter</label>
                            <input name="cuentatwitter"   type="text" class="form-control"  value="<?php echo $_SESSION['modificar'][10]; ?>"/>
                        </div>
                         
                         <div class="form-group">
                            <label for="usuario">Tipo de Usuario</label>
                            <input name="usuario"   type="text" class="form-control"  value="<?php echo $_SESSION['modificar'][11]; ?>"/>
                        </div>
                         
                         <div class="form-group">
                            <label for="activado">Activado?</label>
                            <input name="activado"   type="number" class="form-control"  value="<?php echo $_SESSION['modificar'][13]; ?>"/>
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

