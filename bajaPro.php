<?php
session_start();
include_once "php/dbconfig.php";

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
$var = $_SESSION['idsolcomp'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Radio y Televisión</title>
    <link rel="stylesheet" href="iconos/css/fontello.css">
    <link rel="stylesheet" href="iconos">
    <link rel="stylesheet" href="css/est-menu.css">
    <link rel="stylesheet" href="css/est-bajaPro.css">
    <link rel="stylesheet" href="css/est-modal.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
</head>
<script type="text/javascript">
    
     async function obs(){
        
            const {value:url} =  await Swal({
               title:"Observaciones",
               html:'<textarea id="val1" style="width:250px;height:100px;" placeholder="Observación de producto(s)" required></textarea>',
                focusConfirm:false,
                preConfirm:()=>{
                            return[
                                document.getElementById('val1').value,
                            ]
                            }
            })

            if (url) {
                
                
                location.href ='Pag/valePres.php?variable1='.concat(url);
                

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
              <li><a href="php/logout.php" class="login2">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <div class="titulo">
            <h1>Baja de producto(s)</h1>
        </div>
          
           <div class="text">
          <div class="t1">
           <h3 style="text-align: center;">No. Inventario:</h3>
           <br/><br/><br/>
           <h3 style="text-align: center;">Nombre:</h3>
            <br/><br/><br/>
           <h3 style="text-align: center;">Estado Actual:</h3>
            <br/><br/><br/>
           <h3 style="text-align: center;">Motivo de Baja:</h3>
            </div>   
            
            <form action="php/registrarbaja.php" method="post">
            
             <div class="t2">             
                 <input type="text" name="producto" id="producto" placeholder="Escribe algo..." style="height: 20px;" required> 
               
                <input type="text" name="descripcion" id="descripcion" placeholder="Escribe algo..." required>  
                                    
                                    
                <input type="text" name="cantidad" id="cantidad" placeholder="Escribe algo..." required >
                                     
                                     
                <input type="text" name="cantidad" id="cantidad" placeholder="Escribe algo..." required >
                 
                  <input type="submit" value="Insertar" id="boton">
            </div>
                </form> 
                
                   
                      <input class="btn" type="submit" value="Continuar" id="boton1" onclick="obs()">
                   
                  
                  <div class="nuevo">
                   <a href="baja.html"><input type="submit" value="Realizar nueva solicitud" id="boton2"></a>
                     <!--<input type="submit" value="Eliminar" id="boton10" onclick="eliminar()">-->
                   </div>
                   
                 <div class="tabla">
                     <table>
                  <thead>
                    <tr style="background: #118327;">
                         <th>No.INV.</th>
                         <th>NOMBRE</th>
                         <th>ESTADO ACTUAL</th>
                         <th>MOTIVO DE BAJA</th>
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
                     <td>
                     <form action="php/deletebaja.php" method="post" name="form">
                        <input type="hidden" name="nombre" value="<?php echo $mostrar['dscNombre']; ?>"/>
                        <input type="submit" value="Borrar" style="background-color:red;color:white; border-radius:10px;width:50px; height:30px; font-size:14px;font-weight:bold; cursor:pointer;" />
                        </form>


                    </td>

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