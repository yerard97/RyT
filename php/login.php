<?php
include_once "dbconfig.php";
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
$user = $_POST['usuario']; 
$pass = $_POST['password'];
//$user = 'dante' ;
//$pass = '1234';
$result = mysqli_query($mysqli, "select Password from usuariosistema where user='$user';");
$row = mysqli_fetch_assoc($result);
$hash = password_hash($row['Password'],PASSWORD_DEFAULT);
	if (password_verify($pass, $hash)) {	
		session_start();
        
        $_SESSION['name'] = $user;					
		
		echo "<script type='text/javascript'>
        alert('Bienvenido');
        location.href ='../index.html#openmodal';
        </script>
        ";
	
	} else {
		echo "<script type='text/javascript'>
        alert('Usuario o Contraseña Incorrectos');
        location.href ='../index.html#openmodal';
        </script>
        ";			
	}
//print_r($row['Password']);
?>