<?php

require_once 'modelos/modelo.php';

/**
 * Clase controlador que será la encargada de obtener, para cada tarea, los datos
 * necesarios de la base de datos, y posteriormente, tras su proceso de elaboración,
 * enviarlos a la vista para su visualización
 */
class controlador {

  // El el atributo $modelo es de la 'clase modelo' y será a través del que podremos 
  // acceder a los datos y las operaciones de la base de datos desde el controlador
  private $modelo;
  //$mensajes se utiliza para almacenar los mensajes generados en las tareas, 
  //que serán posteriormente transmitidos a la vista para su visualización
  private $mensajes;

  /**
   * Constructor que crea automáticamente un objeto modelo en el controlador e
   * inicializa los mensajes a vacío
   */
  public function __construct() {
    $this->modelo = new modelo();
    $this->mensajes = [];
  }

  /**
   * Método que envía al usuario a la página de inicio del sitio y le asigna 
   * el título de manera dinámica
   */
  
  public function index() {
    $parametros = [
        "tituloventana" => "Login"
    ];
    $this->includes();
    //Mostramos la página de inicio 
    include_once 'vistas/inicio.php';
  }
  
  public function registrarse() {
    $parametros = [
        "tituloventana" => "Registro"
    ];
    $this->includes();
    //Mostramos la página de inicio 
    include_once 'vistas/registrarse.php';
  }
  
  public function registrarporadmin() {
    $parametros = [
        "tituloventana" => "Registro"
    ];
    $this->includes();
    $this->vistaaceptado();
    //Mostramos la página de inicio 
    include_once 'vistas/paraprincipal/registroporadmin.php';
  }
    
    
    
  // vista principal al ser logueado
   public function vistaaceptado() {
      $parametros = [
        "tituloventana" => "Bienvenido"
    ];
  
  $this->includes();
    include_once 'vistas/vistaprincipal.php';
  }
  
  public function includes() {
     
    include_once 'vistas/includes/head.php';
    require_once 'vistas/includes/helpers.php';
  }
  
  
   public function vistaaceptadoprofile() {
      $parametros = [
        "tituloventana" => "Bienvenido"
    ];
    $this->vistaaceptado();
    $this->includes();
    include_once 'vistas/paraprincipal/profile.php';
  }
  public function vistaaceptadolistar() {
      $parametros = [
        "tituloventana" => "Bienvenido"
    ];
    $this->vistaaceptado();
    $this->includes();
    include_once 'vistas/paraprincipal/listarusuarios.php';
  }
 public function vistamodificar() {
    
     
    $this->vistaaceptado();
    $this->includes();
    include_once 'vistas/paraprincipal/modificaruser.php';
  }
  
  //llama a la vista de solicitudes de usuarios
  public function solicitudes() {
    
     
    $this->vistaaceptado();
    $this->includes();
    include_once 'vistas/paraprincipal/solicitudesusuarios.php';
  }
  
  // la vista para modificarse  a si mismo
  public function modificarmeprofile() {
    
     
    $this->vistaaceptado();
    $this->includes();
    include_once 'vistas/paraprincipal/modificarme.php';
  }
  
  //vista correo
  public function vistaenviocorreos() {
    
     
    $this->vistaaceptado();
    $this->includes();
    include_once 'vistas/paraprincipal/enviocorreos.php';
  }
  
  // funcion para loguearte
 public function loginaceptado() {
     $this->includes();
    $usuario_valido=$this->validarlogininsertado();
    if($usuario_valido==true)
     { 
            $usuario=$_POST['usuario'];
            $password=sha1($_POST['passwordlogin']);
            $resultado= $this->modelo->validarlogin($usuario,$password);
          
             if($resultado['Usuario'] == 'Administrador' || $resultado['Usuario']=='Profesor' || $resultado['Usuario']=='profesor')
                {
                 if($resultado['Aceptado']==1)
                 {
                     
                     $_SESSION["logged"]=$resultado;
                     $this->vistaaceptado();
                 }
                 else
                 {
                     $_SESSION['errores']['noaceptado']='<strong>Cuidado!</strong> No has sido aceptado todavia , espera.';
                     $this->index();
                   
                 }
                }
                else
                {
                    $_SESSION['errores']['noaceptado']='<strong>Cuidado!</strong> Has fallado al conectarte.';
                    $this->index();
                     
                }
            
     }
     else
        {
         $_SESSION['errores']['noaceptado']='<strong>Cuidado!</strong> No te has podido loguear.';
            $this->index();
        }
    
  }
  
  

