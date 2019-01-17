<?php
include_once "dbconfig.php";
session_start();
$NoPartida = $_GET['variable1'];
$var = $_SESSION['idsolcomp'];


$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
$mysqli->query("DELETE FROM detallesc WHERE NoPartida=$NoPartida && dvsvaleSalida=$var;");
//echo $mysqli;
if($mysqli){
            echo "<!doctype html>
            <html>
            <head>
                <title>Administración</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                
            </head>
                </html>";
           	echo " 
            <script type='text/javascript'>
            swal('Eliminado Correctamente');
            setTimeout(function(){ location.href ='../solicitud.php';}, 1000); 
            </script>";
}
?>