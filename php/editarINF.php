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
$status=$var1[1];
$responsable=$var1[2];
$obser=$var1[3];


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
    
if ($noinv==null){
                echo " 
            <script type='text/javascript'>
            swal('Error! Inserta el No.Inv. a editar');
            setTimeout(function(){ location.href ='../inf.php';}, 500); 
            </script>";
}else{

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
if ($status!=null){
    if($mysqli->query("UPDATE mobiliarioyequipo SET Status='$status' WHERE `No.Inv.`='$noinv';")){
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
if($cont>0){
    echo " 
            <script type='text/javascript'>
            swal('Editado Correctamente');
            setTimeout(function(){ location.href ='../inf.php';}, 500); 
            </script>";
}else if($cont1>0){
    echo " 
            <script type='text/javascript'>
            swal('Error en editar ciertos campos');
            setTimeout(function(){ location.href ='../inf.php';}, 500); 
            </script>";
} else{
    echo " 
            <script type='text/javascript'>
            swal('¡No editaste ningún campo!');
            setTimeout(function(){ location.href ='../inf.php';}, 1000); 
            </script>";
}   
}

}
mysqli_close($mysqli);