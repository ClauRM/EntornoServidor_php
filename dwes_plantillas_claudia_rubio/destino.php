<?php

session_start();
echo $_SESSION['usuario'].'<br>';
echo $_SESSION['pass'].'<br>';

if(($_SESSION['usuario'] =='claudia')and($_SESSION['pass'] =='123')){
	echo "Entrar";
	
}else{
	echo "Usuario o password incorrecta";
	
}

echo '<a href="origen.php">Origen</a>';

?>