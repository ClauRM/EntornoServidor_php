<?php
include("conexion.php");

/*Si borrar no se ha presionado !isset, muestra tabla con los datos*/
if(!isset($_POST['submit'])){
    /*Escribir la consulta*/
    $consulta="SELECT * FROM `usuarios` ";
    
    /*Ejecutar consulta y almacenar en variable para recorrerla*/
    $paquete=mysqli_query($conexion,$consulta);?>
    <html>
        <body>
            <h2>Eliminar cliente</h2>
            <p>Pulse "Eliminar" en la fila del cliente que desea borrar de la tabla</p>
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
                <form method="POST" action="borrar_clientes.php">
                <tr>
                    <td><input type=text name=idusuario value="<?php echo $fila['idusuario']?>"></td>
                    <td><input type=text name=usuario value="<?php echo $fila['usuario']?>"></td>
                    <td><input type=text name=password value="<?php echo $fila['password']?>"></td>
                    <td><input type=text name=admin value="<?php echo $fila['admin']?>"></td>
                    <td><input type="submit" name="submit" value="Eliminar"></td>
                </tr>
                </form>
                <?php
            }?>
            </table>
        </body>
    </html>
    <?php
    }else{
        
/*Si submit , elimina el registro de la BD*/
$id=@$_POST["idusuario"];
/*Escribir la consulta de borrado*/
$consulta="DELETE FROM `usuarios` WHERE `idusuario`='$id'";
/*Ejecutar la consulta de borrado*/
$paquete=mysqli_query($conexion,$consulta);
?>
<html><body>
    Registro eliminado correctamente
</body></html>
<?php
}
?>