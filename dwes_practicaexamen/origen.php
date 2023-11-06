<?php

echo '
<h3>Origen</h3>
<form method="POST" action="origen.php">
Usuario: <input type="text" name="usuario"><br><br>
Password: <input type="text" name="pass"><br><br>
<input type="submit" name="submit" value="Entrar">
</form>
';


if(isset($_POST["usuario"]) and isset($_POST["pass"])){

session_start();

$_SESSION["usuario"]=$_POST["usuario"];
$_SESSION["pass"]=$_POST["pass"];


}

echo '<a href="destino.php">Destino</a>';


?>