  // muestra la vista  de listar usuarios positivos pasandole los valores del modelo
  public function listarusuarios()
  {
        
        $pagina= isset($_GET['pagina']) ? (int)$_GET['pagina'] :1;
        $resultado= $this->modelo->listarusuarios($pagina);
         
        $_SESSION["listado"]=$resultado;
        $_SESSION["pagina"]=$pagina;
        $this->vistaaceptadolistar();
        
   }
   
   // muestra la vista  de solicitudes de usuarios  pasandole los valores del modelo
   public function solicitudesusuarios()
  {
        $pagina= isset($_GET['pagina']) ? (int)$_GET['pagina'] :1;
        $resultado= $this->modelo->solicitudesusuarios($pagina);
         
        $_SESSION["solicitudes"]=$resultado;
        $_SESSION["paginasol"]=$pagina;

        $this->solicitudes();
               
        
     }
     
     // la funcion que se encarga de recoger los datos de la consulta con todos los correos y demas y pasarla a la vista del envio de correo
     public function  enviocorreos()
     {
         $resultado= $this->modelo->recogertodosloscorreos();
         $_SESSION["todosloscorreos"]=$resultado;
         $this->vistaenviocorreos();
     }

//funcion que  permite al admin registrar un usuario
     public function registrodeladmin() {
         
      $this->includes();
     $guardar_usuario= $this->validar();
     
     if($guardar_usuario['saber']==true)
     {
         $nif=$_POST['nif'] ;
        $nombre= $_POST['nombre'] ;
        $apellido1= $_POST['apellido1'] ;
        $apellido2= $_POST['apellido2'] ;
        $email= $_POST['email'] ;
        $password= sha1($_POST['password'] );
        $telefonomovil=$_POST['telefonomovil'] ;
        $telefonofijo=$_POST['telefonofijo'] ;
        $departamento=$_POST['departamento'] ;
        $paginaweb=$_POST['paginaweb'] ;
        $direccionblog=$_POST['direccionblog'] ;
        $cuentatwitter=$_POST['cuentatwitter'] ;
        $usuariologin= $_POST['usuariologin'] ;
        $foto=$guardar_usuario['nombrecompleto'];
        
         $resultado= $this->modelo->insertarregistro($nif, $nombre, $apellido1, $apellido2, $password, $telefonomovil, $telefonofijo, $email, $departamento, $paginaweb, $direccionblog, $cuentatwitter,$usuariologin,$foto);
            
        if($resultado == true)
        {
               $_SESSION['errores']['aceptadoregistro']='<strong>FELICIDADES!</strong>Felicidades has registrado al usuario.';
               $this->vistaaceptado();
        }
        else
        {
            $this->vistaaceptado();
            $this->registrarse();
        }
        
     }
     }
     
  // funcion que permite a cualquier usuario registrarse   
  public function registro()
  {
      $this->includes();
     $guardar_usuario= $this->validar();
     
     if($guardar_usuario['saber']==true)
     {
         $nif=$_POST['nif'] ;
        $nombre= $_POST['nombre'] ;
        $apellido1= $_POST['apellido1'] ;
        $apellido2= $_POST['apellido2'] ;
        $email= $_POST['email'] ;
        $password= sha1($_POST['password'] );
        $telefonomovil=$_POST['telefonomovil'] ;
        $telefonofijo=$_POST['telefonofijo'] ;
        $departamento=$_POST['departamento'] ;
        $paginaweb=$_POST['paginaweb'] ;
        $direccionblog=$_POST['direccionblog'] ;
        $cuentatwitter=$_POST['cuentatwitter'] ;
        $usuariologin= $_POST['usuariologin'] ;
        $foto=$guardar_usuario['nombrecompleto'];
        
         $resultado= $this->modelo->insertarregistro($nif, $nombre, $apellido1, $apellido2, $password, $telefonomovil, $telefonofijo, $email, $departamento, $paginaweb, $direccionblog, $cuentatwitter,$usuariologin,$foto);
            
        if($resultado == true)
        {
           
                $_SESSION['errores']['registradoexito']='<strong>FELICIDADES!</strong>Felicidades te has registrado.';
               $this->index();
        }
        else
        {
            $this->registrarse();
        }
        
     }
     
  }
  
