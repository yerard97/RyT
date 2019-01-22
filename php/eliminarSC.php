<?php
include_once "dbconfig.php";
session_start();


$var1=explode(',',$_GET['variable1']);
$var = $_SESSION['idsolcomp'];
$variable1=$var1[0];
$variable2=$var1[1];

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
echo "<!doctype html>
            <html>
            <head>
                <title>Administración</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                
            </head>
                </html>";
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
$result = mysqli_query($mysqli, "select dscDescripcion from detallesc where dscDescripcion like '$variable2' && dscNombre like '$variable1';");
//echo mysqli_fetch_assoc ($result);
if(mysqli_fetch_assoc ($result) == null){
        echo " 
            <script type='text/javascript'>
           swal('Producto no encontrado');
            setTimeout(function(){ location.href ='../solicitud.php';}, 1000); 
            </script>";
}else{

$mysqli->query("DELETE FROM detallesc WHERE dscsolicitudCompra=$var && dscDescripcion like '$variable2' && dscNombre like '$variable1';");
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