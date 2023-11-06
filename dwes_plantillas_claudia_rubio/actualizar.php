<?php 
include("conexion.php");

 if (!isset($_POST['submit'])) {
	 $consulta= "select * from usuarios";
	 $datos=mysqli_query($conexion,$consulta) ; 
	 echo ' <table width=300> <tr> <td>id</td><td>nombre</td><td>apellido</td><td>DNI</td> </tr>';

	 while ($fila=mysqli_fetch_array($datos)) {
		 echo "<form method='POST' action='actualizar.php' >"; 
		 echo "<tr>"; 
		 echo "<td> <input type='text' name='id' value='".$fila['id']."'> </td>"; 
		 echo "<td><input type='text' name='nombre' value='".$fila['nombre']."'></td>"; /*variables igual en mysql*/
		 echo "<td><input type='text' name='lastname' value='".$fila['apellido']."'></td>"; 
		 echo "<td><input type='text' name='dni' value='".$fila['dni']."'></td> "; 
		 echo "<td>"," <input type='submit' name='submit' value='Actualizar'>"," </td>"; 
		 echo "</tr>";
		 echo "</form>"; } 
		 
	echo "</table>"; 
	}else { 
	
	$I=$_POST["id"]; 
	$N=$_POST["nombre"]; 
	$L=$_POST["lastname"]; 
	$D=$_POST["dni"]; 
	
	$consulta="UPDATE usuarios SET id='$I' , nombre='$N', apellido='$L', dni='$D' WHERE id='$I' ";
	$datos=mysqli_query($conexion,$consulta) ; }

?>