<?php

include ("conexion.php");
session_start ();

$consulta="select * from usuarios";
$paquete=mysqli_query($conexion, $consulta);
$encontrado=0;

if ($fila=mysqli_fetch_array ($paquete) ) {

if (($_SESSION['usuario']==$fila['nombre'])and($_SESSION['pass']==$fila['password'])) {
$encontrado=1;
}
}
	
	if ($encontrado==1){
header ('Location: mensaje.php'); 

} else { echo "usuario o contraseña incorrectos";}


?>