<?php

function mostrarError($errores,$campo){
    $alerta='';
    if(isset($errores[$campo]) && !empty($campo))
    {
        $alerta="<div class='alert alert-danger'>".$errores[$campo]."</div>";
    }
    
    return $alerta;
}
function borrarErrores()
{
   
    return  $_SESSION['errores']=null;;
}

?>

