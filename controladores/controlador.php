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
    //Mostramos la página de inicio 
    include_once 'vistas/inicio.php';
  }
  
  public function registrarse() {
    $parametros = [
        "tituloventana" => "Registro"
    ];
    //Mostramos la página de inicio 
    include_once 'vistas/registrarse.php';
  }
   public function vistaaceptado() {
      $parametros = [
        "tituloventana" => "Bienvenido"
    ];
  
  
    include_once 'vistas/vistaaceptado.php';
  }
  
 
  
  
 public function loginaceptado() {
  
    $usuario_valido=$this->modelo->validarlogininsertado();
    if($usuario_valido==true)
     { 
            $usuario=$_POST['usuario'];
            $password=sha1($_POST['passwordlogin']);
            $resultado= $this->modelo->validarlogin($usuario,$password);
          
             if($resultado == true)
                {
                     $this->vistaaceptado();
                }
                else
                {
                    $this->index();
                }
            
     }
     else
        {
         var_dump("No se ha podido conectar");
            $this->index();
        }
    
  }
  
  
  public function registro()
  {
     $guardar_usuario= $this->modelo->validar();
     
     if($guardar_usuario==true)
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
        
         $resultado= $this->modelo->insertarregistro($nif, $nombre, $apellido1, $apellido2, $password, $telefonomovil, $telefonofijo, $email, $departamento, $paginaweb, $direccionblog, $cuentatwitter,$usuariologin);
            
        if($resultado == true)
        {
           
            $this->index();
            var_dump('Felicidades');
        }
        else
        {
            $this->registrarse();
            var_dump('Algo ha fallado');
        }
        
     }
     
  }
}