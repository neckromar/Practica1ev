<?php include ("vistas/includes/class.phpmailer.php"); //Necesita estos dos archivos para furrular 
include ("vistas/includes/class.smtp.php");      // este en concreto es por si queremos utilizar un server smtp para sendMail no hace falta. 
?>
    <div class="container">
    <div class="main">
    <form  class="form-horizontal"  method="POST">
        <label>Selecciona los correos a enviar:</label>
        <?php 
         if(isset($_SESSION["todosloscorreos"]))
         {
             echo '<table border=1 class="table" ><tr>';
             echo '<th> </th>';
             foreach ($_SESSION["todosloscorreos"][0] as $titulo => $valor)
              {
                 echo '<th>'.$titulo.'</th>';
              }   
              
              for ($a=0;$a<count($_SESSION["todosloscorreos"]);$a++) 
                  {
                     echo"<tr class='table-info'>";
                    echo'<td><input type="checkbox" name="check_list[]" value="'.$_SESSION["todosloscorreos"][$a]['Email'].'"></td>';
                    echo"<td>".$_SESSION["todosloscorreos"][$a]['Nombre']."</td>";
                    echo"<td>".$_SESSION["todosloscorreos"][$a]['Apellido1']."</td>";
                    echo"<td>".$_SESSION["todosloscorreos"][$a]['Apellido2']."</td>";
                    echo"<td>".$_SESSION["todosloscorreos"][$a]['Email']."</td>";
                    echo"<td>".$_SESSION["todosloscorreos"][$a]['Aceptado']."</td>";
                     
                     echo"</tr>";
                  }
                  
               echo "</table>";
               echo "<div class='form-group' class='form-group' >  <label for='asunto' >Asunto</label>   <input name='asunto' placeholder='Asunto' type='text' class='form-control' />  </div>";
               echo "<div class='form-group' class='form-group' >  <label for='Mensaje' >Mensaje</label>   <textarea class='form-control' rows='8' name='mensaje'></textarea>  </div>";
               
               echo'<input  class="btn btn-info btn-block" type="submit" name="enviarcorreos" Value="Enviar correo"/>';
         }
         
          if(isset($_POST['enviarcorreos']))
           {
            if(!empty($_POST['check_list'])) 
            {
               $header='From:'.$_SESSION["logged"]["Email"];
               $header.='Practica PHP';
               
            // Loop to store and display values of individual checked checkbox.
            foreach($_POST['check_list'] as $selected) 
                {
                     $asunto= filter_input(INPUT_POST, 'asunto');
                     $mensaje= filter_input(INPUT_POST, 'mensaje');
                


                    $mail = new PHPMailer(true); // Declaramos un nuevo correo, el parametro true significa que mostrara excepciones y errores. 
  
                    $mail->IsSMTP(); // Se especifica a la clase que se utilizará SMTP 
  
                    try { 
                            //------------------------------------------------------ 
                            $correo_emisor="neckromar5@gmail.com";     //Correo a utilizar para autenticarse 
                            //con Gmail o en caso de GoogleApps utilizar con @tudominio.com 
                            $nombre_emisor="Raul Hora";               //Nombre de quien envía el correo 
                            $contrasena="retrocederes123";          //contraseña de tu cuenta en Gmail 
                            $correo_destino=$selected;      //Correo de quien recibe 
                            $nombre_destino="";                //Nombre de quien recibe 
                            //-------------------------------------------------------- 
                           
                            $mail->SMTPAuth   = true;                  // Habilita la autenticación SMTP 
                            $mail->SMTPSecure = "ssl";                 // Establece el tipo de seguridad SMTP 
                             $mail->Host       = "smtp.gmail.com";      // Establece Gmail como el servidor SMTP 
                             $mail->Port       = 465;                   // Establece el puerto del servidor SMTP de Gmail 
                            $mail->Username   = $correo_emisor;         // Usuario Gmail 
                            $mail->Password   = $contrasena;           // Contraseña Gmail 
                            //A que dirección se puede responder el correo 
                            $mail->AddReplyTo($correo_emisor, $nombre_emisor); 
                            //La direccion a donde mandamos el correo 
                            $mail->AddAddress($correo_destino, $nombre_destino); 
                            //De parte de quien es el correo 
                            $mail->SetFrom($correo_emisor, $nombre_emisor); 
                            //Asunto del correo 
                            $mail->Subject = $asunto; 
                            //Mensaje alternativo en caso que el destinatario no pueda abrir correos HTML 
                            $mail->AltBody = 'para ver el mensaje necesita un cliente de correo compatible con HTML.'; 
                            //El cuerpo del mensaje, puede ser con etiquetas HTML 
                            $mail->MsgHTML($mensaje); 
                            echo "<div class='alert alert-success'>Se ha enviado exitosamente</div>";
                            //Enviamos el correo 
                             $mail->Send(); 
                            
                            
                        } 
                        catch (Exception $e) 
                        { 
                            
                        }
                }
                
            }
            else
                {
                    echo "<b>Para enviar algún correo primero selecciona alguno.</b>";
                }
           }
        ?>
        
        </form>
    </div>
    </div>
</body>
</html>