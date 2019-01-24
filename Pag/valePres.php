<?php
//require('fpdf/fpdf.php');
include_once('valePresTabla.php');
include_once "../php/dbconfig.php";

//$usuario = $_SESSION['idUsuario'];

  /*  $_SESSION['areaSolicitante']= $are;
    $_SESSION['nomSolicitante'] = $_POST['solicitante'];
    $_SESSION['areaSolicitante'] =$_POST['cargos'];
    $_SESSION['nomRecibe']=$_POST["recibe"];
    $_SESSION['areaRecibe']=$_POST["cargor"];*/

$pdf=new FPDF('P','mm','Letter');
$pdf = new valePresTabla();

$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->Image('img/logo-1.jpg',10,10,18); 
$pdf->Image('img/logo-2.jpg',174,10,20); 
$pdf->SetXY(75, 16);
$pdf->Cell(50,4,utf8_decode('RADIO Y TELEVISIÓN DE HIDALGO'));
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(85, 21);
$pdf->Cell(37,4,utf8_decode('SERVICIOS GENERALES'));
$pdf->Cell(50,4,utf8_decode(''));
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(85.5, 26);
$pdf->Cell(37,4,utf8_decode('VALE DE PRESTAMO'));  
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(70, 31);
$pdf->Cell(42,4,utf8_decode('FECHA DE LA SOLICITUD: '));

$val=45;


$reg1 = array('DEPENDENCIA Y/O ORGANISMO','RADIO Y TELEVISION DE HIDALGO');
$pdf->tabla1($reg1,$val);
$reg1 = array('ÁREA DE ADSCRIPCIÓN','');
$pdf->tabla1($reg1,$val+4);
$reg1 = array('USUARIO SOLICITANTE','');
$pdf->tabla1($reg1,$val+8);
$reg1 = array('CARGO DEL SOLICITANTE','');
$pdf->tabla1($reg1,$val+12);
$reg1 = array('USUARIO DE PROCEDENCIA','');
$pdf->tabla1($reg1,$val+16);
$reg1 = array('CARGO DEL PROCEDENTE','');
$pdf->tabla1($reg1,$val+20);
//$pdf->Cell(37,4,utf8_decode($varFecha));

$miCabecera = array('NOMBRE DEL PRODUCTO','DESCRIPCION MATERIAL SOLICITADO','CANTIDAD SOLICITADA');
//Métodos llamados con el objeto $pdf
$pdf->fsolcom($miCabecera);

//select NoPartida, dvsCantidad,dvsUnidadMedida,dvsDescripcion,dvsCantidadEntregada from detallevs where dvsvaleSalida=2;

//$pdf->fsolcomt($miCabecera,48);
//Datos de Conexion
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
//$row = mysqli_fetch_assoc($result);
$vartemp=48;
//$noCol= mysqli_num_rows ($result);
$cont=1;


//
//$carAutoriza="Encargado de la coordinacion financiera y planeacion";




//$row = mysqli_fetch_assoc($result);

$pdf->SetXY(114, 30);
$pdf->Cell(37,4,utf8_decode(''));

$pdf->SetXY(15, 220);
$pdf->MultiCell(180,15,'',1,'C');


$pdf->SetFont('Arial','B',7);
$pdf->SetXY(60, 240);
$pdf->Cell(50,4,utf8_decode('SOLICITA'));
$pdf->SetXY(140, 240);
$pdf->Cell(50,4,utf8_decode('AUTORIZA'));

//Cargos
$pdf->SetXY(38, 268);
$pdf->MultiCell(58,4,utf8_decode(''),0,'C');
$pdf->SetXY(115, 268);
$pdf->MultiCell(63,4,utf8_decode(''),0,'C');

//Nombres
$pdf->SetXY(38, 262);
$pdf->Cell(58,4,utf8_decode(''),0,0,'C');
$pdf->SetXY(115, 262);
$pdf->Cell(63,4,utf8_decode(''),0,0,'C');

$pdf->Line(38, 260, 98, 260);
$pdf->Line(118, 260, 178, 260);



mysqli_close($mysqli);
$pdf->Output();


?>
