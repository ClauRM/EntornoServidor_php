<?php
include("conexion.php");

/*Almacenar la consulta */
$consulta = "SELECT * FROM `peliculas`";
/*Ejecutar la consulta */
$paquete = mysqli_query($conexion, $consulta);

$contador = null; //variable para contar los registros
/*sumar contador cada vez que haya una linea en el $paquete*/
while ($fila = mysqli_fetch_array($paquete)) {
    $contador++; //a cada vuelta el contador se incrementa
} ?>

<html>

<body>
    El número de peliculas es: <?php echo $contador ?>
</body>

</html>