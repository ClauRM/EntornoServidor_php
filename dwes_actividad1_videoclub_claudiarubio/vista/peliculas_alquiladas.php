<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos
session_start(); //iniciar sesion

$usuario = $_SESSION["usuario"];
$idusuario = $_SESSION["idusuario"];
$contador = 0;

//escribo la consulta para listar las peliculas alquiladas por el cliente
$consulta = "SELECT * FROM peliculas INNER JOIN usuarios_peliculas ON peliculas.idpelicula=usuarios_peliculas.fidpelicula WHERE fidusuario='" . $idusuario . "' AND alquilada='1'";

//ejecuto la consulta
$paquete = mysqli_query($conexion, $consulta); ?>

<div class="text-center my-3">
    <h4>¡Hola <?php echo $usuario; ?>!</h4>
    <h4 class="text-primary text-uppercase">Películas alquiladas</h4>
    <p>Estas son las películas que tienes alquiladas</p>
    <table class="table table-striped ">
        <tr>
            <td><strong>Título Película</strong></td>
            <td><strong>Género</strong></td>
            <td><strong>Año</strong></td>
        </tr>

        <?php
        while ($fila = mysqli_fetch_array($paquete)) {
            $contador++; ?>
            <tr>
                <td><?php echo $fila['pelicula'] ?></td>
                <td><?php echo $fila['genero'] ?></td>
                <td><?php echo $fila['anio'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <!--si no hay ningun dato en el listado se muesttra un mensaje-->
    <?php
    if ($contador <= 0) { ?>
        <div class="text-center my-3">
            <p class="text-danger">No hay datos para mostrar</p>
        </div>
    <?php
    }
    ?>
</div>
<!--opcion para volver al menu prinicipal-->
<div class="text-center my-3 border">
    <p>Pulsa para volver al menú principal</p>
    <a class="btn btn-secondary my-3" href="menu_cliente.php">Volver</a>
</div>
<?php


include("footer.php"); //pie de pagina
?>