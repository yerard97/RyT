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
    <title>Administración</title>
    <link rel="stylesheet" href="iconos/css/fontello.css">
    <link rel="stylesheet" href="iconos">
    <link rel="stylesheet" href="css/est-menu.css">
    <link rel="stylesheet" href="css/est-solicitud.css">
    <link rel="stylesheet" href="css/est-modal.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
</head>
<script type="text/javascript">
    
     /*async function eliminar(){
        
            const {value:url} =  await Swal({
               title:"Nombre y descripción del producto a eliminar",
               html:'<input id="val1" placeholder="Nombre del producto" required>'+'<br/>'+'<br/>'+'<input id="val2" placeholder="Descripción del producto" required>',
                focusConfirm:false,
                preConfirm:()=>{
                            return[
                                document.getElementById('val1').value,
                                document.getElementById('val2').value
                            ]
                            }
            })

            if (url) {
                
                //alert(xyz[0]);
                //alert(xyz[1]);
                
                location.href ='php/eliminarSC.php?variable1='.concat(url);
                

               
               // echo "PHPvariable = ".$as;
               // echo "<script>alert('asdfgbhn')
                //echo "DELETE FROM detallevs WHERE NoPartida=$as && dvsvaleSalida=$var;";
                //$mysqli->query("DELETE FROM detallevs WHERE NoPartida=$as && dvsvaleSalida=$var;");
               
            }
        
         
        
         
     }*/
    
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
        <h2 style="font-family:cursive; text-align: center; margin-top: -46px; margin-left: 30% " >Administración</h2>
    </header>
    
    <main>
        <div class="titulo">
            <h1>Solicitud de Compra</h1>
        </div>
          
           <div class="text">
          <div class="t1">
           <h3 style="text-align: center;">Producto:</h3>
           <br/><br/><br/>
           <h3 style="text-align: center;">Descripción:</h3>
            <br/><br/><br/>
           <h3 style="text-align: center;">Cantidad:</h3>
            </div>   
            
            <form action="php/registrarsc.php" method="post">
            
             <div class="t2">                <input type="text" name="producto" id="producto" placeholder="Escribe algo..." style="height: 20px;" required> 
               
                <input type="text" name="descripcion" id="descripcion" placeholder="Escribe algo..." required>  
                                    
                <input type="text" name="cantidad" id="cantidad" placeholder="Escribe algo..." required >
                 
                  <input type="submit" value="Insertar" id="boton">
            </div>
                </form> 
                
                  <form action="Pag/solicitudCompra.php" method="post" class="btn">
                      <input type="submit" value="Generar" id="boton1">
                  </form> 
                  <div class="nuevo">
                   <a href="adm.php"><input type="submit" value="Realizar nueva solicitud" id="boton2"></a>
                     <!--<input type="submit" value="Eliminar" id="boton10" onclick="eliminar()">-->
                   </div>
                 <div class="tabla">
                     <table>
                  <thead>
                    <tr style="background: #118327;">
                         <th>PRODUCTO</th>
                         <th>DESCRIPCIÓN</th>
                         <th>CANTIDAD</th>
                         <th>ACCION</th>
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
                     <form action="php/deletesc.php" method="post" name="form">
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