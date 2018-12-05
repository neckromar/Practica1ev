<?php
session_start();
/**
 *   Clase 'modelo' que implementa el modelo de nuestra aplicación en una
 * arquitectura MVC. Se encarga de gestionar el acceso a la base de datos
 * en una capa especializada
 */
class modelo {

  //Atributo que contendrá la referencia a la base de datos 
  private $conexion;
  // Parámetros de conexión a la base de datos 
  private $host = "localhost";
  private $user = "root";
  private $pass = "";
  private $db = "dbusuarios";

  /**
   * Constructor de la clase que ejecutará directamente el método 'conectar()'
   */
  public function __construct() {
    $this->conectar();
  }

  /**
   * Método que realiza la conexión a la base de datos de usuarios mediante PDO.
   * Devuelve TRUE si se realizó correctamente y FALSE en caso contrario.
   * @return boolean
   */
  public function conectar() {
    try {
      $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
      $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return TRUE;
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }

  /**
   * Función que nos permite conocer si estamos conectados o no a la base de datos.
   * Devuelve TRUE si se realizó correctamente y FALSE en caso contrario.
   * @return boolean
   */
  public function estaConectado() {
    if ($this->conexion) :
      return TRUE;
    else :
      return FALSE;
    endif;
  }

  /**
   * Función que realiza el listado de todos los usuarios registrados
   * Devuelve un array asociativo con tres campos:
   * -'correcto': indica si el listado se realizó correctamente o no.
   * -'datos': almacena todos los datos obtenidos de la consulta.
   * -'error': almacena el mensaje asociado a una situación errónea (excepción) 
   * @return type
   */
  public function validar()
  {
      
 
 if(isset($_POST['Registrarse']))
    {
     
     $directorioSubida = "../fotos";
         $max_file_size = "51200";
         $extensionesValidas = array("jpg", "png", "gif");
         
        //array errores
              $errores=array();
          
          
        $nif=$_POST['nif'] ;
        $nombre= $_POST['nombre'] ;
        $apellido1= $_POST['apellido1'] ;
        $apellido2= $_POST['apellido2'] ;
        $email= $_POST['email'] ;
        $password= $_POST['password'] ;
        $telefonomovil=$_POST['telefonomovil'] ;
        $telefonofijo=$_POST['telefonofijo'] ;
        $departamento=$_POST['departamento'] ;
        $paginaweb=$_POST['paginaweb'] ;
        $direccionblog=$_POST['direccionblog'] ;
        $cuentatwitter=$_POST['cuentatwitter'] ;
        
       
        //validar nif
       
          if(!empty($nif) &&  preg_match('/^[0-9]{8}[A-Z]{1}$/', $nif))
            {
                $nif_valido= true;
             }
            else
            {
              $nif_valido= false;
             $errores['nif']= '<div class="alert alert-danger">El nif no es valido'. $nif.'</div>';
             }
             
          
        
        //validar nombre
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre))
        {
           $nombre_valido= true;
        }
        else
        {
            $nombre_valido= false;
            $errores['nombre']= "<div class='alert alert-danger'>El nombre no es valido".$nombre."</div>";
        }
        
        //validar apellido1
        if(!empty($apellido1) && !is_numeric($apellido1) && !preg_match("/[0-9]/", $apellido1))
        {
           $apellido1_valido= true;
        }
        else
        {
            $apellido1_valido= false;
            $errores['apellido1']= '<div class="alert alert-danger">El primer apellido esta mal</div>';
        }
        //validar apellido2
        if(!empty($apellido2) && !is_numeric($apellido2) && !preg_match("/[0-9]/", $apellido2))
        {
           $apellido2_valido= true;
        }
        else
        {
            $apellido2_valido= false;
            $errores['apellido2']= '<div class="alert alert-danger">El segundo apellido  no es valido</div>';
        }
        
        //validar email
        if(!empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL) ) 
        {
            $errores['email']= '<div class="alert alert-danger">El email no es valido'.$email.'</div>';
           $email_valido= true;
        }
        else
        {
            $email_valido= false;
            
        }
        
        //valdiar contraseña
        if(!empty($password) && !strlen($password)<8 && preg_match("/[a-zA-Z ]/", $password) && preg_match("/[0-9]/", $password) && preg_match("/[@#-_%&^+=!?.,<>]/", $password) )
        {
           $password_valido= true;
        }
        else
        {
            $password_valido= false;
            $errores['password']= '<div class="alert alert-danger">La contraseña no es valida</div>';
        }
        
        //validar telefono movil
        if(!empty($telefonomovil) && preg_match('/^[6|7][0-9]{8}$/', $telefonomovil))
        {
           $telefonomovil_valido= true;
        }
        else
        {
            $telefonomovil_valido= false;
            $errores['telefonomovil']= '<div class="alert alert-danger">El telefono movil no es valido</div>';
        }
        
        //validar telefono fijo
        if(!empty($telefonomovil) && preg_match('/^[9][0-9]{8}$/', $telefonofijo))
        {
           $telefonofijo_valido= true;
        }
        else
        {
            $telefonofijo_valido= false;
            $errores['telefonofijo']= '<div class="alert alert-danger">El telefono fijo no es valido</div>';
        }
        
