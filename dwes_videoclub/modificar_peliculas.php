<?php
include("conexion.php");

/*Si no hay submit !isset, muestra tabla con los datos*/
if (!isset($_POST['submit'])) {
    /*Escribir la consulta*/
    $consulta = "SELECT * FROM `peliculas`";

    /*Ejecutar consulta y almacenar en variable para recorrerla*/
    $paquete = mysqli_query($conexion, $consulta); ?>
    <html>

    <body>
        <h2>Modificar película</h2>
        <p>Cambie los datos de una película y pulse "Modificar" en la fila correspondiente</p>
        <!--/*Recorrer el paquete y mostrar las filas*/-->
        <table>
            <tr>
                <td></td>
                <td><strong>Título de Película</strong></td>
                <td><strong>Género</strong></td>
                <td></td>
                <td><strong>Año</strong></td>
            </tr>
            <?php

            while ($fila = mysqli_fetch_array($paquete)) {
            ?>
                <form method="POST" action="modificar_peliculas.php">
                    <tr>
                        <td><input type=hidden name=idpelicula readonly value="<?php echo $fila['idpelicula'] ?>"></td>
                        <!--tipo hidden para no mostrarlo pero si atrapar su valor-->
                        <td><input type=text name=pelicula value="<?php echo $fila['pelicula'] ?>"></td>
                        <td><input style=background-color:LightGray type=text name=genero readonly value="<?php echo $fila['genero'] ?>"></td>
                        <td><select name="generoMod">
                                <option value="ficcion">Sci-Fi</option>
                                <!--ficcion, accion... son los nombres que se incluye en la BD-->
                                <option value="accion">Acción</option>
                                <option value="comedia">Comedia</option>
                                <option value="fantasia">Fantasia</option>
                            </select></td>
                        <td><input type=text name=anio maxlength="4" value="<?php echo $fila['anio'] ?>"></td>
                        <td><input type="submit" name="submit" value="Modificar"></td>
                    </tr>
                </form>
            <?php
            } ?>
        </table>
    </body>

    </html>
<?php
} else {

    /*Si hay submit , se modifica el registro de la BD*/
    $id = $_POST["idpelicula"];
    $pelicula = $_POST["pelicula"];
    $genero = $_POST["generoMod"];
    $anio = $_POST["anio"];
    /*Escribir la consulta de update*/
    $consulta = "UPDATE `peliculas` SET `pelicula`='$pelicula',`genero`='$genero',`anio`='$anio' WHERE `idpelicula`='$id'";

    /*Ejecutar la consulta de update*/
    $paquete = mysqli_query($conexion, $consulta);
?>
    <html>

    <body>
        <br>
        Registro modificado correctamente
    </body>

    </html>
<?php
}
?>