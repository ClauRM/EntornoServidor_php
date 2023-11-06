<?php

include("conexion.php");

if(!isset($_POST["submit"])){

$consulta="SELECT*FROM usuarios";
$paquete=mysqli_query($conexion,$consulta);

echo '<html><body><h3>Borrar</h3>';

while($fila=mysqli_fetch_array($paquete)){

echo'<form method="POST" action="borrar.php">';

echo'<input type="text" name="id" value="'.$fila["id"].'">';
echo' ';
echo'<input type="text" name="nombre" value="'.$fila["nombre"].'">';
echo' ';
echo'<input type="text" name="apellido" value="'.$fila["apellido"].'">';
echo' ';
echo'<input type="text" name="dni" value="'.$fila["dni"].'">';
echo' ';
echo'<input type="submit" name="submit" value="Borrar">';

echo '</form>';

}

echo '</body></html>';

} else {

$id=$_POST["id"];

$consulta="DELETE FROM usuarios WHERE id='$id'";
$paquete=mysqli_query($conexion,$consulta);

echo '<html><body><h3>Registro eliminado</h3>';
echo '</body></html>';

}

?>