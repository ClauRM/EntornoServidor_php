<?php
include("conexion.php");

/*Escribir la consulta*/
$consulta="SELECT `pelicula`, `genero`, `anio` FROM `peliculas`";

/*Ejecutar la consulta y almacenarla en variable para recorrerla*/
$paquete=mysqli_query($conexion,$consulta);?>

<html>
    <body>
        <h2>Listado de películas</h2>
        <!--/*Recorrer el paquete y mostrar las filas*/-->
        <table>
            <tr>
                <td><strong>Título</strong></td>
                <td><strong>Género</strong></td>
                <td><strong>Año</strong></td>
            </tr>
            <?php
            while($fila=mysqli_fetch_array($paquete)){?>
            <tr>
                <td><input type=text name=pelicula value="<?php echo $fila['pelicula']?>"></td>
                <td><input type=text name=genero value="<?php echo $fila['genero']?>"></td>
                <td><input type=text name=anio value="<?php echo $fila['anio']?>"></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>