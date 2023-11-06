<?php
include("header.php"); //cabecera

include("../modelo/conexion.php"); //establecer conexion a la base de datos
session_start(); //iniciar sesion

$usuario = $_SESSION["usuario"];

if (!isset($_POST["submit"])) { ?>
    <div class="text-center my-3">
        <h4>¡Hola <?php echo $usuario; ?>!</h4>
        <h4 class="text-primary text-uppercase">Registrar nueva película</h4>
        <p>Para registrar una nueva película, cumplimenta los siguientes campos y pulsar en Registrar:</p>
        <!--formulario para introducir los datos por metodo post-->
        <div class="d-flex flex-column col-4 mx-auto">
            <form method="post" action="registro_peliculas.php">
                <div class="mb-3">
                    <input class="form-control" type="text" name="pelicula" placeholder="Título de la película">
                </div>
                <div class="mb-3">
                    <label class="form-label">Seleccione el género de la película:</label>
                    <select name="genero">
                        <option value="Ciencia ficcion">Ciencia ficción</option> <!--ficcion es el nombre que se incluye en la BD-->
                        <option value="Accion">Acción</option>
                        <option value="Comedia">Comedia</option>
                        <option value="Fantasia">Fantasía</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="number" name="anio" placeholder="Año de producción">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="number" name="disponible" placeholder="Nº de copias disponibles">
                </div>

                <input class="mt-3 mb-3" type="submit" name="submit" value="Registrar película">
            </form>
        </div>
    <?php
} else {
    /*Almacenar valores recibidos del formulario $_POST en variables*/
    $pelicula = $_POST["pelicula"];
    $genero = $_POST["genero"];
    $anio = $_POST["anio"];
    $disponible = $_POST["disponible"];

    /*Almacenar consulta en variable*/
    $consulta = "INSERT INTO peliculas(idpelicula, pelicula, genero, anio,disponible) VALUES ('','$pelicula','$genero','$anio','$disponible')";

    /*Ejecutar consulta y almacenar en una variable para luego recorrerla*/
    $paquete = mysqli_query($conexion, $consulta); ?>
        <div class="text-center my-3">
            <p><strong><?php echo $usuario; ?></strong>, se ha agregado correctamente una película con la siguiente información:</p>
            <p class="fw-bold"><?php echo $pelicula; ?></p>
            <p class="fw-bold"><?php echo $genero; ?></p>
            <p>Año de producción: <strong><?php echo $anio; ?></strong></p>
            <p>Nº de copias disponibles: <strong><?php echo $disponible; ?></strong></p>
        </div>
    </div>
<?php
} ?>
<!--opcion salir de la pagina-->
<div class="text-center my-3 border">
    <p>Pulsa para volver al menú principal</p>
    <a class="btn btn-secondary my-3" href="menu_administrador.php">Volver</a>
</div>

<?php
include("footer.php"); //pie de pagina
?>