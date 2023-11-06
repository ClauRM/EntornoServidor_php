<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos
session_start(); //iniciar sesion

$usuario = $_SESSION["usuario"];?>

<div class="text-center my-3">
    <h4>¡Hola <?php echo $usuario; ?>!</h4>
    <h4 class="text-primary text-uppercase">Menu administrador</h4>
    <p>¿Qué acción deseas realizar?</p>
    <div class="d-flex flex-column border col-4 mx-auto">
        <a class="btn btn-outline-primary m-1" for="btncheck1" href="clientes_registrados.php">LISTADO DE CLIENTES REGISTRADOS</a>
        <a class="btn btn-outline-primary m-1" for="btncheck1" href="peliculas_registradas.php">LISTADO DE PELICULAS REGISTRADAS</a>
        <a class="btn btn-outline-primary m-1" for="btncheck1" href="registro_peliculas.php">REGISTRAR NUEVA PELICULA</a>
        <a class="btn btn-outline-primary m-1" for="btncheck1" href="eliminar_peliculas.php">ELIMINAR UNA PELICULA</a>
        <a class="btn btn-outline-primary m-1" for="btncheck1" href="disponibilidad_peliculas.php">CONSULTAR DISPONIBILIDAD PELICULAS</a>
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