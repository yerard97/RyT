<?php

require('fpdf/fpdf.php');
//include_once('classResMovEqui.php');

$pdf=new FPDF('L','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(23, 15);
$pdf->Cell(39,24,$pdf->Image('img/logo-1.jpg',32,18,18) ,1, 0 , 'C' ); //1ro Recuadro
$pdf->Cell(111,24,'',1, 0 , 'C' ); //2do Recuadro

$pdf->Cell(21,6, utf8_decode('Código'),1, 0 , 'L' ); 
$pdf->Cell(24,6, utf8_decode(''),1, 0 , 'C' );  //val Código

$pdf->Cell(51,24, $pdf->Image('img/logo-2.jpg',235,16,23) ,1, 0 , 'C' ); //4to Recuadro

$pdf->SetXY(173, 21);
$pdf->Cell(21,6, utf8_decode('Révision'),1, 0 , 'L' );
$pdf->Cell(24,6, utf8_decode(''),1, 0 , 'C' );  //val Revisión
$pdf->SetXY(173, 27);
$pdf->Cell(21,6, utf8_decode('Fecha'),1, 0 , 'L' );
$pdf->Cell(24,6, utf8_decode(''),1, 0 , 'C' );  //val Fecha
$pdf->SetXY(173, 33);
$pdf->Cell(21,6, utf8_decode('Página'),1, 0 , 'L' );
$pdf->Cell(24,6, utf8_decode(''),1, 0 , 'C' ); //val Página
$pdf->SetXY(81, 24);
$pdf->Cell(50,4,utf8_decode('Soliicitud de Opinión Técnica para sustitución'));
$pdf->SetXY(101, 28);
$pdf->Cell(50,4,utf8_decode('de Bienes Informaticos'));

//FECHA
$pdf->SetXY(22, 43);
$pdf->Cell(29,4,utf8_decode('FECHA(1)'),1,0,'C');
$pdf->Cell(18,4,utf8_decode(''),1,0,'C');  //DIA
$pdf->Cell(18,4,utf8_decode(''),1,0,'C');   //MES
$pdf->Cell(18,4,utf8_decode(''),1,0,'C');   //AÑO

$pdf->SetXY(160, 43);
$pdf->Cell(58,4,utf8_decode('NÚM/SOL/OPINIÓN TEC.'),1,0,'L');
$pdf->Cell(51,4,utf8_decode(''),1,0,'L');

$pdf->SetXY(22, 49);
$pdf->Cell(248,4,utf8_decode('DATOS GENERALES DE LA DEPENDENCIA SOLICITANTE'),1,0,'C');
$pdf->SetXY(22, 53);
$pdf->Cell(248,40,'',1,0);
//DATOS SEV GEN
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(48, 54);
$pdf->Cell(222,4,utf8_decode(''),0,2, 'L'); //SECRETARIA
$pdf->SetXY(71, 62);
$pdf->Cell(199,4,utf8_decode(''),0,2, 'L'); //DIRGRAL
$pdf->Cell(199,4,utf8_decode(''),0,2, 'L'); //AREA
$pdf->Cell(199,4,utf8_decode(''),0,2, 'L'); //RESPONSABLE
$pdf->SetXY(40, 74);
$pdf->Cell(230,4,utf8_decode(''),0,2, 'L'); //CARGO 
$pdf->SetXY(22, 54);
$pdf->Cell(248,4,utf8_decode('SECRETARÍA'),0,2, 'L');
$pdf->Cell(248,4,utf8_decode(''),0,2, 'L');
$pdf->Cell(248,4,utf8_decode('DIRECCIÓN GENERAL'),0,2, 'L');
$pdf->Cell(248,4,utf8_decode('DIR/AREA/SUBDIR/DEPTO'),0,2, 'L');
$pdf->Cell(248,4,utf8_decode('RESPONSABLE DE LA SOLICITUD'),0,2, 'L');
$pdf->Cell(248,4,utf8_decode('CARGO    '),0,2, 'L');
$pdf->Cell(20,4,utf8_decode('DOMICILIO '),0,0, 'L');
$pdf->Cell(87,4,'',0,0, 'C'); //CALLE
$pdf->Cell(22,4,'',0,0, 'C'); //NO
$pdf->Cell(43,4,'',0,0, 'C'); //COL
$pdf->Cell(76,4,'',0,0, 'C'); //LOCALIDAD
$pdf->SetXY(22, 81);
$pdf->Cell(20,4,'',0,0, 'L');
$pdf->Cell(87,4,utf8_decode('Calle'),0,0, 'C'); //CALLE
$pdf->Cell(22,4,utf8_decode('No.'),0,0, 'C'); //NO
$pdf->Cell(43,4,utf8_decode('Col.'),0,0, 'C'); //COL
$pdf->Cell(76,4,utf8_decode('Localidad'),0,1, 'C'); //LOCALIDAD
$pdf->SetXY(22, 85);
$pdf->Cell(56,4,'',0,0, 'C'); //telefono
$pdf->Cell(62,4,'',0,0, 'C'); //fax
$pdf->Cell(130,4,'',0,0, 'C'); //e-mail
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


$pdf->SetXY(22, 136);
$pdf->Cell(248,4,utf8_decode('OBSERVACIONES'),1,2, 'L');
$pdf->Cell(248,8,utf8_decode(''),1,2, 'C');
$pdf->Cell(248,4,utf8_decode(''),0,2, 'C');

$pdf->Cell(131,31,utf8_decode('INFORMATICA'),1,0, 'C');
$pdf->Cell(117,31,utf8_decode(''),1,0, 'C');

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

$pdf->Output();
?>