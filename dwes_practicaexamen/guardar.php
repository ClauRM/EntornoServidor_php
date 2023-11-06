<?php

include("conexion.php");

if(!isset($_POST["submit"])){

echo'
<html>
<body>
<h3>Formulario</h3>
<form method="post" action="guardar.php">
Nombre: <input type="text" name="nombre"><br><br>
Apellido: <input type="text" name="apellido"><br><br>
DNI: <input type="text" name="dni"><br><br>
<input type="submit" name="submit" value="Guardar">
</form>
</body>
</html>
';

} else {

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$dni=$_POST["dni"];

$consulta="INSERT INTO usuarios (id,nombre,apellido,dni) VALUES('','$nombre','$apellido','$dni')";

$paquete=mysqli_query($conexion,$consulta);

echo '<hmtl><body><h3>Todo bien!</h3></body></hmtl>';

}



?>