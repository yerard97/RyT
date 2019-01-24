<?php

 //require('fpdf/fpdf.php');
  
include_once('SOTSBIclass.php');
include_once('../php/dbconfig.php');
$usuarioid=1;

//
//$pdf = new FPDF('L','mm','Letter');
$pdf = new SOTSBIclass();


$pdf->AddPage('L','Letter');
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(23, 15);

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
//SELECT Nombre, Puesto FROM usuario where idUsuario=1;
$result = mysqli_query($mysqli, "SELECT codigo,revision,fecha,nosolicitud,solicitante,responsable,observaciones FROM SOTSBI WHERE idSOTSBI=1;");
$row= mysqli_fetch_assoc($result);

$codigo= $row['codigo'];
$revision=$row['revision'];
$fecha= $row['fecha'];
$nosolicitud=$row['nosolicitud'];
$solicitante=$row['solicitante'];
$responsable=$row['responsable'];
$observaciones=$row['observaciones'];

$pdf->Cell(39,24,$pdf->Image('img/logo-1.jpg',32,18,18) ,1, 0 , 'C' ); //1ro Recuadro
$pdf->Cell(111,24,'',1, 0 , 'C' ); //2do Recuadro

$pdf->Cell(21,6, utf8_decode('Código'),1, 0 , 'L' ); 
$pdf->Cell(24,6, $codigo ,1, 0 , 'C' );  //val Código

$pdf->Cell(51,24, $pdf->Image('img/logo-2.jpg',235,16,23) ,1, 0 , 'C' ); //4to Recuadro

$pdf->SetXY(173, 21);
$pdf->Cell(21,6, utf8_decode('Révision'),1, 0 , 'L' );
$pdf->Cell(24,6, $revision,1, 0 , 'C' );  //val Revisión
$pdf->SetXY(173, 27);
$pdf->Cell(21,6, utf8_decode('Fecha'),1, 0 , 'L' );
$pdf->Cell(24,6, $fecha ,1, 0 , 'C' );  //val Fecha
$pdf->SetXY(173, 33);

$pdf->Cell(21,6, utf8_decode('Página'),1, 0 , 'L' );
$pdf->Cell(24,6, $pdf->PageNo().' de {nb}',1, 0 , 'C' ); //val Página
$pdf->SetXY(81, 24);
$pdf->Cell(50,4,utf8_decode('Soliicitud de Opinión Técnica para sustitución'));
$pdf->SetXY(101, 28);
$pdf->Cell(50,4,utf8_decode('de Bienes Informaticos'));

//FECHA
$pdf->SetXY(22, 43);
$fecha=explode('-',$fecha);

$pdf->Cell(29,4,utf8_decode('FECHA(1)'),1,0,'C');
$pdf->Cell(18,4,$fecha[2],1,0,'C');  //DIA
$pdf->Cell(18,4,$fecha[1],1,0,'C');   //MES
$pdf->Cell(18,4,$fecha[0],1,0,'C');   //AÑO

$pdf->SetXY(160, 43);
$pdf->Cell(58,4,utf8_decode('NÚM/SOL/OPINIÓN TEC.'),1,0,'L');
$pdf->Cell(51,4,$nosolicitud,1,0,'C');

$pdf->SetXY(22, 49);
$pdf->Cell(248,4,utf8_decode('DATOS GENERALES DE LA DEPENDENCIA SOLICITANTE'),1,0,'C');
$pdf->SetXY(22, 53);
$pdf->Cell(248,40,'',1,0);
//CONSULTA DATOS GENERALES DE RESPONSABLE
$result = mysqli_query($mysqli, "select Nombre,Puesto,Calle, `No`,Col, Localidad, Telefono, Ext, Fax, `E-mail`,dnombre   from usuario,departamentos where uidDepartamentos=idDepartamentos && idusuario=$responsable;");
$row= mysqli_fetch_assoc($result);

//DATOS SEV GEN
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(48, 54);
$pdf->Cell(222,4,utf8_decode('SECRETARÍA EJECUTIVA DE LA POLITICA PUBLICA ESTATAL'),0,2, 'L'); //SECRETARIA
$pdf->Line(48,58,270,58);
$pdf->SetXY(71, 62);
$pdf->Cell(199,4,utf8_decode('RADIO Y TELEVISIÓN DE HIDALGO'),0,2, 'L'); //DIRGRAL
$pdf->Line(56,66,270,66);
$pdf->Cell(199,4,strtoupper ( utf8_decode($row['dnombre'])),0,2, 'L'); //AREA
$pdf->Line(60,70,270,70);
$pdf->Cell(199,4,strtoupper (utf8_decode($row['Nombre'])),0,2, 'L'); //RESPONSABLE
$pdf->Line(71,74,270,74);
$pdf->SetXY(40, 74);
$pdf->Cell(230,4,strtoupper(utf8_decode($row['Puesto'])),0,2, 'L'); //CARGO 
$pdf->Line(35,78,270,78);
$pdf->SetXY(22, 54);
$pdf->Cell(248,4,utf8_decode('SECRETARÍA'),0,2, 'L');
$pdf->Cell(248,4,"",0,2, 'L');
$pdf->Cell(248,4,utf8_decode('DIRECCIÓN GENERAL'),0,2, 'L');
$pdf->Cell(248,4,utf8_decode('DIR/AREA/SUBDIR/DEPTO'),0,2, 'L');
$pdf->Cell(248,4,utf8_decode('RESPONSABLE DE LA SOLICITUD'),0,2, 'L');
$pdf->Cell(248,4,utf8_decode('CARGO    '),0,2, 'L');
$pdf->Cell(20,4,utf8_decode('DOMICILIO '),0,0, 'L');
$pdf->Cell(87,4,strtoupper(utf8_decode($row['Calle'])),0,0, 'C'); //CALLE
$pdf->Cell(22,4,strtoupper(utf8_decode($row['No'])),0,0, 'C'); //NO
$pdf->Cell(43,4,strtoupper(utf8_decode($row['Col'])),0,0, 'C'); //COL
$pdf->Cell(76,4,strtoupper(utf8_decode($row['Localidad'])),0,0, 'C'); //LOCALIDAD
$pdf->Line(40,82,125,82);
$pdf->Line(130,82,150,82);
$pdf->Line(155,82,195,82);
$pdf->Line(205,82,260,82);

