<?php

//require('fpdf/fpdf.php');
include_once('solicitudCompraTabla.php');
include_once "../php/dbconfig.php";

$pdf=new FPDF('P','mm','Letter');
$pdf = new solicitudCompraTabla();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Image('img/logo-1.jpg',10,10,18); 
$pdf->Image('img/logo-2.jpg',174,10,20); 
$pdf->SetXY(56, 16);
$pdf->Cell(50,4,utf8_decode('DIRECCIÓN DE COORDINACIÓN FINANCIERA Y PLANEACIÓN'));
$pdf->SetXY(68, 21);
$pdf->Cell(50,4,utf8_decode('DEPARTAMENTO DE SERVICIOS GENERALES'));

 
//Métodos llamados con el objeto $pdf
$reg1 = array('DEPENDENCIA Y/O ORGANISMO','');
$val=34;
$pdf->tabla1($reg1,$val);
$reg1 = array('ÁREA DE ADSCRIPCIÓN','');
$pdf->tabla1($reg1,$val+4);
$reg1 = array('USUARIO','');
$pdf->tabla1($reg1,$val+8);
$reg1 = array('CARGO','');
$pdf->tabla1($reg1,$val+12);

$reg2 = array('FECHA DE');
$pdf->tabla2($reg2,$val);
$reg2 = array('ASIGNACIÓN');
$pdf->tabla2($reg2,$val+4);
$reg2 = array('');
$pdf->tabla2($reg2,$val+8);
$reg2 = array('RESGUARDO');
$pdf->tabla2($reg2,$val+12);
$reg2 = array('');
$pdf->tabla2($reg2,$val+16);



$pdf->SetXY(60,61);
$pdf->Cell(20,4,utf8_decode('RESGUARDO INTERNO DE MOBILIARIO Y EQUIPO'));



 
//Títulos que llevará la cabecera
$miCabecera = array('PRODUCTO', 'DESCRICPCIÓN', 'CANTIDAD');
 
//Métodos llamados con el objeto $pdf
$pdf->fsolcom($miCabecera);


$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
$result = mysqli_query($mysqli, "select dscNombre,dscDescripcion,dscCantidad from detallesc where dscsolicitudCompra=11;");
//$row = mysqli_fetch_assoc($result);
//$var=array($row['dscNombre'],$row['dscDescripcion'],$row['dscCantidad']);
$vartemp=78;
$noCol= mysqli_num_rows ($result);
$cont=1;
while($row1 = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $var=array($row1['dscNombre'],$row1['dscDescripcion'],$row1['dscCantidad']);
    $pdf->fsolcomt($var,$vartemp);
    $vartemp=$vartemp+8;
    if($cont==17){
        $pdf->AddPage();
        $pdf->fsolcomt($miCabecera,50);
        $vartemp=58;
    }else if($cont == 21){
        //$pdf->AddPage();
        //$pdf->fsolcomt($miCabecera,50);
        //$vartemp=58;
    }
    $cont=$cont+1;
}
$pdf->Rect(10,218, 189,15);

//Usado para hacer la nota
$pdf->SetFont('Arial','B',4);
$pdf->SetXY(10, 219);
$pdf->Cell(50,4,utf8_decode('IMPORTANTE'));

$pdf->SetXY(10, 224);
$pdf->Cell(50,4,utf8_decode('CON FUNDAMENTO DISPUESTO POR LOS ARTICULOS 47, FRACCIÓN III DE LA LEY DE RESPONSABILIDADES DE LOS SERVIDORES PÚBLICOS Y 10 PARA EL USO HONESTO Y EFICIENTE DE LOS RECURSOS, QUE LOS SERVIDORES PÚBLICOS EJERCERAN EN EL '));
$pdf->SetXY(10, 226 );
$pdf->Cell(50,4,utf8_decode('CUMPLIMINETO DE SUS FUNCIONES EL USUARIO SE OBLIGA DURANTE EL TIEMPO QUE TENGA ASIGNADO EL MOBILIARIO Y EQUIPO A CUIDARLO Y CONSERVARLO EN BUEN ESTADO, A UTILIZARLO EXCLUSIVAMENTE PARA EL DESEMPEÑO DE LAS ACTIVIDADES'));
$pdf->SetXY(10, 228);
$pdf->Cell(50,4,utf8_decode('OFICIALES A REPARAR PUDIERA OCASIONAR POR EL MAL USO Y NOTIFICAR DENTRO DEL TERMINO DE 72 HRS. CUALQUIER CAMBIO DE ADSCRIPCIÓN, BAJA Y/O ROBO.'));

$pdf->SetFont('Arial','B',7);
$pdf->SetXY(33, 240);
$pdf->Cell(50,4,utf8_decode('REVISÓ'));
$pdf->SetXY(103, 240);
$pdf->Cell(50,4,utf8_decode('Vo. Bo.'));
$pdf->SetXY(171, 240);
$pdf->Cell(50,4,utf8_decode('USUARIO'));

$pdf->SetXY(15, 268);
$pdf->Cell(50,4,utf8_decode('ENC. DEPTO. SERVICIOS GENERALES'));
$pdf->SetXY(88, 268);
$pdf->Cell(50,4,utf8_decode('DIRECTOR DE COORDINACION'));
$pdf->SetXY(90, 271);
$pdf->Cell(50,4,utf8_decode('FINANCIERA Y PLANEACION'));
$pdf->SetXY(166, 268);
$pdf->Cell(50,4,utf8_decode('JEFE DE OFICINA'));

$pdf->Line(15, 260, 63, 260);
$pdf->Line(83, 260, 133, 260);
$pdf->Line(156, 260, 205, 260);
$pdf->Output();


?>
