<?php
		session_start();
        
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Almacén</title>
    <link rel="stylesheet" href="iconos/css/fontello.css">
    <link rel="stylesheet" href="iconos">
    <link rel="stylesheet" href="css/est-menu.css">
    <link rel="stylesheet" href="css/est-alm.css">
    <link rel="stylesheet" href="css/est-modal.css">
</head>
<body>
    <header>
      <img src="imagenes/lg.png" class="img-logoeh" style="width: 80px; margin-top: 7px;">
        <input type="checkbox" id="check">
        <label for="check" class="icon-menu"></label>
    
        <nav class="menu">
            <ul>
              <li><a href="index.html">Inicio</a></li>
              <li><a href="php/logout.php" class="login2">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <h2 style="font-family:cursive; text-align: center; margin-top: -46px; margin-left: 30% " >Almacén</h2>
    </header>
    
    <main>
        <div class="titulo">
            <h1>Vale de Salida</h1>
        </div>
        <form action="php/almac.php" method="post" enctype="application/x-www-form-urlencoded">
          
      <div class="text">
          <div class="t1">
           <h3 style="text-align: center;">Dirección del solicitante:</h3>
           <br/><br/>
           <h3 style="text-align: center;">Solicitante:</h3>
            <br/><br/>
           <h3 style="text-align: center;">Cargo del que solicita:</h3>
           <br/><br/>
           <h3 style="text-align: center;">Recibe</h3>
           <br/><br/>
           <h3 style="text-align: center;">Cargo del que recibe:</h3>
            </div>     
             <div class="t2">                <input type="text" name="areas" placeholder="Escribe algo..." style="height: 20px;" required>
               
               
                <input type="text" name="solicitante" placeholder="Escribe algo..." required>
                
                                              
                <input type="text" name="cargos" placeholder="Escribe algo..." required>

                                              
                <input type="text" name="recibe" placeholder="Escribe algo..." required>
                
                                              
                <input type="text" name="cargor" placeholder="Escribe algo..." required>
            </div>
                 
             
         </div> 
          
           <input type="submit" value="Generar" id="boton">
           
         </form>    
    </main>
    
</body>
</html>