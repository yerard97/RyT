<?php
include_once "dbconfig.php";

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
$user = $_POST['usuario']; 
$pass = $_POST['password'];
$lugar =$_POST['lugar'];
if($lugar=='SG'){
    $l='Servicios Generales';
}else if($lugar=='INF'){
    $l='Informatica';
}else if($lugar=='CONT'){
    $l='Contraloria';
}else if($lugar=='ADM'){
    $l='Administracion';
}else if($lugar=='ALM'){
    $l='Almacen';
}
$result = mysqli_query($mysqli, "SELECT password,dNombre FROM usuariosistema us,usuario u ,departamentos d where us.idUsuariosSistema=u.idUsuario && d.idDepartamentos = u.uidDepartamentos &&  user='$user';");

$row = mysqli_fetch_assoc($result);
$hash = password_hash($row['password'],PASSWORD_DEFAULT);
	if (password_verify($pass, $hash)) {
        //echo $lugar;
        //echo $l;
         //echo strcasecmp($l,$row['dNombre']);
        if(strcasecmp($l,$row['dNombre'])==0){
            
            
		session_start();
        
        $_SESSION['user'] = $user;					
		//print_r($lugar);
     echo "       <!doctype html>
            <html>
            <head>
                <title>Bienvenido</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                

            </head>
                </html>";
   // echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
	echo " 
    <script type='text/javascript'>
    
        swal('Bienvenido');
        
        var val=' $lugar';
        if(val.trim()==='SG'){
             setTimeout(function(){  location.href ='../sg.php';}, 1000);
        }else if(val.trim()==='INF'){
                 setTimeout(function(){  location.href ='../inf.php';}, 1000);
        }else if(val.trim()==='CONT'){
                 setTimeout(function(){  location.href ='../cont.html';}, 1000);
        }else if(val.trim()==='ADM'){
                 setTimeout(function(){  location.href ='../adm.php';}, 1000);
        }else if(val.trim()==='ALM'){
                setTimeout(function(){  location.href ='../alm.php';}, 1000); 
        }
        </script>";
	   } else{
                 echo "       <!doctype html>
            <html>
            <head>
                <title>Error</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                

            </head>
                </html>";
            	echo "
                <script type='text/javascript'>

        swal('Área no asignada');
        var val=' $lugar';
             setTimeout(function(){location.href ='../index.html';}, 1000); 
        </script>";
        }
	} else {
        echo "       <!doctype html>
            <html>
            <head>
                <title>Cuidado!</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                

            </head>
                </html>";
		echo "<script type='text/javascript'>
        swal('Usuario o Contraseña Incorrectos');
        
        setTimeout(function(){location.href ='../index.html';}, 1000); 
        </script>
        ";			
	}

//print_r($row['Password']);
?>