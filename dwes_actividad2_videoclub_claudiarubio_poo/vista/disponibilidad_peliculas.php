<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos
session_start(); //iniciar sesion

$usuario = $_SESSION["usuario"];

$consulta = "SELECT * FROM peliculas";
//$paquete = mysqli_query($conexion, $consulta);
$paquete = $conexion->query($consulta); //poo

?>
<div class="text-center my-3">
    <h4>¡Hola <?php echo $usuario; ?>!</h4>
    <h4 class="text-primary text-uppercase">Disponibilidad de películas</h4>
    <p>Listado de la disponibilidad de existencias del VideoClub Clarub:</p>
    <table class="table table-striped ">
        <tr>
            <td><strong>Película</strong></td>
            <td><strong>Género</strong></td>
            <td><strong>Año de producción</strong></td>
            <td><strong>Disponibilidad</strong></td>
        </tr>
        <?php
        //while ($fila = mysqli_fetch_array($paquete)) {
        while ($fila = $paquete->fetch_array()) { //poo
        ?>
            <tr>
                <td><?php echo $fila['pelicula'] ?></td>
                <td><?php echo $fila['genero'] ?></td>
                <td><?php echo $fila['anio'] ?></td>
                <td><?php echo $fila['disponible'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<!--opcion para volver al menu prinicipal-->
<div class="text-center my-3 border">
    <p>Pulsa para volver al menú principal</p>
    <a class="btn btn-secondary my-3" href="menu_administrador.php">Volver</a>
</div>
<?php
$conexion->close();
include("footer.php"); //pie de pagina
?>