$pdf->SetXY(22, 82);
$pdf->Cell(20,4,'',0,0, 'L');
$pdf->Cell(87,4,utf8_decode('Calle'),0,0, 'C'); //CALLE
$pdf->Cell(22,4,utf8_decode('No.'),0,0, 'C'); //NO
$pdf->Cell(43,4,utf8_decode('Col.'),0,0, 'C'); //COL
$pdf->Cell(76,4,utf8_decode('Localidad'),0,1, 'C'); //LOCALIDAD
$pdf->SetXY(22, 85);
$pdf->Cell(56,4,utf8_decode($row['Telefono'].' EXT ').$row['Ext'],0,0, 'C'); //telefono
$pdf->Cell(62,4,strtoupper(utf8_decode($row['Fax'])),0,0, 'C'); //fax
$pdf->Cell(130,4,strtoupper(utf8_decode($row['E-mail'])),0,0, 'C'); //e-mail
$pdf->Line(32,89,70,89);
$pdf->Line(82,89,142,89);
$pdf->Line(172,89,242,89);

$pdf->SetXY(22, 89);
$pdf->Cell(56,4,utf8_decode('Teléfono'),0,0, 'C'); 
$pdf->Cell(62,4,utf8_decode('Fax'),0,0, 'C'); 
$pdf->Cell(130,4,utf8_decode('e-mail'),0,0, 'C'); 

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(47, 99);
$pdf->Cell(68,12,utf8_decode('DESCRIPCION DEL BIEN'),1,0, 'C'); 
$pdf->Cell(24,12,utf8_decode(''),1,0, 'C'); //NO INVENTARIO
$pdf->Cell(29,12,utf8_decode(''),1,0, 'C'); //NO SERIE
$pdf->Cell(22,12,utf8_decode('MARCA'),1,0, 'C');  //MARCA
$pdf->Cell(26,12,utf8_decode(''),1,0, 'C');  //ESTADO
$pdf->Cell(27,12,utf8_decode(''),1,0, 'C');  //MOTIVO

//Solicitante
$result = mysqli_query($mysqli, "select dNombre,Nombre from departamentos, usuario where idDepartamentos=uidDepartamentos && idUsuario=$solicitante;");
$row= mysqli_fetch_assoc($result);


$pdf->SetXY(22, 136);
$pdf->Cell(248,4,utf8_decode('OBSERVACIONES'),1,2, 'L');
$pdf->MultiCell(248,4,strtoupper(utf8_decode($observaciones)),1, 'C');
$pdf->Cell(248,4,utf8_decode(''),0,2, 'C');


$pdf->Cell(131,31,utf8_decode($row['dNombre']),1,0, 'C');
$pdf->Cell(117,31,"",1,0, 'C');
$pdf->SetXY(159,170);
$pdf->MultiCell(80,4,strtoupper(utf8_decode($row['Nombre'])),0, 'C');


$pdf->SetXY(115, 99);
$pdf->Cell(24,6,utf8_decode('NÚMERO DE'),0,2, 'C');
$pdf->Cell(24,6,utf8_decode('INVENTARIO'),0,0, 'C');
$pdf->SetXY(140, 99);
$pdf->Cell(29,6,utf8_decode('NÚMERO DE'),0,2, 'C');
$pdf->Cell(29,6,utf8_decode('SERIE'),0,0, 'C');
$pdf->SetXY(190, 99);
$pdf->Cell(26,4,utf8_decode('ESTADO'),0,2, 'C');
$pdf->Cell(26,4,utf8_decode('ACTUAL DEL'),0,2, 'C');
$pdf->Cell(26,4,utf8_decode('BIEN'),0,0, 'C');
$pdf->SetXY(216, 99);
$pdf->Cell(27,6,utf8_decode('MOTIVO DE'),0,2, 'C');
$pdf->Cell(27,6,utf8_decode('BAJA'),0,2, 'C');


$result = mysqli_query($mysqli, "select tipo,`No.Inv.`,Serie,Marca,Estado,MotivoBaja from sotsbi,sotsbi_has_mobiliarioyequipo,mobiliarioyequipo where idSOTSBI=SOTSBI_idSOTSBI && MobiliarioyEquipo_id=id && idSOTSBI =1;");
//$row = mysqli_fetch_assoc($result);
//$var=array($row['dscNombre'],$row['dscDescripcion'],$row['dscCantidad']);
$vartemp=111;
$noCol= mysqli_num_rows ($result);
$cont=1;
while($row1 = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $var=array($row1['tipo'],$row1['No.Inv.'],$row1['Serie'],$row1['Marca'],$row1['Estado'],$row1['MotivoBaja']);
    //$pdf->MultiCell(12,12,print_r($var));
    $pdf->fsolcom($var,$vartemp);
    $vartemp=$vartemp+4;
    if($cont==17){
        $pdf->AddPage();
        //$pdf->fsolcomt($miCabecera,50);
        $vartemp=58;
    }else if($cont == 21){
        //$pdf->AddPage();
        //$pdf->fsolcomt($miCabecera,50);
        //$vartemp=58;
    }
    $cont=$cont+1;
}



$pdf->AliasNbPages();
$pdf->Output();

?>