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
             <?php  if(isset($_SESSION["logged"]) && $_SESSION["logged"]['Usuario']=='Administrador'){
            
                     echo'<li class="nav-item dropdown">';
                     echo'<a class="nav-link " href="index.php?accion=listarusuarios" id="navbarDropdown"  aria-haspopup="true" aria-expanded="false">';
                     echo'<i class="fas fa-user"></i> Listas Usuarios Activos </a>';
                    echo' </li>';
             }?>
             
           <?php  if(isset($_SESSION["logged"]) && $_SESSION["logged"]['Usuario']=='Administrador'){
            
                  echo'<li class="nav-item dropdown">';
                  echo'<a class="nav-link " href="index.php?accion=solicitudesusuarios" id="navbarDropdown"  aria-haspopup="true" aria-expanded="false">';
                  echo '<i class="fas fa-user"></i> Solicitudes Usuarios </a>';
                  echo'</li>';
               
           }?>
          
          
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
            echo '  '.$_SESSION["logged"]["UsuarioLogin"];}?>
            </a>
              
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?accion=index"><i class="fas fa-key"></i> Logout</a>
          </li>
        </ul>
      </div>
      </div>
      
      
    </nav>
   
  
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
