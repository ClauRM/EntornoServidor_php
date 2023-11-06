<?php

include("header.php"); //cabecera

session_start(); //sesion iniciada

session_unset(); 
session_destroy();//cierra la sesión
 
?>

<div class="text-center my-3">
    <p> <strong>Se ha cerrado su sesión correctamente</strong></p>
    <!--opcion salir de la pagina-->
    <div class="text-center my-3 border">
        <p>Volver a la página de inicio</p>
        <a class="btn btn-secondary my-3" href="index.php">Videoclub</a>
    </div>
</div>

<?php
include("footer.php"); //pie de pagina
?>