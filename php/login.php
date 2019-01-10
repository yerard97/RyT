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
$result = mysqli_query($mysqli, "SELECT password,dNombre FROM usuariosistema us,usuario u ,departamentos d where us.idUsuariosSistema=u.idUsuario && d.idDepartamentos = u.idDepartamentos &&  user='$user';");
$row = mysqli_fetch_assoc($result);
$hash = password_hash($row['password'],PASSWORD_DEFAULT);
	if (password_verify($pass, $hash)) {
       // echo $row['dNombre'];
        //echo $l;
         //echo strcasecmp($l,$row['dNombre']);
        if(strcasecmp($l,$row['dNombre'])==0){
            
            
		session_start();
        
        $_SESSION['user'] = $user;					
		//print_r($lugar);
     echo "       <!doctype html>
            <html>
            <head>
                <title>Sweet Alert Plugin</title>
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
            location.href ='../sg.html';
        }else if(val.trim()==='INF'){
            //location.href ='../inf.html';
        }else if(val.trim()==='CONT'){
            location.href ='../cont.html';
        }else if(val.trim()==='ADM'){
            location.href ='../adm.html';
        }else if(val.trim()==='ALM'){
            location.href ='../alm.html';
        }
        </script>";
	   } else{
            	echo "<script type='text/javascript'>
        alert('Error area no asignada');
        var val=' $lugar';
            location.href ='../index.html';
        </script>";
        }
	} else {
		echo "<script type='text/javascript'>
        alert('Usuario o Contraseña Incorrectos');
        location.href ='../index.html#openmodal';
        </script>
        ";			
	}

//print_r($row['Password']);
?>