<?php
 include ("conexion.php");

 $consulta="select * from usuarios";
 $paquete=mysqli_query($conexion, $consulta); 
 echo "<table border=2>";

 while($fila=mysqli_fetch_array($paquete)){
	 
	 echo "<tr>"; 
	 echo "<td>","<input type='text' name='id' value='".$fila['id']."'>","</td>";
	 echo "<td>","<input type='text' name='usuario' value='".$fila['nombre']."'>","</td>"; /*comilla simples y faltaba un punto*/
	 echo "<td>","<input type='text' name='apellido' value='".$fila['apellido']."'>","</td>"; 
	 echo "<td>","<input type='text' name='dni' value='".$fila['dni']."'>","</td>";  /*nombre de variables igual en mysql*/
	 echo "<br>"; 
	 echo "</tr>"; }

 echo "</table>";
?>