<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos
session_start(); //iniciar sesion

$usuario = $_SESSION["usuario"];

$consulta = "SELECT * FROM usuarios";
//$paquete = mysqli_query($conexion, $consulta);
$paquete = $conexion->query($consulta); //poo

?>
<div class="text-center my-3">
    <h4>¡Hola <?php echo $usuario; ?>!</h4>
    <h4 class="text-primary text-uppercase">Clientes registrados</h4>
    <p>Listado de todos los clientes que hay registrados en VideoClub Clarub:</p>
    <table class="table table-striped ">
        <tr>
            <td><strong>Nombre usuario</strong></td>
            <td><strong>Password</strong></td>
            <td><strong>Administrador 1/0</strong></td>
        </tr>
        <?php
        //while ($fila = mysqli_fetch_array($paquete)) { 
        while ($fila = $paquete->fetch_array()) { ?>
            <tr>
                <td><?php echo $fila['usuario'] ?></td>
                <td><?php echo $fila['password'] ?></td>
                <td><?php echo $fila['admin'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<!--opcion para volver al menu prinicipal-->
<div class="text-center my-3 border">
    <p>Pulsa para volver al menú principal</p>
    <a class="btn btn-secondary my-3" href="menu_administrador.php">Volver</a>
</div>
<?php
$conexion->close();
include("footer.php"); //pie de pagina
?>