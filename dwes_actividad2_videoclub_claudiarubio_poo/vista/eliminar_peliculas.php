<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos
session_start(); //iniciar sesion

$usuario = $_SESSION["usuario"];

//si no se ha pulsado en submit muestra un formulario con las peliculas que hay registradas
if (!isset($_POST["submit"])) {

    //Escribir la consulta para traer todos los datos de la tabla
    $consulta = "SELECT * FROM peliculas";

    //Ejecutar la consulta y almacenarla en variable para recorrerla
    //$paquete = mysqli_query($conexion, $consulta);
    $paquete = $conexion->query($consulta); //poo
?>
    <div class="text-center my-3">
        <h4>¡Hola <?php echo $usuario; ?>!</h4>
        <h4 class="text-primary text-uppercase">Eliminar película</h4>
        <p>Estas son las películas que hay registradas. Pulsa sobre la que deseas Eliminar:</p>
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
                <td><strong>Eliminar</strong></td>
            </tr>
            <?php
            //recorremos el paquete de peliculas y mostramos resultado dentro de un formulario
            //while ($fila = mysqli_fetch_array($paquete)) { 
            while ($fila = $paquete->fetch_array()) { //poo
            ?>
                <form method="post" action="eliminar_peliculas.php">
                    <tr>
                        <td><input class="visually-hidden" name="idpelicula" value="<?php echo $fila['idpelicula'] ?>"></td>
                        <td><input class="form-control-plaintext text-center" type="text" name="pelicula" value="<?php echo $fila['pelicula'] ?>" readonly></td>
                        <td><input class="form-control-plaintext text-center" type="text" name="genero" value="<?php echo $fila['genero'] ?>" readonly></td>
                        <td><input class="form-control-plaintext text-center" type="text" name="anio" value="<?php echo $fila['anio'] ?>" readonly></td>
                        <td><input class="visually-hidden" name="disponible" value="<?php echo $fila['disponible'] ?>"></td>
                        <td><input type="submit" name="submit" value="Eliminar"></td>
                    </tr>
                </form>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="text-center my-3 border">
        <p>Pulsa para volver al menú principal</p>
        <a class="btn btn-secondary my-3" href="menu_administrador.php">Volver</a>
    </div>
    <?php
} else {
    //si se ha pulsado submit atrapa los valores y ejecuta las consultas
    $idpelicula = $_POST["idpelicula"];
    $pelicula = $_POST["pelicula"];
    $disponible = $_POST["disponible"];

    //si ya todos los clientes han devuelto esta película, se podrá eliminar de los registros
    if ($disponible >= 3) {

        //consulta para eliminar la película de la tabla y sus relaciones en cascada
        $consulta = "DELETE FROM peliculas WHERE idpelicula = '$idpelicula'";
        //ejecutar la consulta de actualizacion en la tabla
        //$paquete = mysqli_query($conexion, $consulta);
        $paquete = $conexion->query($consulta); //poo

        //mostrar mensaje de que la pelicula se ha eliminado correctamente
    ?>
        <div class="text-center my-3">
            <p><strong><?php echo $usuario; ?></strong>, la película <strong><?php echo $pelicula; ?></strong> se ha eliminado correctamente.</p>
        </div>
    <?php
    } else { ?>
        <!--la pelicula no se puede eliminar, hay clientes añun con copias de la pelicula sin devolver-->
        <div class="text-center my-3">
            <p><strong><?php echo $usuario; ?></strong>, la película <strong><?php echo $pelicula; ?></strong> no puede ser eliminada porque aún hay copias no entregadas por algunos clientes.</p>
        </div>
    <?php
    }
    ?>
    <div class="text-center my-3 border">
        <p>Pulsa para volver al menú principal</p>
        <a class="btn btn-secondary my-3" href="menu_administrador.php">Volver</a>
    </div>

<?php
    $conexion->close();
}
include("footer.php"); //pie de pagina
?>