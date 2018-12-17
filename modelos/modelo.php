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
  private $db = "bdusuarios";

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

 // hace la consulta para buscar el login del usuario y la contraseña para comprobarlos y si es administrador
  public function validarlogin($usuario,$password)
  {
       $return = [
        "correcto" => FALSE,
        "datos" => NULL,
        "error" => NULL
          ];
       //compruebo si he recibido algo por el post del login
   
         
    //Realizamos la consulta...
    try {  //Definimos la instrucción SQL  
      $sql = "SELECT `ID`,`Usuario`,`Nombre`, `Apellido1`, `Apellido2`,`Email`, `Departamento`,`Foto`,`UsuarioLogin`,`Aceptado` FROM usuarios WHERE `UsuarioLogin`=:usuario AND `Password`=:password ;";
      $query = $this->conexion->prepare($sql);
      $query->execute(['usuario' => $usuario,'password'=>$password]);
        
         
          $fila = $query->fetch(PDO::FETCH_ASSOC);
            
             if($fila['Usuario']=='Administrador' || $fila['Usuario']=='Profesor'  )
                {
                 
                    $resultado=$fila;
                }
            else
                {
                    $resultado=$fila;
                }
                
           
    } catch (PDOException $ex) 
            {
                 $return["error"] = $ex->getMessage();
            }

    
        
      return $resultado;
  }

  public function insertarregistro($nif,$nombre,$apellido1,$apellido2,$password_segura,$telefonomovil,$telefonofijo,$email,$departamento,$paginaweb,$direccionblog,$cuentatwitter,$usuariologin,$foto)
  {
      $return = [
        "correcto" => FALSE,
        "datos" => NULL,
        "error" => NULL
    ];
      
      try {
          
        $sql = "INSERT INTO usuarios (`ID`, `Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Password`, `Telefonomovil`, `Telefonofijo`, `Email`, `Departamento`, `Paginaweb`, `Direccionblog`, `Cuentatwitter`, `Usuario`, `FechaRegistro`, `UsuarioLogin` , `Foto`,`Aceptado`) VALUES (null,:nif,:nombre,:apellido1,:apellido2,:password_segura,:telefonomovil,:telefonofijo,:email,:departamento,:paginaweb,:direccionblog,:cuentatwitter,'profesor',CURRENT_DATE(),:usuariologin ,:foto,0);";
        $query = $this->conexion->prepare($sql);
        $query->execute(['nif' => $nif, 'nombre'=>$nombre, 'apellido1'=>$apellido1 , 'apellido2'=> $apellido2 ,'password_segura'=>$password_segura ,'telefonomovil' => $telefonomovil, 'telefonofijo'=>$telefonofijo,'email'=>$email,'departamento'=>$departamento,'paginaweb'=>$paginaweb ,'direccionblog'=>$direccionblog,'cuentatwitter'=>$cuentatwitter,'usuariologin'=>$usuariologin ,'foto'=>$foto]);

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

  public function listarusuarios($pagina){
    
      try {
        $arraylistado= array();
        $totalporpagina=4;
       $inicio=($pagina > 1)? ($pagina * $totalporpagina - $totalporpagina):0;
       
        
         
        $sql = "SELECT `ID`, `Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Telefonomovil`, `Telefonofijo`, `Email`, `Departamento`,  `Usuario`, `UsuarioLogin`  FROM usuarios WHERE `Aceptado`=1 LIMIT $inicio,$totalporpagina  ";
      
        $query = $this->conexion->prepare($sql);
        $query->execute();
        
        $fila = $query->fetchAll(PDO::FETCH_ASSOC);
        
        
        $sql_saberfilas="SELECT count(*) as total FROM usuarios WHERE `Aceptado`=1";
        $sql_tot = $this->conexion->prepare($sql_saberfilas);
        $sql_tot->execute();
        
        $arraylistado=$sql_tot->fetch(PDO::FETCH_ASSOC);
        
       $arraylistado['fila']=$fila;
        
      
        
         if($query)
            {
                 
               $resultado= $arraylistado;
            }
         else
            {
                $resultado='';
            }
      } catch (PDOException $ex) {
        $resultado = $ex->getMessage();
        //die();
      }
    

    return $resultado;
  }
  public function solicitudesusuarios($pagina) {
    
      try {
           $arraylistado= array();
           $totalporpagina=4;
           $inicio=($pagina > 1)? ($pagina * $totalporpagina - $totalporpagina):0;
          
        $sql = "SELECT `ID`, `Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Telefonomovil`, `Telefonofijo`, `Email`, `Departamento`,  `Usuario`, `UsuarioLogin`, `Aceptado`  FROM usuarios WHERE `Aceptado`=0 LIMIT $inicio,$totalporpagina";
         $query = $this->conexion->prepare($sql);
        $query->execute();
        //Supervisamos que la consulta se realizó correctamente... 
        $fila = $query->fetchAll(PDO::FETCH_ASSOC);
        
        
         $sql_saberfilas="SELECT count(*) as total FROM usuarios WHERE `Aceptado`=0";
        $sql_tot = $this->conexion->prepare($sql_saberfilas);
        $sql_tot->execute();
        
        $arraylistado=$sql_tot->fetch(PDO::FETCH_ASSOC);
         
        
       
        
        $arraylistado['fila']=$fila;
         
             if($query)
                {
                 
                    $resultado= $arraylistado;
                }
            else
                {
                    $resultado='';
                }
      } catch (PDOException $ex) {
        $resultado = $ex->getMessage();
        //die();
      }
    

    return $resultado;
  }

public function recogertodosloscorreos()
{
    try {
        $sql = "SELECT `Nombre`, `Apellido1`, `Apellido2`, `Email`, `Aceptado`  FROM usuarios";
        $query = $this->conexion->query($sql);
        
        //Supervisamos que la consulta se realizó correctamente... 
        $fila = $query->fetchAll(PDO::FETCH_ASSOC);
             if($query)
                {
                 
                    $resultado=$fila;
                }
            else
                {
                    $resultado='';
                }
      } catch (PDOException $ex) {
        $resultado = $ex->getMessage();
        //die();
      }
    

    return $resultado;
}

public function modificarlistarusuario($id,$nif, $nombre, $apellido1, $apellido2,  $telefonomovil, $telefonofijo,  $departamento, $paginaweb, $direccionblog, $cuentatwitter,$usuario,$activado){
      try {
        $sql = "UPDATE usuarios SET `Nif`=:nif,`Nombre`=:nombre,`Apellido1`=:apellido1,`Apellido2`=:apellido2,`Telefonomovil`=:telefonomovil,`Telefonofijo`=:telefonofijo,`Departamento`=:departamento,`Paginaweb`=:paginaweb,`Direccionblog`=:direccionblog,`Cuentatwitter`=:cuentatwitter,`Usuario`=:usuario,`Aceptado`=:activado WHERE `ID`=:id";
        $query = $this->conexion->prepare($sql);
        $query->execute(['id'=>$id,'nif' => $nif, 'nombre'=>$nombre, 'apellido1'=>$apellido1 , 'apellido2'=> $apellido2 ,'telefonomovil' => $telefonomovil, 'telefonofijo'=>$telefonofijo,'departamento'=>$departamento,'paginaweb'=>$paginaweb ,'direccionblog'=>$direccionblog,'cuentatwitter'=>$cuentatwitter,'usuario'=>$usuario ,'activado'=>$activado]);

        //Supervisamos que la consulta se realizó correctamente... 
        
             if($query)
                {
                  
                    $resultado=true;
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

public function modificarusuario($id){
    
       
       //compruebo si he recibido algo por el post del login
      try {
       $sql = "SELECT `ID`,`Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Telefonomovil`, `Telefonofijo`,  `Departamento`, `Paginaweb`, `Direccionblog`, `Cuentatwitter`, `Usuario`,  `Foto`,`Aceptado` FROM usuarios WHERE `ID`= :id ";
        $query = $this->conexion->prepare($sql);
        $query->execute(['id'=>$id]);
        
         $fila = $query->fetch(PDO::FETCH_ASSOC);
        //Supervisamos que la consulta se realizó correctamente... 
        
             if($query)
                {
                    $resultado=$fila;
                }
            else
                {
                    $resultado='';
                }
      } catch (PDOException $ex) {
        $resultado = $ex->getMessage();
        //die();
      }
    

    return $resultado;
  }
  
  //hacer modificar el perfil
  public function listarperfil($id){
    
       
       //compruebo si he recibido algo por el post del login
      try {
       $sql = "SELECT `ID`,`Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Telefonomovil`, `Telefonofijo`, `Email`, `Departamento`, `Paginaweb`, `Direccionblog`, `Cuentatwitter`, `UsuarioLogin`,  `Foto` FROM usuarios WHERE `ID`= :id ";
        $query = $this->conexion->prepare($sql);
        $query->execute(['id'=>$id]);
        
         $fila = $query->fetch(PDO::FETCH_ASSOC);
        //Supervisamos que la consulta se realizó correctamente... 
        
             if($query)
                {
                    $resultado=$fila;
                }
            else
                {
                    $resultado='';
                }
      } catch (PDOException $ex) {
        $resultado = $ex->getMessage();
        //die();
      }
    

    return $resultado;
  }
  public function modificarperfilpropio($id,$nif, $nombre, $apellido1, $apellido2, $password, $telefonomovil, $telefonofijo, $email, $departamento, $paginaweb, $direccionblog, $cuentatwitter,$usuariologin,$foto){
      try {
        $sql = "UPDATE usuarios SET `Nif`=:nif,`Nombre`=:nombre,`Apellido1`=:apellido1,`Apellido2`=:apellido2,`Password`=:password,`Telefonomovil`=:telefonomovil,`Telefonofijo`=:telefonofijo,`Email`=:email,`Departamento`=:departamento,`Paginaweb`=:paginaweb,`Direccionblog`=:direccionblog,`Cuentatwitter`=:cuentatwitter,`UsuarioLogin`=:usuariologin,`Foto`=:foto WHERE `ID`=:id";
        $query = $this->conexion->prepare($sql);
        $query->execute(['id'=>$id,'nif' => $nif, 'nombre'=>$nombre, 'apellido1'=>$apellido1 , 'apellido2'=> $apellido2 ,'password'=>$password,'telefonomovil' =>$telefonomovil, 'telefonofijo'=>$telefonofijo,'email'=>$email, 'departamento'=>$departamento,'paginaweb'=>$paginaweb ,'direccionblog'=>$direccionblog,'cuentatwitter'=>$cuentatwitter,'usuariologin'=>$usuariologin ,'foto'=>$foto]);

        //Supervisamos que la consulta se realizó correctamente... 
        if($query)
        {
            $resultado=true;
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
  
  public function listados_pdf($tipo) {
    try {
		if($tipo == "1")
		{
			$sql = "SELECT * FROM usuarios WHERE Aceptado = 1";
		}
		else
		{
			$sql = "SELECT * FROM usuarios WHERE Aceptado = 0";
		}
		$query = $this->conexion->query($sql);
		
      //Supervisamos si la consulta se hizo correctamente
      if (isset($query))
      {
        $listado = $query->fetchAll(PDO::FETCH_ASSOC);
		$contenido = "";
		if($tipo == "aceptado") :
			$contenido .= '<h1>Listado de usuarios activos</h1><br>';
		else :
			$contenido .= '<h1>Listado de usuarios inactivos</h1><br>';
		endif;
		$contenido .= '<table cellspacing="1" border="1">';
		$contenido .= '<tr>
			<th>NIF</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Móvil</th>
			<th>Tipo de Usuario</th>
			<th>UsuarioLogin</th>
			<th>Departamento</th>
			<th>Email</th>
		</tr>';
		foreach($listado as $u)
		{
			$contenido .= '<tr>
			<td>'.$u["Nif"].'</td>
			<td>'.$u["Nombre"].'</td>
			<td>'.$u["Apellido1"].' '. $u["Apellido2"].'</td>
			<td>'.$u["Telefonomovil"] . '</td>
			<td>'.$u["Usuario"].'</td>
			<td>'.$u["UsuarioLogin"].'</td>
			<td>'.$u["Departamento"].'</td>
			<td>'.$u["Email"].'</td>
			</tr>';
		}
		$contenido .= '</table>';
      }
      else
          $contenido = false;
    } catch (PDOException $ex) {
      $contenido = $ex->getMessage();
    }

    return $contenido;
  }
  
}
