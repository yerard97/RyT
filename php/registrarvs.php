<?php
session_start();
include_once "dbconfig.php";

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());

$var = $_SESSION['idvalsal'];
$partida=$_POST["partida"];
$cantidad=$_POST["cantidad"];
$unidad=$_POST["unidad"];
$descripcion=$_POST["descripcion"];
$cantidade=$_POST["cantidade"];

$insertar="insert into detallevs values ($var,1,'$partida',$cantidad,'$unidad','$descripcion',$cantidade);";


$resultado=mysqli_query($mysqli,$insertar);

mysqli_close($mysqli);

echo "<script type='text/javascript'>
       location.href='../vale.php'
        </script>"

?>