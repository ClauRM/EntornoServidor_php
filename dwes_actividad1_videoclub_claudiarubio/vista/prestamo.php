<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos
session_start(); //iniciar sesion

$usuario = $_SESSION["usuario"];
$idusuario = $_SESSION["idusuario"];

//si no se ha pulsado en submit muestra un formulario con las peliculas disponibles
if (!isset($_POST["submit"])) {
    //Escribir la consulta para traer todos los datos de la tabla
    $consulta = "SELECT * FROM peliculas";

    //Ejecutar la consulta y almacenarla en variable para recorrerla
    $paquete = mysqli_query($conexion, $consulta);
?>
    <div class="text-center my-3">
        <h4>¡Hola <?php echo $usuario; ?>!</h4>
        <h4 class="text-primary text-uppercase">Préstamo de películas</h4>
        <p>Estas son las películas que tienen disponibilidad. Selecciona la que deseas Alquilar:</p>
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
                <td><strong>Alquilar</strong></td>
            </tr>
            <?php
            //recorremos el paquete de peliculas y mostramos resultado dentro de un formulario
            while ($fila = mysqli_fetch_array($paquete)) {
                //mostrar solo si hay disponibles
                if ($fila["disponible"] > 0) { ?>
                    <form method="post" action="prestamo.php">
                        <tr>
                            <td><input class="visually-hidden" name="idpelicula" value="<?php echo $fila['idpelicula'] ?>"></td>
                            <td><input class="form-control-plaintext text-center" type="text" name="pelicula" value="<?php echo $fila['pelicula'] ?>" readonly></td>
                            <td><input class="form-control-plaintext text-center" type="text" name="genero" value="<?php echo $fila['genero'] ?>" readonly></td>
                            <td><input class="form-control-plaintext text-center" type="text" name="anio" value="<?php echo $fila['anio'] ?>" readonly></td>
                            <td><input class="visually-hidden" name="disponible" value="<?php echo $fila['disponible'] ?>"></td>
                            <td><input type="submit" name="submit" value="Alquilar"></td>
                        </tr>
                    </form>
            <?php
                }
            }
            ?>
        </table>
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
    $disponible = $_POST["disponible"] - 1; //disminuye cuando se ha pulsado en alquilar

    //consulta para modificar el numero de disponibilidad
    $consulta = "UPDATE peliculas SET disponible='" . $disponible . "' WHERE idpelicula='" . $idpelicula . "'";
    //ejecutar la consulta de actualizacion en la tabla
    $paquete = mysqli_query($conexion, $consulta);

    //consulta para crear la relacion usuario-pelicula + alquilada =1, devolucion=0
    $consulta = "INSERT INTO usuarios_peliculas(fidusuario, fidpelicula, alquilada) VALUES ('" . $idusuario . "','" . $idpelicula . "','1')";
    //ejecutar la consulta de actualizacion en la tabla
    $paquete = mysqli_query($conexion, $consulta);

    //mostrar mensaje de que la pelicula se ha alquilado correctamente
?>
    <div class="text-center my-3">
        <p><strong><?php echo $usuario; ?></strong>, la película <strong><?php echo $pelicula; ?></strong> se ha alquilado correctamente.</p>
    </div>
    <div class="text-center my-3 border">
        <p>Pulsa para volver al menú principal</p>
        <a class="btn btn-secondary my-3" href="menu_cliente.php">Volver</a>
    </div>

<?php
}
include("footer.php"); //pie de pagina
?>