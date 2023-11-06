<?php
 include ("conexion.php");

 if (!isset($_POST["submit"])){
 echo '<html><body> 
 <form method="post" action="guardar.php">
 Nombre:<input type="text" name="nombre"> 
 Apellido:<input type="text" name="apellido"> 
 DNI:<input type="text" name="DNI"> 
 <input type="submit" name="submit" value="guardar"> 
 </body></html>'; 
 /*por que no cierra el form?*/
 
 }else{
 $N=$_POST["nombre"]; 
 $P=$_POST["apellido"]; 
 $DNI=$_POST["DNI"]; 
 $consulta="INSERT INTO usuarios (id,nombre,apellido,dni) VALUES (' ','$N','$P','$DNI') " ;
 $paquete=mysqli_query($conexion, $consulta); 
 echo '<html><body>Datos agregados</body></html>'; } 
 
 ?>