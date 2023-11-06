<?php
/*Realizar conexion a bd*/
include("conexion.php");

if (!isset($_POST["submit"])) { ?>
<html>

<body>
<h2>Registro de nuevo usuario</h2>
    <!--formulario para introducir datos-->
    <form method="post" action="registro_clientes.php">
        NOMBRE DE USUARIO: <input type="text" name="nombre">
        PASSWORD: <input type="text" name="pass">
        <input type="submit" name="submit" value="Registrar">
</body>

</html>
<?php

} else {
    /*variables para almacenar lo que le llega por $_POST*/
    $nombre = $_POST["nombre"];
    $pass = $_POST["pass"];

    /*Escribir la consulta: 0 si es cliente, 1 Admin*/
    $consulta = "INSERT INTO `usuarios`(`idusuario`, `usuario`, `password`, `admin`) VALUES ('','$nombre','$pass','0')";

    /*Ejecutar consulta de registro*/
    $paquete = mysqli_query($conexion, $consulta);

?>
<html>

<body> Registrado correctamente </body>

</html>
<?php
}
?>