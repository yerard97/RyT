<?php
require('fpdf/fpdf.php');

$pdf=new FPDF('P','mm','letter');

$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Image('img/Logo_Hidalgo.png',20,20,25); 

$pdf->SetXY(73, 23);
$pdf->MultiCell(80,5,utf8_decode('RADIO Y TELEVISION DE HIDALGO ADMINISTRATIVO'),0,'C',0);
$pdf->SetXY(87, 33);
$pdf->Cell(50,5,utf8_decode('SERVICIOS GENERALES'));


$pdf->SetFont('Arial','B',11);
$pdf->SetXY(84, 42);
$pdf->Cell(50,5,utf8_decode('DATOS DEL VEHICULO'));



$pdf->SetFont('Arial','',8);
$pdf->SetXY(19, 50);
$pdf->Cell(50,6,utf8_decode('MARCA : '));

$pdf->SetXY(71, 50);
$pdf->Cell(50,6,utf8_decode('TIPO : '));

$pdf->SetXY(113, 50);
$pdf->Cell(50,6,utf8_decode('MOD : '));

$pdf->SetXY(137, 50);
$pdf->Cell(50,6,utf8_decode('PLACAS : '));

$pdf->SetXY(172, 50);
$pdf->Cell(50,6,utf8_decode('INV : '));

$pdf->SetXY(19, 59);
$pdf->Cell(50,6,utf8_decode('SERIE : '));

$pdf->SetXY(89, 59);
$pdf->Cell(50,6,utf8_decode('MOTOR : '));

$pdf->SetXY(150, 59);
$pdf->Cell(50,6,utf8_decode('COLOR : '));

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(84, 68);
$pdf->Cell(50,6,utf8_decode('DATOS DEL USUARIO'),0,0,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(19, 76);
$pdf->Cell(50,6,utf8_decode('NOMBRE : '));

$pdf->SetXY(89, 76);
$pdf->Cell(50,6,utf8_decode('DIRECCION : '));

$pdf->SetXY(151, 76);
$pdf->Cell(50,6,utf8_decode('PUESTO : '));

$pdf->SetXY(165, 39);
$pdf->Cell(50,6,utf8_decode('FECHA : '));

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(97,83 );
$pdf->Cell(50,6,utf8_decode('INVENTARIO'));

//TABLA

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(22,89 );
$pdf->Cell(33,13,utf8_decode('PARTE'),1,0,'C');

$pdf->Cell(54,5,utf8_decode('A LA SALIDA DEL VEHICULO'),1,2,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,8,utf8_decode('SI'),1,0,'C');
$pdf->Cell(10,8,utf8_decode('NO'),1,0,'C');
$pdf->Cell(11,8,utf8_decode('BUEN'),1,0,'C');
$pdf->Cell(11,8,utf8_decode('MAL'),1,0,'C');
$pdf->Cell(14,8,utf8_decode('OBS'),1,0,'C');

$pdf->SetXY(109,89 );
$pdf->Cell(33,13,utf8_decode('PARTE'),1,0,'C');
$pdf->SetFont('Arial','B',10);

$pdf->Cell(54,5,utf8_decode('A LA SALIDA DEL VEHICULO'),1,2,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,8,utf8_decode('SI'),1,0,'C');
$pdf->Cell(10,8,utf8_decode('NO'),1,0,'C');
$pdf->Cell(11,8,utf8_decode('BUEN'),1,0,'C');
$pdf->Cell(11,8,utf8_decode('MAL'),1,0,'C');
$pdf->Cell(14,8,utf8_decode('OBS'),1,0,'C');

//leyenda
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(22,218 );
$pdf->MultiCell(175,4,utf8_decode('Por el presente documento el usuario obliga durante el tiempo que tengas un servicio este vehículo, a mantenerlo en el estado del que lo recibe, a reparar la totalidad de los daños que ocasione, así como a pagar las infracciones en la que incurra. El usuario se compromete y obliga solidariamente a las responsabilidades que emanen este acuerdo.'),1,'C');

//firmas
$pdf->SetFont('Arial','',8);
$pdf->SetXY(41,235 );
$pdf->Cell(50,5,utf8_decode('ELABORA'),0,'C');

$pdf->SetXY(109,235 );
$pdf->Cell(50,5,utf8_decode('AUTORIZA'),0,'C');

$pdf->SetXY(163,235 );
$pdf->Cell(50,5,utf8_decode('RECIBE'),0,'C');

//firams relleando

$pdf->SetXY(24,248 );
$pdf->Cell(50,5,utf8_decode('nombres'),0,0,'C');

$pdf->SetXY(94,248 );
$pdf->Cell(47,5,utf8_decode('nombre'),0,0,'C');

$pdf->SetXY(144,248 );
$pdf->Cell(50,5,utf8_decode('nombre'),0,0,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(24,253 );
$pdf->Cell(50,5,utf8_decode('ENC. DEPTO SERVICIOS GENERALES'),0,0,'C');

$pdf->SetXY(92,253 );
$pdf->MultiCell(55,3,utf8_decode('DIRECTOR DE COORDINACION FINANCIERA Y PLANEACION'),0,'C');

$pdf->SetXY(144,253 );
$pdf->Cell(50,5,utf8_decode('DIRECTOR GENERAL'),0,0,'C');





$pdf->Output();
?>
