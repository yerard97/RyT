<?php
session_start();
include_once "php/dbconfig.php";

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
//$valorCaja=$_POST['caja1'];

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
        function obtenValor(){
        document.getElementById('list').value;
            alert(window.location);
            location.href ='index.html';
                        
            //document.getElementById('list').innerHTML = document.getElementById('list').value+"3";
            //setTimeout(function(){ location.href ='../sg.php';}, 500); 
            alert(document.getElementById('list').value);
            //var dire=window.location;
            //alert(dire+",valor="+valor);
            //alert(dir.concat(",valor="+valor);
            
        
        }
    
    async function inserta(){
        
            const {value:url} =  await Swal({
               title:"Inserta las propiedades del nuevo producto",
               html:'<input id="val1" placeholder="No. Inv. (Sólo Número)" required>'+'<br/>'+'<br/>'+
                '<input id="val2" placeholder="Nombre del Producto" required>'+'<br/>'+'<br/>'+
                '<input id="val3" placeholder="Descripción" required>'+'<br/>'+'<br/>'+
                '<input id="val4" placeholder="Factura (Sólo Número)" required>'+'<br/>'+'<br/>'+
                '<input id="val5" placeholder="Responsable" required>'+'<br/>'+'<br/>'+
                '<input id="val6" placeholder="Costo c/IVA (Sólo Número)" required>'+'<br/>'+'<br/>'+
                '<input id="val7" placeholder="Costo s/IVA (Sólo Número)" required>'+'<br/>'+'<br/>'+
                '<input id="val8" placeholder="Status" required>'+'<br/>'+'<br/>'+
                '<input id="val9" placeholder="Serie" required>'+'<br/>'+'<br/>'+
                '<input id="val10" placeholder="Observaciones" required>'+'<br/>'+'<br/>'+
                '<input id="val11" placeholder="Color" required>'+'<br/>'+'<br/>'+
                '<input id="val12" placeholder="Material" required>'+'<br/>'+'<br/>'+
                '<input id="val13" placeholder="Marca" required>'+'<br/>'+'<br/>'+
                '<input id="val14" placeholder="Modelo" required>'+'<br/>'+'<br/>'+
                '<input id="val15" placeholder="Forma de Compra" required>'+'<br/>'+'<br/>'+
                '<input id="val16" placeholder="IVA(Sólo Número)" required>',
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
                html:'<label style="font-family:cursive;">Escribe el no. de inventario del producto: </label>                       <input id="val1" placeholder="No. Inv. (Sólo Número)" required>'+'<br/>'+'<br/>'+
                '<label style="font-family:cursive;">Campos a editar:</label>'+'<br/>'+
                '<input id="val0" placeholder="No. Inv. (Sólo Número)">'+'<br/>'+'<br/>'+
                '<input id="val2" placeholder="Nombre del Producto">'+'<br/>'+'<br/>'+
                '<input id="val3" placeholder="Descripción">'+'<br/>'+'<br/>'+
                '<input id="val4" placeholder="Factura (Sólo Número)">'+'<br/>'+'<br/>'+
                '<input id="val5" placeholder="Responsable">'+'<br/>'+'<br/>'+
                '<input id="val6" placeholder="Costo c/IVA (Sólo Número)">'+'<br/>'+'<br/>'+
                '<input id="val7" placeholder="Costo s/IVA (Sólo Número)">'+'<br/>'+'<br/>'+
                '<input id="val8" placeholder="Status">'+'<br/>'+'<br/>'+
                '<input id="val9" placeholder="Serie">'+'<br/>'+'<br/>'+
                '<input id="val10" placeholder="Observaciones">'+'<br/>'+'<br/>'+
                '<input id="val11" placeholder="Color">'+'<br/>'+'<br/>'+
                '<input id="val12" placeholder="Material">'+'<br/>'+'<br/>'+
                '<input id="val13" placeholder="Marca">'+'<br/>'+'<br/>'+
                '<input id="val14" placeholder="Modelo">'+'<br/>'+'<br/>'+
                '<input id="val15" placeholder="Forma de Compra">'+'<br/>'+'<br/>'+
                '<input id="val16" placeholder="IVA (Sólo Número)">',
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
               html:'<input id="val1" placeholder="No. Inv. (Sólo Número)" required>'+'<br/>'+'<br/>'+'<input id="val2" placeholder="Número de Serie" required>',
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
                 <form method="POST">
                 
                 <select name="lista" id="list" style="cursor: pointer;">
                 <option value="inventario">No. Inventario</option>
                 <option value="factura">Factura</option>
                 <option value="serie">Serie</option>
                <option value="todo">Mostrar Todos</option>
             </select>
             <input type="text" placeholder="Escribe el número" id="caja1" name="cajita">
             <button id="rep1" name="buscar" type="submit">Buscar</button>
                </form>   
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
                        $var = "asdasdsa";
                        $valorCaja=0;
                        if(isset($_GET['lista'])){
                            $var= $_GET['lista'];
                            
                        }
                    
                        //echo "sadasdasd",$_POST['cajaita'];
                        // echo $var;

                        if($var=="inventario"){
                        $sql="SELECT `No.Inv.`,Tipo,Descripcion,dNombre,idFactura,Nombre,CostoCIVA,CostoSIVA,`Status`,Serie,Observaciones,Color,Material,Marca,Modelo,FormaCompra,Origen,IVA from mobiliarioyequipo,usuario,departamentos where departamentos.idDepartamentos=uidDepartamentos && usuario.idUsuario=mobiliarioyequipo.idUsuario && `No.Inv.`='$valorCaja'ORDER BY `No.Inv.`;";
                        }else if($var=="factura"){
                           $sql="SELECT `No.Inv.`,Tipo,Descripcion,dNombre,idFactura,Nombre,CostoCIVA,CostoSIVA,`Status`,Serie,Observaciones,Color,Material,Marca,Modelo,FormaCompra,Origen,IVA from mobiliarioyequipo,usuario,departamentos where departamentos.idDepartamentos=uidDepartamentos && usuario.idUsuario=mobiliarioyequipo.idUsuario && `idFactura`='123' ORDER BY `No.Inv.`;";
                        }else if($var=="serie"){
                           
                            $sql="SELECT `No.Inv.`,Tipo,Descripcion,dNombre,idFactura,Nombre,CostoCIVA,CostoSIVA,`Status`,Serie,Observaciones,Color,Material,Marca,Modelo,FormaCompra,Origen,IVA from mobiliarioyequipo,usuario,departamentos where departamentos.idDepartamentos=uidDepartamentos && usuario.idUsuario=mobiliarioyequipo.idUsuario && `Serie`='1111' ORDER BY `No.Inv.`;";
                        }else{
                            $sql="SELECT `No.Inv.`,Tipo,Descripcion,dNombre,idFactura,Nombre,CostoCIVA,CostoSIVA,`Status`,Serie,Observaciones,Color,Material,Marca,Modelo,FormaCompra,Origen,IVA from mobiliarioyequipo,usuario,departamentos where departamentos.idDepartamentos=uidDepartamentos && usuario.idUsuario=mobiliarioyequipo.idUsuario ORDER BY `No.Inv.`;";
                        }
                   $result=mysqli_query($mysqli,$sql);

                    
                   while($mostrar=mysqli_fetch_array($result)){
                     ?> 
                   
                  <tr >;
                      
                     <td ><?php echo $mostrar['No.Inv.']?></td>
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
    </main>
</body>
</html>





