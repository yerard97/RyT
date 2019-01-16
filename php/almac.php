<?php
		session_start();
    include_once "dbconfig.php";

    $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $mysqli->set_charset("utf8");
    if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
    $are = $_POST['areas']; 
    $solicitante = $_POST['solicitante'];
    $cargos =$_POST['cargos'];
    $recibe=$_POST["recibe"];
    $cargor=$_POST["cargor"];
    $result = mysqli_query($mysqli, "select idUsuario from usuario where nombre like '$solicitante' && puesto like '$cargos';");
    
    $row = mysqli_fetch_assoc($result);
    $usuario =$row['idUsuario'];
    $result = mysqli_query($mysqli, "SELECT idvaleSalida  FROM  valesalida order by idvaleSalida  DESC limit 1;");
    $row1 = mysqli_fetch_assoc($result);
    $lastr =$row1['idvaleSalida'];
    if($lastr==null){
        $lastr=1;
    }
    $lastr+=1;
    $fecha = date("Y-m-d");
    $query = "INSERT INTO valesalida VALUES ($lastr,'$fecha','$are','$solicitante','ING. ARMANDO PICHARDO IBARRA','$recibe','$cargos','ENCARGADO DE LA DIR. COORD.','$cargor');";
    if($mysqli->query($query)){
        $_SESSION['idvalsal'] = $lastr;	

        	echo " 
            <script type='text/javascript'>

            location.href ='../vale.php';

            </script>";
    }else{
        //$mensaje= "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
        $mensaje = "Error Datos incorrectos";
             echo "       <!doctype html>
            <html>
            <head>
                <title>Sweet Alert Plugin</title>
                <script src='../lib/sweetalert.min.js'></script>
                <link rel='stylesheet' type='text/css' href='../lib/sweetalert.css'>
                
            </head>
                </html>";?>
        	<script type='text/javascript'>
            var datos = <?= json_encode($mensaje) ?>;
            swal(datos);
           setTimeout(function(){  location.href ='../vale.php';}, 1000);     
            </script>;
<?php
    }


?>