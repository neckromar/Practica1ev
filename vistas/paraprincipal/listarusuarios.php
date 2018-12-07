
      <div  style="width:20%;margin-top:5%">
    
                <div class="card-body">
                    <?php  if(isset($_SESSION["listado"])){
                         echo '<table border=1 class="table" ><tr class="table-primary">';
                         
                         foreach ($_SESSION["listado"][0] as $titulo => $valor)
                        {
                            echo '<th>'.$titulo.'</th>';
                         }   
                         echo '</tr>';
                        for ($a=0;$a<count($_SESSION["listado"]);$a++) 
                            {
                                echo"<tr class='table-info'>";
                                
                                echo"<td>".$_SESSION["listado"][$a]['id']."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["nif"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["nombre"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["apellido1"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["apellido2"]."</td>";
                                if($_SESSION["logged"]['usuario']=="Profesor" ||$_SESSION["logged"]['usuario']=="profesor" )
                                {
                                     echo"<td> </td>";
                                }
                                else
                                {
                                    echo"<td>".$_SESSION["listado"][$a]["password"]."</td>";
                                    
                                }
                                echo"<td>".$_SESSION["listado"][$a]["telefonomovil"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["telefonofijo"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["email"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["departamento"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["paginaweb"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["direccionblog"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["cuentatwitter"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["usuario"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["fecharegistro"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["usuariologin"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["foto"]."</td>";
                                
                               
                                echo"</tr>";
                             }
                        echo "</table>";
                    } ?>
                </div>
    
       </div>
       
    </body>
    </html>