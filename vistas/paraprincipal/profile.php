<!DOCTYPE html>
<html>
    <title><?= $parametros["tituloventana"] ?></title>
  <head>
        
    
  </head>
  
  <body >
      
    <div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
      
      <a class="navbar-brand" href="#">LOGO</a>
      
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav">
            
          <li class="nav-item dropdown">
              
                <a class="nav-link " href="#" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> Listas Usuarios </a>
        
          </li>
          
          <li class="nav-item">
                <a class="nav-link" href="#" title="Cart"><i class="fas fa-cart-plus"></i> Cart</a>
          </li>
          
          
          <li class="nav-item">
                <a class="nav-link" href="#" title="Comment"><i class="fas fa-comment"></i> Comment </a>
          </li>
          
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
              
              <a class="nav-link" href="index.php?accion=vistaaceptadoprofile"><i class="fas fa-user"></i> 
            <?php  if(isset($_SESSION["logged"])){
            echo '  '.$_SESSION["logged"]["usuariologin"];}?>
            </a>
              
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-key"></i> Logout</a>
          </li>
        </ul>
      </div>
      </div>
      
      
    </nav>
   
  
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  
  
      <div class="container" style="width:20%;margin-top:5%">
    
                <div class="card-body">
                    <?php  if(isset($_SESSION["logged"])){
                         echo '<h3 class="card-title"> BIENVENIDO !!<br> '. $_SESSION["logged"]["nombre"].' '.$_SESSION["logged"]["apellido1"].'  '.$_SESSION["logged"]["apellido2"].'</h3>';
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