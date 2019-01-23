<?php
session_start();
include_once "php/dbconfig.php";

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Radio y Televisión</title>
    <link rel="stylesheet" href="iconos/css/fontello.css">
    <link rel="stylesheet" href="iconos">
    <link rel="stylesheet" href="css/est-menu.css">
    <link rel="stylesheet" href="css/est-cont-rep.css">
    <link rel="stylesheet" href="css/est-modal.css">
</head>
<body>
    <header>
      <img src="imagenes/lg.png" class="img-logoeh" style="width: 80px; margin-top: 7px;">
        <input type="checkbox" id="check">
        <label for="check" class="icon-menu"></label>
    
        <nav class="menu">
            <ul>
              <li><a href="php/logout.php" class="login2">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    
    <main >
       
        <div class="titulo">
            <h1>Reporte</h1>
        </div>
        <form action="Pag/resguardoMovEqui.php" method="post" enctype="application/x-www-form-urlencoded">    
         <div class="text">
                
                 <h3 style="text-align: center;">Área de Adscripción:</h3>&nbsp &nbsp &nbsp
                
                 <input type="text" name="aread" placeholder="Localidad Asignada" id="areaads"  >
                 
         </div>        
         
            <div class="text1">
             <h3 style="text-align: center;">Responsable:</h3>&nbsp &nbsp &nbsp 
            
             <input type="text" name="res" placeholder="Responsable de Artículos" id="user">
             
             
        </div>
             
             <input type="submit" value="Generar" id="boton">

         </form>
           
    </main>
</body>
</html>