  // funcion que permite al admin modificar en la lista de usuarios
  public function modificar()
  {
      $pagina= isset($_GET['pagina']) ? (int)$_GET['pagina'] :1;
      $this->includes();
     $guardar_usuario= $this->validar();
     
     if($guardar_usuario['saber']==true)
     {
     
        $id=$_POST['ID'] ;
        $nif=$_POST['nif'] ;
        $nombre= $_POST['nombre'] ;
        $apellido1= $_POST['apellido1'] ;
        $apellido2= $_POST['apellido2'] ;
        $telefonomovil=$_POST['telefonomovil'] ;
        $telefonofijo=$_POST['telefonofijo'] ;
        $departamento=$_POST['departamento'] ;
        $paginaweb=$_POST['paginaweb'] ;
        $direccionblog=$_POST['direccionblog'] ;
        $cuentatwitter=$_POST['cuentatwitter'] ;
        $usuario= $_POST['usuario'] ;
        $activado=$_POST['activado'];
        
        $resultado= $this->modelo->modificarlistarusuario($id,$nif, $nombre, $apellido1, $apellido2,  $telefonomovil, $telefonofijo,  $departamento, $paginaweb, $direccionblog, $cuentatwitter,$usuario,$activado);
        
        if($resultado==true)
        {
            $this->listarusuarios($pagina);
            $_SESSION['errores']['modificaciones']='<strong>FELICIDADES!</strong>Se ha actualizado correctamente!';
        }
        else
        {
          
            $this->vistaaceptado();
        }
       
      }
  }
     // recoge por parametro get el id del usuario para asi devolver todos sus campos a la hora de modificarlo 
 public function getmodificar()
      {
          
           if(isset($_GET["ID"]) && (is_numeric($_GET['ID'])))
          {
              
              
              $id=$_GET['ID'];
              $resultado= $this->modelo->modificarusuario($id);
              
               $_SESSION['modificar']=$resultado;
               $this->vistamodificar();
               
          }
      }
      
      // recoge por parametro get el id del usuario que se vaya a actualizar a si mismo  para asi devolver todos sus campos a la hora de modificarlo 
      public function modificarmeami()
      {
          
           if(isset($_GET["ID"]) && (is_numeric($_GET['ID'])))
          {
              
              
              $id=$_GET['ID'];
              $resultado= $this->modelo->listarperfil($id);
              
               $_SESSION['modificarme']=$resultado;
               $this->modificarmeprofile();
               
          }
      }
      
      // funcion que sirve solamente para actualizarse a si mismo
      public function actualizarperfil()
  {
      $this->includes();
      $guardar_usuario= $this->validar();
     
     if($guardar_usuario['saber']==true)
     {
         if(isset($_POST['Actualizarme'])){
             
         
        $id=$_POST['id'];
        $nif=$_POST['nif'] ;
        $nombre= $_POST['nombre'] ;
        $apellido1= $_POST['apellido1'] ;
        $apellido2= $_POST['apellido2'] ;
        $password= sha1($_POST['password'] );
        $telefonomovil=$_POST['telefonomovil'] ;
        $telefonofijo=$_POST['telefonofijo'] ;
        $email=$_POST['email'] ;
        $departamento=$_POST['departamento'] ;
        $paginaweb=$_POST['paginaweb'] ;
        $direccionblog=$_POST['direccionblog'] ;
        $cuentatwitter=$_POST['cuentatwitter'] ;
        $usuariologin= $_POST['usuariologin'] ;
        $foto=$guardar_usuario['nombrecompleto'];
         $resultado= $this->modelo->modificarperfilpropio($id,$nif, $nombre, $apellido1, $apellido2,$password,$telefonomovil, $telefonofijo,$email,  $departamento, $paginaweb, $direccionblog, $cuentatwitter,$usuariologin,$foto);
        
        if($resultado==true)
        {
            $_SESSION['errores']['modificaciones']='<strong>FELICIDADES!</strong>Te has actualizado correctamente!';
            $this->vistaaceptadoprofile();
           
        }
        else
        {
            $this->modificarmeprofile();
            
        }
         }
       
          
      }
      }
      
