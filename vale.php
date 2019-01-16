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
    <title>Almacén</title>
    <link rel="stylesheet" href="iconos/css/fontello.css">
    <link rel="stylesheet" href="iconos">
    <link rel="stylesheet" href="css/est-menu.css">
    <link rel="stylesheet" href="css/est-vale.css">
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
          
           <div class="text">
          <div class="t1">
           <h3 style="text-align: center;">No. Partida:</h3>
           <br/><br/><br/>
           <h3 style="text-align: center;">Cantidad:</h3>
            <br/><br/><br/>
           <h3 style="text-align: center;">Unidad de medida:</h3>
           <br/><br/><br/>
           <h3 style="text-align: center;">Descripción:</h3>
           <br/><br/><br/>
           <h3 style="text-align: center;">Cantidad entregada:</h3>
           
            </div>   
            
            <form action="php/registrarvs.php" method="post">
            
             <div class="t2">                <input type="text" name="producto" id="producto" placeholder="Escribe algo..." style="height: 20px;" required> 
               
                <input type="text" name="descripcion" id="descripcion" placeholder="Escribe algo..." required>  
                                    
                                    
                <input type="text" name="cantidad" id="cantidad" placeholder="Escribe algo..." required >
                                  
                 
                <input type="text" name="cantidad" id="cantidad" placeholder="Escribe algo..." required >
                
                <input type="text" name="cantidad" id="cantidad" placeholder="Escribe algo..." required >
                  <div class="ins">
                  <input type="submit" value="Insertar" id="boton">
                  </div>
            </div>
                </form> 
                
                  <form action="Pag/resguardoMovEqui.php" method="post" class="btn">
                      <input type="submit" value="Generar" id="boton1">
                  </form> 
                  
                   <div class="nuevo">
                   <a href="alm.php"><input type="submit" value="Realizar nuevo vale" id="boton2"></a>
                   </div>
                   
                 <div class="tabla">
                     <table>
                  <thead>
                    <tr style="background: #118327;">
                         <th>No. PARTIDA</th>
                         <th>CANTIDAD</th>
                         <th>UNIDAD DE MEDIDA</th>
                         <th>DESCRIPCION</th>
                         <th>CANTIDAD ENTREGADA</th>
                     </tr>
                 </thead> 
                 
                 <?php
                         $var = $_SESSION['idsolcomp'];
                   $sql="SELECT * from detallesc where dscsolicitudCompra= $var";
                   $result=mysqli_query($mysqli,$sql);
                    
                   while($mostrar=mysqli_fetch_array($result)){
                     ?>  
                   
                 <tr>
                     <td><?php echo $mostrar['dscNombre']?></td>
                     <td><?php echo $mostrar['dscDescripcion']?></td>
                     <td><?php echo $mostrar['dscCantidad']?></td>
                 </tr>
                    <?php
                   }
                     ?>
                     </table>
                 </div>
             
         </div> 
         
           
         </form>    
    </main>
    
</body>
</html>