<!DOCTYPE html>
<html>
    <title><?= $parametros["tituloventana"] ?></title>
  <head>
          <?php require_once 'includes/head.php'; ?>
    
  </head>
  
  <body >
      
        <div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
      <span class="navbar-toggler-icon leftmenutrigger"></span>
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav">
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="elcentro" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Submenu <i class="fas fa-user shortmenu animate"></i>
        </a>
        
      </li>
          <li class="nav-item">
            <a class="nav-link" href="#" title="Cart"><i class="fas fa-cart-plus"></i> Cart <i class="fas fa-cart-plus shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" title="Comment"><i class="fas fa-comment"></i> Comment <i class="fas fa-comment shortmenu animate"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-key"></i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid" id="elcentro">
          
          <div  style="width:20%">
    
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
      
    </div>
  </div>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
      
      
       </body>
</html>