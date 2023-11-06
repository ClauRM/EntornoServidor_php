<?php

echo'<form action="origen.php" method="post">
Usuario: <input type="text" name="t_usuario">
Password: <input type="text" name="t_pass">
<input type="submit" name="Submit" value="Aceptar">
</form>';

if(isset($_POST['t_usuario'])and isset($_POST['t_pass'])){
	session_start();
	
	$_SESSION['usuario']=$_POST['t_usuario'];
	$_SESSION['pass']=$_POST['t_pass'];
	
}

echo'<a href="destino.php">Destino </a>';
?>