      // funcion para validad los campos necesario
  public function validar()
  {
    if(isset($_POST))
    {
         $directorioSubida = "fotos/";
         $max_file_size = "51200";
         $extensionesValidas = array("jpg", "png", "gif");
         
        //array errores
              $errores=array();
          
          
        $nif=!empty($_POST['nif']) ? $_POST['nif']: false ;
        $nombre= !empty($_POST['nombre']) ? $_POST['nombre']: false ;
        $apellido1= !empty($_POST['apellido1']) ? $_POST['apellido1']: false ;
        $apellido2= !empty($_POST['apellido2']) ? $_POST['apellido2']: false ;
        $email= !empty($_POST['email']) ? $_POST['email']: false ;
        $usuariologin= !empty($_POST['usuariologin']) ? $_POST['usuariologin']: false ;
        $password=  !empty($_POST['password'])? $_POST['password']: false ; 
        $telefonomovil=!empty($_POST['telefonomovil']) ? $_POST['telefonomovil']: false ;
        $telefonofijo=!empty($_POST['telefonofijo']) ? $_POST['telefonofijo']: false ;
        $departamento=!empty($_POST['departamento']) ? $_POST['departamento']: false ;
        $paginaweb=!empty($_POST['paginaweb']) ? $_POST['paginaweb']: false ;
        $direccionblog=!empty($_POST['direccionblog']) ? $_POST['direccionblog']: false ;
        $cuentatwitter=!empty($_POST['cuentatwitter']) ? $_POST['cuentatwitter']: false ;

        if($_GET['accion'] != 'modificar' )
        {
             $captcha=!empty($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] :false ;
        
            $secret='6Le6vH8UAAAAAKyXBPdrKDzzFgueAqHXS31HOWgi';
       
        
            //verifica el captcha
        
             if(!$captcha)
                {
                     $errores['captcha']= 'Verifica el captcha ';
                }
        
                $response= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
        
        
                $arr= json_decode($response,TRUE);
        
                if($arr['success'])
                {}
                else
                {
                     $errores['captcha']= 'Error al comprobar el captcha ';
                }
        
        }
        
        
        //validar nif
       
          if(!empty($nif) &&  preg_match('/^[0-9]{8}[A-Z]{1}$/', $nif))
            {
                $nif_valido= true;
             }
            else
            {
              $nif_valido= false;
             $errores['nif']= 'El nif no es valido';
             }
             
          
        
        //validar nombre
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre))
        {
           $nombre_valido= true;
        }
        else
        {
            $nombre_valido= false;
            $errores['nombre']= "El nombre no es valido";
        }
        
        //validar apellido1
        if(!empty($apellido1) && !is_numeric($apellido1) && !preg_match("/[0-9]/", $apellido1))
        {
           $apellido1_valido= true;
        }
        else
        {
            $apellido1_valido= false;
            $errores['apellido1']= 'El primer apellido esta mal';
        }
        //validar apellido2
        if( !empty($apellido2) && !is_numeric($apellido2) && !preg_match("/[0-9]/", $apellido2))
        {
           $apellido2_valido= true;
        }
        else
        {
            $apellido2_valido= false;
            $errores['apellido2']= 'El segundo apellido  no es valido';
        }
        if($_GET['accion'] != 'modificar')
        {
         if(!empty($password) && !strlen($password)<8 && preg_match("/[a-zA-Z ]/", $password) && preg_match("/[0-9]/", $password) && preg_match("/[@#-_%&^+=!?.,<>]/", $password) )
              {
                 $password_valido= true;
              }
         else
              {
                  $password_valido= false;
                  $errores['password']= 'La contraseña no es valida';
               }
        }
        
