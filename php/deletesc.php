<?php
include_once "dbconfig.php";
session_start();


$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");



$mysqli->set_charset("utf8");

if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
$result = mysqli_query($mysqli,"SELECT dscNombre FROM detallesc WHERE dscNombre='$_POST[nombre]';");
echo "<!doctype html>
            <html>
            <head>
                <title>Administración</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                
            </head>
                </html>";

if(mysqli_fetch_assoc ($result) == null){
    echo " 
    <script type='text/javascript'>
   //   swal('Producto no encontrado');
   alert('te la mcomes');
    setTimeout(function(){ location.href ='../solicitud.php';}, 1000); 
    </script>";
       
}else{

    mysqli_query($mysqli,"DELETE FROM detallesc WHERE dscNombre='$_POST[nombre]';");
//echo $mysqli;
if($mysqli){
   
    echo " 
    <script type='text/javascript'>
    swal('Eliminado Correctamente');
    setTimeout(function(){ location.href ='../solicitud.php';}, 1000); 
    </script>";
}
}
?>