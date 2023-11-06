<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos

//sino se ha hecho submit se muestra el formulario
if (!isset($_POST["submit"])) { ?>
    <div class="text-center my-3">
        <h4>Registro de nuevo usuario</h4>
        <!--formulario para introducir datos-->
        <form method="post" action="registro_cliente.php">
            <div class="pt-3 pb-3">
                <label>Nombre de usuario:</label>
                <input type="text" name="usuario">
            </div>
            <div class="pt-3 pb-3">
                <label>Password:</label>
                <input type="number" name="pass">
                <p class="fw-lighter">Teclea una clave numérica de 4 dígitos</p>
            </div>
            <input type="submit" name="submit" value="Registrar">
        </form>
        <div class="text-center my-3 border">
            <h6>Si ya estás registrado en nuestra web, accede haciendo LOGIN con tu usuario y contraseña</h6>
            <a class="btn btn-primary my-3" href="login.php">LOGIN</a>
        </div>
    <?php

    //si se ha hecho submit conservamos los valores 
} else {
    //variables para almacenar lo que le llega por $_POST
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    //Escribir la consulta: por defecto sera usuario cliente admin = 0
    $consulta = "INSERT INTO `usuarios`(`idusuario`, `usuario`, `password`, `admin`) VALUES ('','$usuario','$pass','0')";

    //Ejecutar consulta de registro
    $paquete = mysqli_query($conexion, $consulta);

    ?>
        <!--mostramos texto de registro correcto y dirigimos al LOGIN-->
        <div class="text-center pt-3 pb-3">
            <p> Usuario registrado correctamente</p>
            <p> Haz click en LOGIN para acceder a nuestra web </p>
            <a class="btn btn-primary my-3" href="login.php">LOGIN</a>
        </div>

    <?php
}
include("footer.php"); //pie de pagina
    ?>