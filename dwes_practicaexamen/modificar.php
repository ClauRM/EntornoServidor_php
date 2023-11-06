<?php

include("conexion.php");

if(!isset($_POST["submit"])){

$consulta="SELECT*FROM usuarios";
$paquete=mysqli_query($conexion,$consulta);

echo '<html><body><h3>Modificar</h3>';

while($fila=mysqli_fetch_array($paquete)){

echo'<form method="POST" action="modificar.php">';

echo'<input type="text" name="id" value="'.$fila["id"].'">';
echo' ';
echo'<input type="text" name="nombre" value="'.$fila["nombre"].'">';
echo' ';
echo'<input type="text" name="apellido" value="'.$fila["apellido"].'">';
echo' ';
echo'<input type="text" name="dni" value="'.$fila["dni"].'">';
echo' ';
echo'<input type="submit" name="submit" value="Modificar">';

echo '</form>';

}

echo '</body></html>';

} else {

$id=$_POST["id"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$dni=$_POST["dni"];

$consulta="UPDATE usuarios SET id='$id', nombre='$nombre', apellido='$apellido', dni='$dni' WHERE id='$id'";
$paquete=mysqli_query($conexion,$consulta);

echo '<html><body><h3>Datos modificados!</h3>';
echo '</body></html>';

}

?>