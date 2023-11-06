<?php
include("conexion.php");

/*Si borrar no se ha presionado !isset, muestra tabla con los datos*/
if (!isset($_POST['submit'])) {
    /*Consulta para mostrar todas las peliculas*/
    $consulta = "SELECT * FROM `peliculas`";

    /*Ejecutar la consulta y almacenar en variable para posteriormente recorrerla*/
    $paquete = mysqli_query($conexion, $consulta); ?>
    <html>

    <body>
        <h2>Eliminar película</h2>
        <p>Pulse "Eliminar" en la fila de la película que desea borrar de la tabla</p>
        <!--/*Recorrer el paquete y mostrar las filas*/-->
        <table>
            <tr>
                <td><strong>Idpelicula</strong></td>
                <td><strong>Película</strong></td>
                <td><strong>Género</strong></td>
                <td><strong>Año</strong></td>
            </tr>
            <?php
            while ($fila = mysqli_fetch_array($paquete)) { ?>
                <form method="POST" action="borrar_peliculas.php">
                    <tr>
                        <td><input type=text name=idpelicula value="<?php echo $fila['idpelicula'] ?>"></td>
                        <td><input type=text name=pelicula value="<?php echo $fila['pelicula'] ?>"></td>
                        <td><input type=text name=genero value="<?php echo $fila['genero'] ?>"></td>
                        <td><input type=text name=anio value="<?php echo $fila['anio'] ?>"></td>
                        <td><input type="submit" name="submit" value="Eliminar"></td>
                    </tr>
                </form>
            <?php
            } ?>
        </table>
    </body>

    </html>
<?php
} else {
    /*si se ha pulsado el botón, almaceno el valor del id del submit que viene por método POST */
    $id = @$_POST["idpelicula"];
    /*Escribimos la consulta de borrado */
    $consulta = "DELETE FROM `peliculas` WHERE `idpelicula`='$id'";
    /*Ejecutamos la consulta */
    $paquete = mysqli_query($conexion, $consulta);
?>
    <html>

    <body>
        Registro eliminado correctamente
    </body>

    </html>
<?php
}
?>