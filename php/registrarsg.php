<?php
session_start();
include_once "dbconfig.php";

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());



$var1=explode(',',$_GET['variable1']);
//$var3=('1234,dwef,xcv,Informatica,we,Dante,120,80,dfgh,dfg,dfg,sdfg,er,dfg,dfg,fg,dfg,23');
//$var1=explode(',',$var3);

$noinv=$var1[0];
$nombre=$var1[1];
$descripcion=$var1[2];

$factura=$var1[3];
$responsable=$var1[4];
$costoc=$var1[5];
$costos=$var1[6];
$status=$var1[7];
$serie=$var1[8];
$obser=$var1[9];
$color=$var1[10];
$material=$var1[11];
$marca=$var1[12];
$modelo=$var1[13];
$formac=$var1[14];

$iva=$var1[15];

echo "<!doctype html>
            <html>
            <head>
                <title>Administración</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                
            </head>
                </html>";

$result=mysqli_query($mysqli,"SELECT id FROM mobiliarioyequipo ORDER BY id DESC limit 1;");
$row1=mysqli_fetch_assoc($result);
$lastr=($row1['id']+1);
if($lastr==null){
    $lastr=1;
}
$result=mysqli_query($mysqli,"SELECT idUsuario FROM usuario WHERE nombre LIKE '$responsable';");
$row=mysqli_fetch_assoc($result);
$row=$row['idUsuario'];




if($busqueda = mysqli_query($mysqli,"SELECT `No.Inv.` FROM mobiliarioyequipo WHERE `No.Inv.` ='$noinv';"))
{

$rows_count=$busqueda->num_rows;
        if ($rows_count>0){

              echo " 
            <script type='text/javascript'>
            
            swal('Número de inventario repetido');
            setTimeout(function(){ location.href ='../sg.php';}, 500); 
            </script>";
        
        }else{
        
            $insertar="INSERT INTO mobiliarioyequipo VALUES ($lastr,$row,'$noinv','$descripcion','$color',
            '$material','$marca','$modelo','$serie','$nombre','$status','$factura','$formac','',$costoc,$costos,'2050-01-21','$obser',$iva,null)";

            if ($nombre==null || $descripcion==null || $color ==null || $material ==null || $marca==null || $modelo ==null || $serie==null || $status==null || $factura==null || $formac==null || $costoc==null || $costos==null || $obser==null || $iva==null || $noinv==null ){
                echo " 
            <script type='text/javascript'>
            swal('Error! Completa todos los campos');
            setTimeout(function(){ location.href ='../sg.php';}, 500); 
            </script>";
            }else{
            
                    $resultado=mysqli_query($mysqli,$insertar);
                echo " 
            <script type='text/javascript'>
            swal('Agregado Correctamente');
            setTimeout(function(){ location.href ='../sg.php';}, 500); 
            </script>";
            }
        }


}else{

}


mysqli_close($mysqli);

?>
