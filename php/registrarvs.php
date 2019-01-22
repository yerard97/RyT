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
echo "<!doctype html>
            <html>
            <head>
                <title>Administración</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                
            </head>
                </html>";

//$busqueda=mysql_query($mysqli,"SELECT NoPartida from detallevs where NoPartida= $partida");
if($busqueda = mysqli_query($mysqli,"SELECT NoPartida FROM detallevs WHERE NoPartida='$partida';"))
{
        $rows_count=$busqueda->num_rows;
        if ($rows_count>0){

                echo " 
    <script type='text/javascript'>
   swal('Producto ya Insertado');
    setTimeout(function(){ location.href ='../vale.php';}, 10000); 
    </script>";
        
        
        }else{
        
                $insertar="insert into detallevs values
                ($var,1,'$partida',$cantidad,'$unidad','$descripcion',$cantidade);";
                $resultado=mysqli_query($mysqli,$insertar);
                echo " 
                <script type='text/javascript'>
                swal('Producto insertado Correctamente');
                setTimeout(function(){ location.href ='../vale.php';}, 1000); 
                </script>";
               
        }


}else{

}


mysqli_close($mysqli);

echo "<script type='text/javascript'>
       location.href='../vale.php'
        </script>"


?>