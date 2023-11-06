<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos
session_start(); //iniciar sesion

$usuario = $_SESSION["usuario"];?>

<div class="text-center my-3">
    <h4>¡Hola <?php echo $usuario; ?>!</h4>
    <p>¿Qué acción deseas realizar?</p>
    <div class="d-flex flex-column border col-3 mx-auto">
        <a class="btn btn-outline-primary m-1" for="btncheck1" href="prestamo.php">PRESTAMO DE PELICULAS</a>
        <a class="btn btn-outline-primary m-1" for="btncheck1" href="devolucion.php">DEVOLUCION DE PELICULAS</a>
        <a class="btn btn-outline-primary m-1" for="btncheck1" href="peliculas_alquiladas.php">VER PELICULAS ALQUILADAS</a>
    </div>
    <!--opcion salir de la pagina-->
    <div class="text-center my-3 border">
        <p>Si no deseas realizar ninguna acción, pulsa para cerrar la sesión</p>
        <a class="btn btn-secondary my-3" href="logout.php">Cerrar sesión</a>
    </div>
</div>


<?php
include("footer.php"); //pie de pagina
?>