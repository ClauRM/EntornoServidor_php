<?php

session_start();

echo $_SESSION["usuario"];
echo '<br>';
echo $_SESSION["pass"];

if ($_SESSION["usuario"]=='claudia' and $_SESSION["pass"]=='1234'){

echo '<br>';
echo 'Hola claudia';

} else {

echo '<br>';
echo 'error en los datos';

}

echo '<br>';
echo '<a href="origen.php">Origen</a>';

?>