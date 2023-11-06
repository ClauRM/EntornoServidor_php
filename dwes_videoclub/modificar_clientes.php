<?php
include("conexion.php");

/*Si no hay submit !isset, muestra tabla con los datos*/
if (!isset($_POST['submit'])) {
    /*Escribir la consulta*/
    $consulta = "SELECT * FROM `usuarios` ";

    /*Ejecutar consulta y almacenar en variable para recorrerla*/
    $paquete = mysqli_query($conexion, $consulta); ?>
    <html>

    <body>
        <h2>Modificar cliente</h2>
        <p>Cambie los datos de un cliente y pulse "Modificar" en la fila correspondiente</p>
        <!--/*Recorrer el paquete y mostrar las filas*/-->
        <table>
            <tr>
                <td></td>
                <td><strong>Usuario</strong></td>
                <td><strong>Password</strong></td>
                <td><strong>Admin/noAdmin</strong></td>
            </tr>
            <?php

            while ($fila = mysqli_fetch_array($paquete)) {
            ?>
                <form method="POST" action="modificar_clientes.php">
                    <tr>
                        <td><input type=hidden name=idusuario readonly value="<?php echo $fila['idusuario'] ?>"></td>
                        <!--tipo hidden para no mostrarlo pero si atrapar su valor-->
                        <td><input type=text name=usuario value="<?php echo $fila['usuario'] ?>"></td>
                        <td><input type=text name=password value="<?php echo $fila['password'] ?>"></td>
                        <td><input style=background-color:LightGray type=text name=admin readonly value="<?php echo $fila['admin'] ?>"></td>
                        <td><select name="adminMod">
                                <option value="0">0-Cliente</option>
                                <option value="1">1-Admin</option>
                                <!--0 o 1 es el valor que se incluye en la BD-->
                            </select></td>
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
    $id = $_POST["idusuario"];
    $usuario = $_POST["usuario"];
    $pass = $_POST["password"];
    $admin = $_POST["adminMod"];
    /*Escribir la consulta de update*/
    $consulta = "UPDATE `usuarios` SET `usuario`='$usuario',`password`='$pass',`admin`='$admin' WHERE `idusuario`='$id'";

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