        //validar departamento
        if(!empty($departamento) && !is_numeric($departamento) && !preg_match("/[0-9]/", $departamento))
        {
           $departamento_valido= true;
        }
        else
        {
            $departamento_valido= false;
            $errores['departamento']= '<div class="alert alert-danger">El departamento no es valido</div>';
        }
        
        
        
        /*  
        $erroresfoto=array();
            $nombreArchivo = $_FILES['imagen']['name'];
            $filesize = $_FILES['imagen']['size'];
            $directorioTemp = $_FILES['imagen']['tmp_name'];
            $tipoArchivo = $_FILES['imagen']['type'];
            $arrayArchivo = pathinfo($nombreArchivo);
          $extension = $arrayArchivo['extension'];
            // Comprobamos la extensión del archivo
            if(!in_array($extension, $extensionesValidas)){
                $erroresfoto[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
            }
            // Comprobamos el tamaño del archivo
            if($filesize > $max_file_size){
                $erroresfoto[] = "La imagen debe de tener un tamaño inferior a 50 kb";
            }
            // Comprobamos y renombramos el nombre del archivo
            $nombreArchivo = $arrayArchivo['filename'];
            $nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
            $nombreArchivo = $nombreArchivo . rand(1, 100);
            // Desplazamos el archivo si no hay errores
            if(empty($erroresfoto)){
                $nombreCompleto = $directorioSubida.$nombreArchivo.".".$extension;
                move_uploaded_file($directorioTemp, $nombreCompleto);
                print "El archivo se ha subido correctamente";
            }
        */
        
        $guardar_usuario=false;
        if(count($errores)==0)
        {
            $guardar_usuario=true;
             
           
            
           /*
            
            if($guardar)
            {
                $_SESSION['completado']="El registro se ha completado";
            }
            else {
                $_SESSION['errores']['general']="Fallo al guardar el usuario";
            }
    
           */
        }
        else
        {
           
            $_SESSION['errores']=$errores;
            
              header("Location:".$_SERVER['HTTP_REFERER']); 
        }
   
       
    }
    
    return $guardar_usuario;
  }
  public function listado() {
    $return = [
        "correcto" => FALSE,
        "datos" => NULL,
        "error" => NULL
    ];
    //Realizamos la consulta...
    try {  //Definimos la instrucción SQL  
      $sql = "SELECT * FROM usuarios";
      // Hacemos directamente la consulta al no tener parámetros
      $resultsquery = $this->conexion->query($sql);
      //Supervisamos si la inserción se realizó correctamente... 
      if ($resultsquery) :
        $return["correcto"] = TRUE;
        $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
      endif; // o no :(
    } catch (PDOException $ex) {
      $return["error"] = $ex->getMessage();
    }

    return $return;
  }

  public function insertarregistro($nif,$nombre,$apellido1,$apellido2,$password_segura,$telefonomovil,$telefonofijo,$email,$departamento,$paginaweb,$direccionblog,$cuentatwitter)
  {
      $return = [
        "correcto" => FALSE,
        "datos" => NULL,
        "error" => NULL
    ];
      
      try {
          
        $sql = "INSERT INTO usuarios (`id`, `nif`, `nombre`, `apellido1`, `apellido2`, `password`, `telefonomovil`, `telefonofijo`, `email`, `departamento`, `paginaweb`, `direccionnlog`, `cuentatwitter`, `usuario`, `fecharegistro`) VALUES (null,:nif,:nombre,:apellido1,:apellido2,:password_segura,:telefonomovil,:telefonofijo,:email,:departamento,:paginaweb,:direccionnlog,:cuentatwitter,'profesor',CURRENT_DATE());";
        $query = $this->conexion->prepare($sql);
        $query->execute(['nif' => $nif, 'nombre'=>$nombre, 'apellido1'=>$apellido1 , 'apellido2'=> $apellido2 ,'password_segura'=>$password_segura ,'telefonomovil' => $telefonomovil, 'telefonofijo'=>$telefonofijo,'email'=>$email,'departamento'=>$departamento,'paginaweb'=>$paginaweb ,'direccionnlog'=>$direccionblog,'cuentatwitter'=>$cuentatwitter]);

        //Supervisamos que la consulta se realizó correctamente... 
        if ($query) {

          $resultado= true;
        }
        else
        {
            $resultado=false;
            
        }
         
      } catch (PDOException $ex) {
        $resultado = $ex->getMessage();
        //die();
      }
      return $resultado;
  }

  public function activado($nombre) {
    $return = [
        "correcto" => FALSE,
        "datos" => NULL,
        "error" => NULL
    ];

    if ($id && is_numeric($id)) {
      try {
        $sql = "SELECT * FROM usuarios WHERE nombre=:nombre ";
        $query = $this->conexion->prepare($sql);
        $query->execute(['id' => $id]);
        //Supervisamos que la consulta se realizó correctamente... 
        if ($query) {
          $return["correcto"] = TRUE;
          $return["datos"] = $query->fetch(PDO::FETCH_ASSOC);
        }// o no :(
      } catch (PDOException $ex) {
        $return["error"] = $ex->getMessage();
        //die();
      }
    }

    return $return;
  }

}
