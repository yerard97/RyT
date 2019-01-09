<?php
include_once "dbconfig.php";
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
//$user = $_POST['usuario']; 
//$pass = $_POST['password'];
$user = 'dante' ;
$pass = '1234';
$result = mysqli_query($mysqli, "select Password from usuariosistema where user='$user';");
$row = mysqli_fetch_assoc($result);
$hash = $row['Password'];
	if (password_verify($pass, $hash)) {	
		
		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $row['Name'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
		
		echo "<div class='alert alert-success' role='alert'><strong>Welcome!</strong> $row[Name]			
		<p><a href='edit-profile.php'>Edit Profile</a></p>	
		<p><a href='logout.php'>Logout</a></p></div>";	
	
	} else {
		echo "<div class='alert alert-danger' role='alert'>Email or Password are incorrects!
		<p><a href='login.html'><strong>Please try again!</strong></a></p></div>";			
	}
print_r($row);
?>