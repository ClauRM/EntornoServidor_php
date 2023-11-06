<?php

include("conexion.php");

$consulta="SELECT * FROM usuarios";
$paquete=mysqli_query($conexion,$consulta);
$contar=0;

echo'
<html>
<body>
<h3>Número Datos</h3>
';

while($fila=mysqli_fetch_array($paquete)){

$contar++;

}

echo $contar;
echo '</body></html>';

?>