
  
  
      <div class="container" style="width:20%;margin-top:5%">
    
                <div class="card-body">
                    <?php  if(isset($_SESSION["logged"])){
                         echo '<h3 class="card-title"> BIENVENIDO !!<br> '. $_SESSION["logged"]["Nombre"].' '.$_SESSION["logged"]["Apellido1"].'  '.$_SESSION["logged"]["Apellido2"].'</h3>';
                         echo '<br><img class="img-thumbnail " alt="Cinque Terre" src="'.$_SESSION["logged"]["Foto"] .'"  alt="Card image">';
                         echo '<br><h5 class="card-text">Nombre Usuario : '.$_SESSION["logged"]["UsuarioLogin"].'<h5>';
                         echo '<br><h5 class="card-text">Permisos : '.$_SESSION["logged"]["Usuario"].'<h5>';
                         echo '<br><h5 class="card-text">Email : '.$_SESSION["logged"]["Email"].'<h5>';
                         echo '<br><h5 class="card-text">Departamento : '.$_SESSION["logged"]["Departamento"].'<h5>';
                    } ?>
                </div>
          <div class="container">
              
              <?php  echo  '  <a class="btn btn-warning btn-lg" href="index.php?accion=modificarmeami&ID='.$_SESSION["logged"]['ID'].'" role="button">Modificarme</a>';?> 
          </div>
       </div>
 
       </body>
</html>