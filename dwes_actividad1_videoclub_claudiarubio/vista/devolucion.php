<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos
session_start(); //iniciar sesion

$usuario = $_SESSION["usuario"];
$idusuario = $_SESSION["idusuario"];
$contador = 0;

//si no se ha pulsado en submit muestra un formulario con las peliculas disponibles
if (!isset($_POST["submit"])) {
    //escribo la consulta para listar las peliculas alquiladas por el cliente
    $consulta = "SELECT * FROM peliculas INNER JOIN usuarios_peliculas ON peliculas.idpelicula=usuarios_peliculas.fidpelicula WHERE fidusuario='" . $idusuario . "' AND alquilada='1'";;

    //ejecuto la consulta
    $paquete = mysqli_query($conexion, $consulta);
?>
    <div class="text-center my-3">
        <h4>¡Hola <?php echo $usuario; ?>!</h4>
        <h4 class="text-primary text-uppercase">Devolución de películas</h4>
        <p>Estas son las películas que tienes alquiladas. Pulsa sobre la que deseas Devolver:</p>
    </div>
    <div class="text-center my-3">
        <!--creamos una tabla para mostrar las peliculas-->
        <table class="table table-striped ">
            <tr>
                <td></td>
                <td><strong>Título Película</strong></td>
                <td><strong>Género</strong></td>
                <td><strong>Año</strong></td>
                <td></td>
                <td><strong>Devolver</strong></td>
            </tr>
            <?php
            //recorremos el paquete de peliculas y mostramos resultado dentro de un formulario
            while ($fila = mysqli_fetch_array($paquete)) {
                $contador++; ?>
                <form method="post" action="devolucion.php">
                    <tr>
                        <td><input class="visually-hidden" name="idpelicula" value="<?php echo $fila['idpelicula'] ?>"></td>
                        <td><input class="form-control-plaintext text-center" type="text" name="pelicula" value="<?php echo $fila['pelicula'] ?>" readonly></td>
                        <td><input class="form-control-plaintext text-center" type="text" name="genero" value="<?php echo $fila['genero'] ?>" readonly></td>
                        <td><input class="form-control-plaintext text-center" type="text" name="anio" value="<?php echo $fila['anio'] ?>" readonly></td>
                        <td><input class="visually-hidden" name="disponible" value="<?php echo $fila['disponible'] ?>"></td>
                        <td><input type="submit" name="submit" value="Devolver"></td>
                    </tr>
                </form>
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
    <div class="text-center my-3 border">
        <p>Pulsa para volver al menú principal</p>
        <a class="btn btn-secondary my-3" href="menu_cliente.php">Volver</a>
    </div>
<?php
} else {
    //si se ha pulsado submit atrapa los valores y ejecuta las consultas
    $idpelicula = $_POST["idpelicula"];
    $pelicula = $_POST["pelicula"];
    $disponible = $_POST["disponible"] + 1; //aumenta cuando se ha pulsado en alquilar

    //consulta para modificar el numero de disponibilidad
    $consulta = "UPDATE peliculas SET disponible='" . $disponible . "' WHERE idpelicula='" . $idpelicula . "'";
    //ejecutar la consulta de actualizacion en la tabla
    $paquete = mysqli_query($conexion, $consulta);

    //consulta para modificar la relacion usuario-pelicula + alquilada =1, devolucion=0, limitado a 1 ejemplar si la tiene varias veces.
    $consulta = "UPDATE usuarios_peliculas SET alquilada='0' WHERE fidusuario='" . $idusuario . "' LIMIT 1;";
    //UPDATE `usuarios_peliculas` SET `alquilada`='1' WHERE `fidusuario`='3';

    //ejecutar la consulta de actualizacion en la tabla
    $paquete = mysqli_query($conexion, $consulta);

    //mostrar mensaje de que la pelicula se ha alquilado correctamente
?>
    <div class="text-center my-3">
        <p><strong><?php echo $usuario; ?></strong>, la película <strong><?php echo $pelicula; ?></strong> se ha devuelto correctamente.</p>
    </div>
    <div class="text-center my-3 border">
        <p>Pulsa para volver al menú principal</p>
        <a class="btn btn-secondary my-3" href="menu_cliente.php">Volver</a>
    </div>

<?php
}
include("footer.php"); //pie de pagina
?>