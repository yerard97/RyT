<?php

include_once "dbconfig.php";

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());

$producto=$_POST["producto"];
$descripcion=$_POST["descripcion"];
$cantidad=$_POST["cantidad"];

$insertar="INSERT INTO detallesc (dscsolicitudCompra,dscCantidad,dscDescripcion,dscNombre) VALUES ('100','$cantidad','$descripcion','$producto')";


$resultado=mysqli_query($mysqli,$insertar);

mysqli_close($mysqli);

echo "<script type='text/javascript'>
        location.href='../solicitud.php'
        </script>"

?>