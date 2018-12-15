
      <div  style="margin-top:5%">
    
                <div class="card-body">
                    
                    <span ><?php  echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'],'modificaciones',true):"" ?></span>
                    <?php  
                    //Limito la busqueda 
                    

                    //examino la página a mostrar y el inicio del registro a mostrar 
                    
        
                    
                    
                    if(isset($_SESSION["listado"])){
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
                                echo"<td>".$_SESSION["listado"][$a]["Usuario"]."</td>";
                                echo"<td>".$_SESSION["listado"][$a]["UsuarioLogin"]."</td>";
                                if($_SESSION["logged"]['Usuario']=='Administrador')
                                    {
                                     echo '<td>' . '<a href="index.php?accion=getmodificar&ID='.$_SESSION["listado"][$a]['ID'].'">Editar </a>'   . '</td>' ; 
                                    
                                    }
                               
                                echo"</tr>";
                             }
                            
                        echo "</table>";
                        
                       /*
                         if ($total_paginas > 1)
                                     { 
                                        for ($i=1;$i<=$total_paginas;$i++)
                                        { 
                                            if ($pagina == $i) 
                                            //si muestro el índice de la página actual, no coloco enlace 
                                            echo $pagina . " "; 
                                            else 
                                            //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
                                            echo "<a href='index.php?accion=listarusuarios?pagina=" . $i ."'>" . $i . "</a> ";
                                        } 
                                     }
                        * 
                        */
                    } ?>
                </div>
    
       </div>
       <?php borrarErrores() ?>
    </body>
    </html>