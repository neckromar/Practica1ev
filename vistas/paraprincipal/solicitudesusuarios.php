<div  style="width:20%;margin-top:5%">
            
                <div class="card-body">
                    <?php  if(isset($_SESSION["solicitudes"]))
                        {
                        
                        //Limito la busqueda 
                         $pagina=$_SESSION["paginasol"];
                         $numeroporpaginas=$_SESSION["solicitudes"]['total'];
                     
                         $numeropaginas=ceil($numeroporpaginas/4);
                         

                        
                        
                         echo '<table border=1 class="table" ><tr class="table-primary">';
                         if(count($_SESSION["solicitudes"]['fila'])!= 0)
                          {
                         foreach ($_SESSION["solicitudes"]['fila'][0] as $titulo => $valor)
                        {
                            echo '<th>'.$titulo.'</th>';
                         }   
                         echo '</tr>';
                        for ($a=0;$a<count($_SESSION["solicitudes"]['fila']);$a++) 
                            {
                                echo"<tr class='table-info'>";
                                
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]['ID']."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["Nif"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["Nombre"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["Apellido1"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["Apellido2"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["Telefonomovil"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["Telefonofijo"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["Email"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["Departamento"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["Usuario"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["UsuarioLogin"]."</td>";
                                echo"<td>".$_SESSION["solicitudes"]['fila'][$a]["Aceptado"]."</td>";
                                if($_SESSION["logged"]['Usuario']=='Administrador')
                                {
                                     echo '<td>' . '<a href="index.php?accion=getmodificar&ID='.$_SESSION["solicitudes"]['fila'][$a]['ID'].'">Editar </a>'   . '</td>' ;
                                }
                                echo"</tr>";
                             }
                        echo "</table>";
                    }
                    }
                    
                    
                    ?>
                </div>
     <div>
              
              <section>
                  <ul>
                    <?php if($pagina ==1 ):?>
                      <li class="disabled">&laquo;</li>
                    <?php else:?>  
                      <li><a href="index.php?accion=solicitudesusuarios&pagina=<?php echo $pagina-1 ?>">&laquo;</a></li>
                      <?php endif; ?>  
                      
                      <?php 
                         for($i=1;$i <= $numeropaginas;$i++)
                         {
                             if($pagina == $i)
                             {
                                 echo '<li class="active"><a href="index.php?accion=solicitudesusuarios&pagina='.$i .'">'.$i .'</a></li>';
                             }
                             else
                             {
                                 echo '<li><a href="index.php?accion=solicitudesusuarios&pagina='.$i.'">'.$i .'</a></li>';
                             }
                         }
                      
                       ?>
                      <?php  if($pagina == $numeropaginas): ?>
                      <li class="activated">&raquo;</li>
                      <?php else:?>
                      <li><a href="index.php?accion=solicitudesusuarios&pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
                      <?php endif; ?> 
                  </ul>
                  
              </section>
               
          </div>
    
          <div>
              <a href="index.php?accion=listados_pdf&aceptado=0" >Generar PDF</a>
              
          </div>
       </div>
       
    </body>
    </html>