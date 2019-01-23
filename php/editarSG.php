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
$inv=$var1[16];


echo "<!doctype html>
            <html>
            <head>
                <title>Administración</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                
            </head>
                </html>";

$result=mysqli_query($mysqli,"SELECT `No.Inv.` FROM mobiliarioyequipo WHERE `No.Inv.`=$noinv;");
$row=mysqli_fetch_assoc($result);
if ($row['No.Inv.']==$noinv){
    
$cont=0;
$cont1=0;
    

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
    
if ($nombre!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET Tipo='$nombre' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($descripcion!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET Descripcion='$descripcion' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($factura!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET idFactura='$factura' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
$result=mysqli_query($mysqli,"SELECT idUsuario FROM usuario WHERE nombre LIKE '$responsable';");
$row=mysqli_fetch_assoc($result);
$row=$row['idUsuario'];
if ($responsable!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET idUsuario='$row' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($costoc!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET CostoCIVA='$costoc' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($costos!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET CostoSIVA='$costos' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($status!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET Status='$status' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($serie!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET Serie='$serie' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($obser!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET Observaciones='$obser' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($color!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET Color='$color' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($material!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET Material='$material' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($marca!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET Marca='$marca' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($modelo!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET Modelo='$modelo' WHERE `No.Inv.`='$noinv';")){    echo "Actualizó chido";
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($formac!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET FormaCompra='$formac' WHERE `No.Inv.`='$noinv';")){   echo "Actualizó chido";
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($iva!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET IVA='$iva' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if ($inv!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET `No.Inv.`='$inv' WHERE `No.Inv.`='$noinv';")){
        $cont=$cont+1;
    }else{
        $cont1=$cont1+1;
    }
}
if($cont>0){
    echo " 
            <script type='text/javascript'>
            swal('Editado Correctamente');
            setTimeout(function(){ location.href ='../sg.php';}, 500); 
            </script>";
}else if($cont1>0){
    echo " 
            <script type='text/javascript'>
            swal('Error en editar ciertos campos');
            setTimeout(function(){ location.href ='../sg.php';}, 500); 
            </script>";
} else{
    echo " 
            <script type='text/javascript'>
            swal('¡No editaste ningún campo!');
            setTimeout(function(){ location.href ='../sg.php';}, 1000); 
            </script>";
}   

} }
else
{
    echo " 
            <script type='text/javascript'>
            swal('¡Número de Inventario No Existe!');
            setTimeout(function(){ location.href ='../sg.php';}, 1000); 
            </script>";
}}
mysqli_close($mysqli);
/*echo "<script type='text/javascript'>
       location.href='../sg.php'
        </script>"

?>*/