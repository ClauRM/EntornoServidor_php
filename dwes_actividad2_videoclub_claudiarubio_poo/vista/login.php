<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos
session_start(); //iniciar sesion

//sino se ha hecho submit se muestra el formulario
if (!isset($_POST["submit"])) { ?>
    <div class="text-center my-3">
        <h4>Accede a nuestro videoclub con tu usuario y contraseña</h4>
        <!--formulario de acceso metodo post-->
        <form method="post" action="login.php">
            <div class="pt-3 pb-3">
                <label>Nombre de usuario:</label>
                <input type="text" name="usuario">
            </div>
            <div class="pt-3 pb-3">
                <label>Password:</label>
                <input type="number" name="pass">
                <p class="fw-lighter">Tu clave numérica de 4 dígitos</p>
            </div>
            <div class="pt-3 pb-3">
                <input type="submit" name="submit" value="Entrar">
            </div>
        </form>
    </div>
    <!--si no es usuario se dirige a la pagina de registro-->
    <div class="text-center my-3 border">
        <h6>Si eres un nuevo usuario, regístrate en nuestra web </h6>
        <a class="btn btn-primary my-3" href="registro_cliente.php">REGISTRO</a>
    </div>

    <?php
    //si se ha hecho submit conservamos los valores 
} else {

    $_SESSION["usuario"] = $_POST["usuario"];
    $_SESSION["pass"] = $_POST["pass"];

    //realizamos la consulta a la bbdd
    $consulta = "select * from usuarios where usuario = '" . $_SESSION["usuario"] . "' and password = '" . $_SESSION["pass"] . "'"; ////////////////// hacer busqueda con where con usuaio y pass
    // SELECT * FROM `usuarios` WHERE `usuario`="mateo" AND `password`="1234";
    //$paquete = mysqli_query($conexion, $consulta); // se ejecuta la query y se atrapa el resultado en un paquete
    $paquete = $conexion->query($consulta); //poo

    $encontrado = 0;

    //mientras el paquete no esta vacio hacemos filas
    //while ($fila = mysqli_fetch_array($paquete)) {
    while ($fila = $paquete->fetch_array()) { //poo
        if ($_SESSION["usuario"] == $fila['usuario'] and $_SESSION["pass"] == $fila['password']) {
            $encontrado = 1;
            $_SESSION["idusuario"] = $fila["idusuario"]; //almaceno el id de ese usuario
            $_SESSION["admin"] = $fila["admin"];
        }
    }

    //si se ha encontrado, se verifica si es cliente o administrador
    if ($encontrado == 1) {
        //debe verificar si el usuario es admin o cliente para redirigir a la siguiente pagina
        if ($_SESSION["admin"] == 0) {
            header('Location: menu_cliente.php');  //ir al menu cliente
        } else {
            header('Location: menu_administrador.php'); //ir al menu administrador
        }
    } else { ?>
        <!--sino muestra mensaje e indica que vuelva a probar sesion-->
        <div class="text-center pt-3 pb-3">
            <p> Usuario o contraseña incorrectas</p>
            <p> Prueba nuevamente tu LOGIN </p>
            <a class="btn btn-primary my-3" href="login.php">LOGIN</a>
            <p> O regístrate en nuestra web si eres un nuevo usuario </p>
            <a class="btn btn-primary my-3" href="registro_cliente.php">REGISTRO</a>
        </div>
<?php
        $conexion->close(); //cerrar la conexion a la bd
    }
}
include("footer.php"); //pie de pagina
?>