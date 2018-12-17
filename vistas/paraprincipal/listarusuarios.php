
      <div  style="margin-top:5%">
    
                <div class="card-body">
                    
                    
                    <?php  
                    //Limito la busqueda 
                     $pagina=$_SESSION["pagina"];
           
                     $numeroporpaginas=$_SESSION["listado"]['total'];
                     
                     $numeropaginas=ceil($numeroporpaginas/4);
                    //examino la página a mostrar y el inicio del registro a mostrar 
                    
                    if(isset($_SESSION["listado"])){
                         echo '<table border=1 class="table" ><tr class="table-primary">';
                         if(count($_SESSION["listado"]['fila']) !=0){
                         foreach ($_SESSION["listado"]['fila'][0] as $titulo => $valor)
                        {
                            echo '<th>'.$titulo.'</th>';
                         }   
                         echo '</tr>';
                        for ($a=0;$a<count($_SESSION["listado"]['fila']);$a++) 
                            {
                                echo"<tr class='table-info'>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]['ID']."</td>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]["Nif"]."</td>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]["Nombre"]."</td>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]["Apellido1"]."</td>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]["Apellido2"]."</td>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]["Telefonomovil"]."</td>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]["Telefonofijo"]."</td>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]["Email"]."</td>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]["Departamento"]."</td>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]["Usuario"]."</td>";
                                echo"<td>".$_SESSION["listado"]['fila'][$a]["UsuarioLogin"]."</td>";
                                if($_SESSION["logged"]['Usuario']=='Administrador')
                                    {
                                     echo '<td>' . '<a href="index.php?accion=getmodificar&ID='.$_SESSION["listado"]['fila'][$a]['ID'].'">Editar </a>'   . '</td>' ; 
                                    
                                    }
                               
                                echo"</tr>";
                             }
                            
                        echo "</table>";
                         } 
                    } ?>
                     <span ><?php  echo isset($_SESSION['errores']) ?  mostrarError($_SESSION['errores'],'modificaciones',true):"" ?></span>
                    
                </div>
          
          <div>
              
              <section>
                  <ul>
                    <?php if($pagina ==1 ):?>
                      <li class="disabled">&laquo;</li>
                    <?php else:?>  
                      <li><a href="index.php?accion=listarusuarios&pagina=<?php echo $pagina-1 ?>">&laquo;</a></li>
                      <?php endif; ?>  
                      
                      <?php 
                         for($i=1;$i <= $numeropaginas;$i++)
                         {
                             if($pagina == $i)
                             {
                                 echo '<li class="active"><a href="index.php?accion=listarusuarios&pagina='.$i .'">'.$i .'</a></li>';
                             }
                             else
                             {
                                 echo '<li><a href="index.php?accion=listarusuarios&pagina='.$i.'">'.$i .'</a></li>';
                             }
                         }
                      
                       ?>
                      <?php  if($pagina == $numeropaginas): ?>
                      <li class="activated">&raquo;</li>
                      <?php else:?>
                      <li><a href="index.php?accion=listarusuarios&pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
                      <?php endif; ?> 
                  </ul>
                  
              </section>
             
          </div>
          
          <div>
              <a class="nav-link"   href="index.php?accion=listados_pdf&aceptado=1" >Generar PDF</a>
              
          </div>
       </div>
      
       <?php borrarErrores() ?>
    </body>
    </html>