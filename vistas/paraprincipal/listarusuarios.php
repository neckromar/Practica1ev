
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
                                
                                echo"<td>".$_SESSION["listado"][$a]['ID']."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Nif"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Nombre"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Apellido1"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Apellido2"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Telefonomovil"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Telefonofijo"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Email"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Departamento"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Paginaweb"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Direccionblog"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Cuentatwitter"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Usuario"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["FechaRegistro"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["UsuarioLogin"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Foto"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["Aceptado"]."</td>";
                                echo '<td>' . '<a href="index.php?accion=modificar?id=' . $_SESSION["listado"][$a]['ID']. '">Editar </a>'   . '</td>' ; 
                               
                                echo"</tr>";
                             }
                        echo "</table>";
                    } ?>
                </div>
    
       </div>
       
    </body>
    </html>