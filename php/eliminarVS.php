<?php
include_once "dbconfig.php";
session_start();
$NoPartida = $_GET['variable1'];
$var = $_SESSION['idvalsal'];


$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
echo "<!doctype html>
            <html>
            <head>
                <title>Almacén</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                
            </head>
                </html>";
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
;
$result = mysqli_query($mysqli, "select dvsvaleSalida from detallevs where NoPartida='$NoPartida';");
//echo mysqli_fetch_assoc ($result);
if(mysqli_fetch_assoc ($result) == null){
        echo " 
            <script type='text/javascript'>
            swal('Producto no encontrado');
            setTimeout(function(){ location.href ='../vale.php';}, 1000); 
            </script>";
}else{

$mysqli->query("DELETE FROM detallevs WHERE NoPartida=$NoPartida && dvsvaleSalida=$var;");
//echo $mysqli;
if($mysqli){

           	echo " 
            <script type='text/javascript'>
            swal('Eliminado Correctamente');
            setTimeout(function(){ location.href ='../vale.php';}, 1000); 
            </script>";
}}
?>