<div  style="width:20%;margin-top:5%">
    
                <div class="card-body">
                    <?php  if(isset($_SESSION["solicitudes"]))
                        {
                         echo '<table border=1 class="table" ><tr class="table-primary">';
                         if(count($_SESSION["solicitudes"])!= 0)
                          {
                         foreach ($_SESSION["solicitudes"][0] as $titulo => $valor)
                        {
                            echo '<th>'.$titulo.'</th>';
                         }   
                         echo '</tr>';
                        for ($a=0;$a<count($_SESSION["solicitudes"]);$a++) 
                            {
                                echo"<tr class='table-info'>";
                                
                                echo"<td>".$_SESSION["solicitudes"][$a]['ID']."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["Nif"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["Nombre"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["Apellido1"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["Apellido2"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["Telefonomovil"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["Telefonofijo"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["Email"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["Departamento"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["Usuario"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["UsuarioLogin"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"][$a]["Aceptado"]."</td>";
                                if($_SESSION["logged"]['Usuario']=='Administrador')
                                {
                                     echo '<td>' . '<a href="index.php?accion=getmodificar&ID='.$_SESSION["solicitudes"][$a]['ID'].'">Editar </a>'   . '</td>' ;
                                }
                                echo"</tr>";
                             }
                        echo "</table>";
                    }else
                    {}
                    }?>
                </div>
    
       </div>
       
    </body>
    </html>