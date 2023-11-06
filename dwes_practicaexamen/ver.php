<?php

include("conexion.php");

$consulta="SELECT * FROM usuarios";
$paquete=mysqli_query($conexion,$consulta);

echo'
<html>
<body>
<h3>Datos</h3>
';

while($fila=mysqli_fetch_array($paquete)){

echo $fila["id"];
echo ' - ';
echo $fila["nombre"];
echo ' - ';
echo $fila["apellido"];
echo ' - ';
echo $fila["dni"];
echo '<hr>';

}

echo '</body></html>';

?>