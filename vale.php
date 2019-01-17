<?php
session_start();
include_once "php/dbconfig.php";

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
$var = $_SESSION['idvalsal'];
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
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
    
</head>

<script type="text/javascript">
    
     async function eliminar(){
        
            const {value:url} =  await Swal({
                title: 'Escribe el No. Partida del producto a eliminar',
              input: 'text',
              inputPlaceholder: 'Enter the URL'
            })

            if (url) {
                //alert(url);
                location.href ='php/eliminarVS.php?variable1='.concat(url);


               
               // echo "PHPvariable = ".$as;
               // echo "<script>alert('asdfgbhn')
                //echo "DELETE FROM detallevs WHERE NoPartida=$as && dvsvaleSalida=$var;";
                //$mysqli->query("DELETE FROM detallevs WHERE NoPartida=$as && dvsvaleSalida=$var;");
               
            }
        
         
        
         
     }
   
    
    </script>
    
    
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
           <br/><br/>
           <h3 style="text-align: center;">Cantidad:</h3>
            <br/><br/>
           <h3 style="text-align: center;">Unidad de medida:</h3>
           <br/><br/>
           <h3 style="text-align: center;">Descripción:</h3>
           <br/><br/>
           <h3 style="text-align: center;">Cantidad entregada:</h3>
           
            </div>   
            
            <form action="php/registrarvs.php" method="post">
            
             <div class="t2">                <input type="text" name="partida" id="producto" placeholder="Escribe algo..." style="height: 20px;" required>                
               
                <input type="text" name="cantidad" id="descripcion" placeholder="Escribe algo..." required> 
                 
                 
                <input type="text" name="unidad" id="cantidad" placeholder="Escribe algo..." required >
                
                
                <input type="text" name="descripcion" id="cantidad" placeholder="Escribe algo..." required >
                
                <input type="text" name="cantidade" id="cantidad" placeholder="Escribe algo..." required >
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
                   
                       <input type="submit" value="Eliminar" id="boton10" onclick="eliminar()">
                   
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
                         $var = $_SESSION['idvalsal'];
                   $sql="SELECT NoPartida,dvsCantidad,dvsUnidadMedida,dvsDescripcion,dvsCantidadEntregada from detallevs where dvsvaleSalida= $var";
                   $result=mysqli_query($mysqli,$sql);
                    
                   while($mostrar=mysqli_fetch_array($result)){
                     ?>  
                   
                 <tr>
                     <td><?php echo $mostrar['NoPartida']?></td>
                     <td><?php echo $mostrar['dvsCantidad']?></td>
                     <td><?php echo $mostrar['dvsUnidadMedida']?></td>
                     <td><?php echo $mostrar['dvsDescripcion']?></td>
                     <td><?php echo $mostrar['dvsCantidadEntregada']?></td>
                 </tr>
                    <?php
                   }
                     ?>
                     </table>
                 </div>
             
         </div> 
         <div id="id1"></div>
           
        
    </main>
    
</body>
</html>