        //validar email
        if(!empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL) ) 
        {
            $errores['email']= 'El email no es valido';
           $email_valido= true;
        }
        else
        {
            $email_valido= false;
            
        }
        
        //validar usuariologin
        if($_GET['accion'] != 'modificar')
        {
            if( !empty($usuariologin) && !is_numeric($usuariologin) && !preg_match("/[0-9]/", $usuariologin))
            {
                $usuariologin_valido= true;
            }
            else
            {
                 $usuariologin_valido= false;
                $errores['usuariologin']= "El nombre de usuario para el login no es valido";
            }
        }
        
        //validar telefono movil
        if(!empty($telefonomovil) && preg_match('/^[6|7][0-9]{8}$/', $telefonomovil))
        {
           $telefonomovil_valido= true;
        }
        else
        {
            $telefonomovil_valido= false;
            $errores['telefonomovil']= 'El telefono movil no es valido';
        }
        
        //validar telefono fijo
        if(!empty($telefonofijo) && preg_match('/^[9][0-9]{8}$/', $telefonofijo))
        {
           $telefonofijo_valido= true;
        }
        else
        {
            $telefonofijo_valido= false;
            $errores['telefonofijo']= 'El telefono fijo no es valido';
        }
        
        //validar departamento
        if(!empty($departamento) && !is_numeric($departamento) && !preg_match("/[0-9]/", $departamento))
        {
           $departamento_valido= true;
        }
        else
        {
            $departamento_valido= false;
            $errores['departamento']= 'El departamento no es valido';
        }
        
        
        if($_GET['accion'] != 'modificar' )
        {
            if(empty($_FILES['imagen']['size']))
            {}
            else
                {
            $nombreArchivo = $_FILES['imagen']['name'];
            $filesize = $_FILES['imagen']['size'];
            $directorioTemp = $_FILES['imagen']['tmp_name'];
            $tipoArchivo = $_FILES['imagen']['type'];
            $arrayArchivo = pathinfo($nombreArchivo);
            $extension = $arrayArchivo['extension'];
            // Comprobamos la extensión del archivo
            if(!in_array($extension, $extensionesValidas)){
                $errores['foto'] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
            }
            // Comprobamos el tamaño del archivo
            if($filesize > $max_file_size){
                $erroresfoto['foto'] = "La imagen debe de tener un tamaño inferior a 50 kb";
            }
            // Comprobamos y renombramos el nombre del archivo
            $nombreArchivo = $arrayArchivo['filename'];
            $nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
            $nombreArchivo = time() . "-" .$nombreArchivo;
            
            }
        }
        // se ha cambiado la variable que devuelve el return con varias posiciones, la del true o false como antes
         // y el nombre del archivo para asi pasarlo por el controlador y que lo inserte en la bd
        $guardar_usuario=array();
         $guardar_usuario['saber']=false;
         
        if(count($errores)==0)
        {
            // Desplazamos el archivo si no hay errores y se comprueba si existe la ruta
                     if(!is_dir("fotos"))
                    { 
                         $dir = mkdir("fotos", 0777, true); 
                    }
                        else{ $dir = true; }
                    // Ya verificado que la carpeta uploads existe movemos el fichero seleccionado a dicha carpeta
                if($dir)
                    {
                       if($_GET['accion'] != 'modificar' )
                          {
                           if(empty($_FILES['imagen']['size']))
                             { 
                               $guardar_usuario['nombrecompleto']='fotos/usuario.png';
                               $guardar_usuario['saber']=true; 
                             
                             }
                            else
                               {
                                    // le he añadido la busqueda del directorio el fotos/ para buscarlo directamente al iniciar sesion
                                        $nombreCompleto = "fotos/".$nombreArchivo.".".$extension;
                                    //directorio temporal es en el queesta , se le pasa el directorio de subida y se concatena con el nombre
                                    //completo que es la fecha actual un guion y el nombre mas la extension
                                     $pruebaimagen= move_uploaded_file($directorioTemp,$nombreCompleto );
                           
                                     if($pruebaimagen)
                                         { 
                                                 $guardar_usuario['nombrecompleto']=$nombreCompleto;
                                                $guardar_usuario['saber']=true;
                                    
                                        }
                                      else{
                                                var_dump('ha fallado la subida del archivo');
                                          }
                                           $guardar_usuario['saber']=true; 
                              }      
                           
                          }
                           $guardar_usuario['saber']=true; 
                    }
         }
        else
        {
            
            $_SESSION['errores']=$errores;
             header("Location:".$_SERVER['HTTP_REFERER']); 
              
        }
   
    }
    return $guardar_usuario;
  }
  
  
  // funcion para validar los datos del login
  public function validarlogininsertado()
  {
    
    if(isset($_POST['acceder']))
    {
        //array errores
         $errores=array();
         
         $usuario=$_POST['usuario'];
         $password=$_POST['passwordlogin'];
         
         if(!empty($usuario) && !is_numeric($usuario) && !preg_match("/[0-9]/", $usuario))
        {
           $usuario_valido= true;
        }
        else
        {
            $usuario_valido= false;
            $errores['usuario']= "El usuario no es valido por los valores";
        }
        if(!empty($password) && !strlen($password)<8 && preg_match("/[a-zA-Z ]/", $password) && preg_match("/[0-9]/", $password) && preg_match("/[@#-_%&^+=!?.,<>]/", $password) )
        {
           $password_valido= true;
        }
        else
        {
            $password_valido= false;
            $errores['password']= 'La contraseña no es valida';
        }
        
        $usuario_valido=false;
        if(count($errores)==0)
        {
            $usuario_valido=true;
        }
        else
        {
            $_SESSION['errores']=$errores;
             
        }
        
        
    }
    return $usuario_valido;
  }
  
 
  }
  
  
