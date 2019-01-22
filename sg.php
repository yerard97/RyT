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
    <title>Servicios Generales</title>
    <link rel="stylesheet" href="iconos/css/fontello.css">
    <link rel="stylesheet" href="iconos">
    <link rel="stylesheet" href="css/est-menu.css">
    <link rel="stylesheet" href="css/est-sg.css">
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
</head>
<script type="text/javascript">
    function Mostrar(){
     document.getElementById("oculto").style.display ="block";
        document.getElementById("tabla").style.display ="none";
        }
        function Ocultar(){
     document.getElementById("oculto").style.display ="none";
            document.getElementById("tabla").style.display ="block";
        }
        function Mostrar_Ocultar(){
            var oculto=document.getElementById("oculto");
            if(oculto.style.display=="none"){
               Mostrar();
                document.getElementById("boton").value="Ocultar";
               }
            else{
                Ocultar();
                 document.getElementById("boton").value="Mostrar";
            }
        }
    
    async function inserta(){
        
            const {value:url} =  await Swal({
               title:"Inserta las propiedades del nuevo producto",
               html:'<input id="val1" placeholder="Número de Inventario" required>'+'<br/>'+'<br/>'+
                '<input id="val2" placeholder="Nombre del Producto" required>'+'<br/>'+'<br/>'+
                '<input id="val3" placeholder="Descripción" required>'+'<br/>'+'<br/>'+
                '<input id="val4" placeholder="Factura" required>'+'<br/>'+'<br/>'+
                '<input id="val5" placeholder="Responsable" required>'+'<br/>'+'<br/>'+
                '<input id="val6" placeholder="Costo con IVA" required>'+'<br/>'+'<br/>'+
                '<input id="val7" placeholder="Costo sin IVA" required>'+'<br/>'+'<br/>'+
                '<input id="val8" placeholder="Status" required>'+'<br/>'+'<br/>'+
                '<input id="val9" placeholder="Serie" required>'+'<br/>'+'<br/>'+
                '<input id="val10" placeholder="Observaciones" required>'+'<br/>'+'<br/>'+
                '<input id="val11" placeholder="Color" required>'+'<br/>'+'<br/>'+
                '<input id="val12" placeholder="Material" required>'+'<br/>'+'<br/>'+
                '<input id="val13" placeholder="Marca" required>'+'<br/>'+'<br/>'+
                '<input id="val14" placeholder="Modelo" required>'+'<br/>'+'<br/>'+
                '<input id="val15" placeholder="Forma de Compra" required>'+'<br/>'+'<br/>'+
                '<input id="val16" placeholder="IVA" required>',
                focusConfirm:false,
                preConfirm:()=>{
                            return[
                                document.getElementById('val1').value,
                                document.getElementById('val2').value,
                                document.getElementById('val3').value,
                                document.getElementById('val4').value,
                                document.getElementById('val5').value,
                                document.getElementById('val6').value,
                                document.getElementById('val7').value,
                                document.getElementById('val8').value,
                                document.getElementById('val9').value,
                                document.getElementById('val10').value,
                                document.getElementById('val11').value,
                                document.getElementById('val12').value,
                                document.getElementById('val13').value,
                                document.getElementById('val14').value,
                                document.getElementById('val15').value,
                                document.getElementById('val16').value
                            ]
                            }
            })

            if (url) {

                
                location.href ='php/registrarsg.php?variable1='.concat(url);
  }
     }
     
    
    
    
    async function edita(){
        
            const {value:url} =  await Swal({
               title:"Llena sólo los campos a editar",
                html:'<label style="font-family:cursive;">Escribe el no. de inventario del producto: </label>                       <input id="val1" placeholder="Número de Inventario" required>'+'<br/>'+'<br/>'+
                '<label style="font-family:cursive;">Campos a editar:</label>'+'<br/>'+
                '<input id="val0" placeholder="Número de Inventario">'+'<br/>'+'<br/>'+
                '<input id="val2" placeholder="Nombre del Producto">'+'<br/>'+'<br/>'+
                '<input id="val3" placeholder="Descripción">'+'<br/>'+'<br/>'+
                '<input id="val4" placeholder="Factura">'+'<br/>'+'<br/>'+
                '<input id="val5" placeholder="Responsable">'+'<br/>'+'<br/>'+
                '<input id="val6" placeholder="Costo con IVA">'+'<br/>'+'<br/>'+
                '<input id="val7" placeholder="Costo sin IVA">'+'<br/>'+'<br/>'+
                '<input id="val8" placeholder="Status">'+'<br/>'+'<br/>'+
                '<input id="val9" placeholder="Serie">'+'<br/>'+'<br/>'+
                '<input id="val10" placeholder="Observaciones">'+'<br/>'+'<br/>'+
                '<input id="val11" placeholder="Color">'+'<br/>'+'<br/>'+
                '<input id="val12" placeholder="Material">'+'<br/>'+'<br/>'+
                '<input id="val13" placeholder="Marca">'+'<br/>'+'<br/>'+
                '<input id="val14" placeholder="Modelo">'+'<br/>'+'<br/>'+
                '<input id="val15" placeholder="Forma de Compra">'+'<br/>'+'<br/>'+
                '<input id="val16" placeholder="IVA">',
                focusConfirm:false,
                preConfirm:()=>{
                            return[
                                document.getElementById('val1').value,
                                
                                document.getElementById('val2').value,
                                document.getElementById('val3').value,
                                document.getElementById('val4').value,
                                document.getElementById('val5').value,
                                document.getElementById('val6').value,
                                document.getElementById('val7').value,
                                document.getElementById('val8').value,
                                document.getElementById('val9').value,
                                document.getElementById('val10').value,
                                document.getElementById('val11').value,
                                document.getElementById('val12').value,
                                document.getElementById('val13').value,
                                document.getElementById('val14').value,
                                document.getElementById('val15').value,
                                document.getElementById('val16').value,  
                                document.getElementById('val0').value
                            ]
                            }
            })

            if (url) {
                location.href ='php/editarSG.php?variable1='.concat(url);
  }
     }
    
    
    
    async function elimina(){
        
            const {value:url} =  await Swal({
               title:"Escribe los identificadores del producto",
               html:'<input id="val1" placeholder="Número de Inventario" required>'+'<br/>'+'<br/>'+'<input id="val2" placeholder="Número de Serie" required>',
                focusConfirm:false,
                preConfirm:()=>{
                            return[
                                document.getElementById('val1').value,
                                document.getElementById('val2').value
                            ]
                            }
            })

            if (url) {
                location.href ='php/eliminarSG.php?variable1='.concat(url);
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
        <h2 style="font-family:cursive; text-align: center; margin-top: -46px; margin-left: 30%; color: white;" >Servicios Generales</h2>
    </header>
    
    
    <main>
        <div class="titulo">
            <h1>Artículos</h1>
        </div>
         
         <div class="buscar">
                 <h4 >Buscar:</h4>
                 <select name="lista" id="list" style="cursor: pointer;">
                 <option value="inventario">No. Inventario</option>
                 <option value="factura">Factura</option>
                 <option value="serie">Serie</option>
             </select>
             <input type="text" placeholder="Escribe el número" id="caja1">
             <button id="rep1" >Buscar</button>
         </div>
         <div class=repo>
         <a href="inf-rep.html"><button id="rep" style="width: 180px; height: 30px; border-radius: 8px; background-color:forestgreen; color: white; font-size: 18px; font-family:cursive;  float: left; cursor: pointer; border-color: cadetblue; margin-top: 200px;">Generar Reporte</button></a>
         </div>
        
        
        <div class=conten id="con">
         <input type="submit" id="boton" value="Mostrar" onclick="Mostrar_Ocultar()"/>
            <input type="submit" id="boton1" value="Insertar" onclick="inserta()"/>
            <input type="submit" id="boton2" value="Editar" onclick="edita()"/>
            <input type="submit" id="boton3" value="Eliminar" onclick="elimina()"/>
                       
                        
             <div id="ed" style="visibility: hidden;">
                    <h4 >No. Inventario:  </h4>
                    <input type="text" placeholder="Escribe algo..." id="caja1">
                    <h4 >No. Serie:  </h4>
                    <input type="text" placeholder="Escribe algo..." id="caja1">
                    <h4 >Status:  </h4>
                     <input type="text" placeholder="Escribe algo..." id="caja1">
             </div>
             
              <div id="ed1" style="visibility: hidden;">
                    <h4 >Responsable:  </h4>
                    <input type="text" placeholder="Escribe el número" id="caja3">
                    <h4 >Observaciones:  </h4>
                    <input type="text" placeholder="Escribe el número" id="caja3">
                    
             </div>
             
         <div id="tabla">
             <table>
                  <thead>
                    <tr style="background: #118327;">
                         <th>No. INV.</th>
                         <th>NOMBRE PRODUCTO</th>
                         <th>DESCRIPCIÓN</th>
                         <th>AREA ASIGNADA</th>
                         <th>FACTURA</th>
                         <th>RESPONSABLE</th>
                         <th>COSTO c/IVA</th>
                         <th>COSTO s/IVA</th>
                         <th>STATUS</th>
                         <th>SERIE</th>
                         <th>OBSERVACIONES</th>
                         
                     </tr>
                 </thead> 
                  <?php
                   $sql="SELECT `No.Inv.`,Tipo,Descripcion,dNombre,idFactura,Nombre,CostoCIVA,CostoSIVA,`Status`,Serie,Observaciones,Color,Material,Marca,Modelo,FormaCompra,Origen,IVA from mobiliarioyequipo,usuario,departamentos where departamentos.idDepartamentos=uidDepartamentos && usuario.idUsuario=mobiliarioyequipo.idUsuario ORDER BY `No.Inv.`;";
                   $result=mysqli_query($mysqli,$sql);
                    
                   while($mostrar=mysqli_fetch_array($result)){
                     ?>  
                   
                 <tr>
                     <td><?php echo $mostrar['No.Inv.']?></td>
                     <td><?php echo $mostrar['Tipo']?></td>
                     <td><?php echo $mostrar['Descripcion']?></td>
                     <td><?php echo $mostrar['dNombre']?></td>
                     <td><?php echo $mostrar['idFactura']?></td>
                     <td><?php echo $mostrar['Nombre']?></td>
                     <td><?php echo $mostrar['CostoCIVA']?></td>
                     <td><?php echo $mostrar['CostoSIVA']?></td>
                     <td><?php echo $mostrar['Status']?></td>
                     <td><?php echo $mostrar['Serie']?></td>
                     <td><?php echo $mostrar['Observaciones']?></td>
                 </tr>
                    <?php
                   }
                     ?>
             </table>    
             </div>
               
               
                <div id="oculto" style="display:none">
                <table>
                 <thead>
                     <tr style="background: #118327;" id="tab2">
                     <th id="oculto1">No.Inv.</th>    
                     <th id="oculto1">COLOR</th>
                     <th id="oculto1">MATERIAL</th>
                      <th id="oculto1" class="t2">MARCA</th>
                        <th id="oculto1" class="t2">MODELO</th>
                         <th id="oculto1" class="t2">FORMA COMPRA</th>
                         <th id="oculto1" class="t2">ÁREA DE ORIGEN</th>
                         <th id="oculto1" class="t2">IVA</th>
                         </tr>
                         </thead>
                        <?php
                  
                   $result=mysqli_query($mysqli,$sql);
                    
                   while($mostrar=mysqli_fetch_array($result)){
                     ?>  
                   
                 <tr>
                     <td><?php echo $mostrar['No.Inv.']?></td>
                     <td><?php echo $mostrar['Color']?></td>
                     <td><?php echo $mostrar['Material']?></td>
                     <td><?php echo $mostrar['Marca']?></td>
                     <td><?php echo $mostrar['Modelo']?></td>
                     <td><?php echo $mostrar['FormaCompra']?></td>
                     <td><?php echo $mostrar['Origen']?></td>
                     <td><?php echo $mostrar['IVA']?></td>
                     
                 </tr>
                    <?php
                   }
                     ?>
             </table>
             
         </div>             
         </div>
    </main>
</body>
</html>





