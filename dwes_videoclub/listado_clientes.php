<?php
include("conexion.php");

/*Almacenar consulta en variable*/
$consulta="SELECT * FROM `usuarios`";

/*Ejecutar consulta y almacenarla en variable paquete*/
$paquete=mysqli_query($conexion,$consulta);?>

<html>
    <body>
        <h2>Listado de clientes</h2>
        <!--/*Recorrer el paquete y mostrar las filas*/-->
        <table>
            <tr>
                <td><strong>Idusuario</strong></td>
                <td><strong>Usuario</strong></td>
                <td><strong>Password</strong></td>
                <td><strong>Admin/noAdmin</strong></td>
            </tr>
            <?php
            while ($fila=mysqli_fetch_array($paquete)) {?>
            <tr>
                <td><input type=text name=idusuario value="<?php echo $fila['idusuario']?>"></td>
                <td><input type=text name=usuario value="<?php echo $fila['usuario']?>"></td>
                <td><input type=text name=password value="<?php echo $fila['password']?>"></td>
                <td><input type=text name=admmin value="<?php echo $fila['admin']?>"></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>
