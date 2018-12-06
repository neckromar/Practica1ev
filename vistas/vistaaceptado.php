<!DOCTYPE html>
<html>
    <title><?= $parametros["tituloventana"] ?></title>
  <head>
      
    <?php require_once 'includes/head.php'; ?>
    
  </head>
  
  <body  >
<div class="card" style="width:400px">
    
  <div class="card-body">
    <?php  if(isset($_SESSION["logged"])){
        echo '<h3 class="card-title"> BIENVENIDO !! '. $_SESSION["logged"]["nombre"].' '.$_SESSION["logged"]["apellido1"].'  '.$_SESSION["logged"]["apellido2"].'</h3>';
        echo '<img class="card-img-top" src="'.$_SESSION["logged"]["foto"] .'"  alt="Card image">';
        echo '<h5 class="card-text">Nombre Usuario : '.$_SESSION["logged"]["usuariologin"].'<h5>';
        echo '<h5 class="card-text">Permisos : '.$_SESSION["logged"]["usuario"].'<h5>';
        echo '<h5 class="card-text">Email : '.$_SESSION["logged"]["email"].'<h5>';
        echo '<h5 class="card-text">Departamento : '.$_SESSION["logged"]["departamento"].'<h5>';
    } ?>
  </div>
</div>
      
       </body>
</html>