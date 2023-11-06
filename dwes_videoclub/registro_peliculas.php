<?php
/*realizar conexion a BD*/
include("conexion.php");

if (!isset($_POST["submit"])) { ?>

<html>

<body>
    <h2>Registro de nueva película</h2>
    <form method="post" action="registro_peliculas.php">
        <!--formulario para introducir datos-->
        TITULO PELICULA: <input type="text" name="pelicula">
        GENERO: <select name="genero">
            <option value="ficcion">Sci-Fi</option> <!--ficcion es el nombre que se incluye en la BD-->
            <option value="accion">Acción</option>
            <option value="comedia">Comedia</option>
            <option value="fantasia">Fantasia</option>
        </select>
        AÑO: <input type="text" name="anio">
        <input type="submit" name="submit" value="Registrar película">

</body>
<html>

<?php
}else{
    /*Almacenar valores recibidos del formulario $_POST en variables*/
    $pelicula=$_POST["pelicula"];
    $genero=$_POST["genero"];
    $anio=$_POST["anio"];

    /*Almacenar consulta en variable*/
    $consulta="INSERT INTO `peliculas`(`idpelicula`, `pelicula`, `genero`, `anio`) VALUES ('','$pelicula','$genero','$anio')";

    /*Ejecutar consulta y almacenar en una variable para luego recorrerla*/
    $paquete=mysqli_query($conexion,$consulta);?>
    <html>
        <body>
            Datos agregados correctamente
        </body>
    </html>

<?php
}?>