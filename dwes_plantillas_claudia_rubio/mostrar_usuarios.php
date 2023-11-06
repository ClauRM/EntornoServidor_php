<?php
include("conexion.php");

$consulta = "SELECT * FROM `usuarios` ";
$paquete = mysqli_query ($conexion, $consulta);
echo "<table border = 2>";

$contador =0;

while ($fila = mysqli_fetch_array($paquete)){
	$contador++;
}

echo "<td>Total de usuarios en la tabla: $contador </td></table>";

?>