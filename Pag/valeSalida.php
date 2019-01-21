<?php
session_start();
//require('fpdf/fpdf.php');
include_once('valeSalidaTabla.php');
include_once "../php/dbconfig.php";
$idValeSalida = $_SESSION['idvalsal'];
//$usuario = $_SESSION['idUsuario'];

  /*  $_SESSION['areaSolicitante']= $are;
    $_SESSION['nomSolicitante'] = $_POST['solicitante'];
    $_SESSION['areaSolicitante'] =$_POST['cargos'];
    $_SESSION['nomRecibe']=$_POST["recibe"];
    $_SESSION['areaRecibe']=$_POST["cargor"];*/

$varDirSolicitante=$_SESSION['areaSolicitante'];
$noSolicita=$_SESSION['nomSolicitante'];
$carSolicita=$_SESSION['areaSolicitante'];



$noRecibe =$_SESSION['nomRecibe'];
$carRecibe=$_SESSION['areaRecibe'];
$pdf=new FPDF('P','mm','Letter');
$pdf = new valeSalidaTabla();

$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->Image('img/logo-1.jpg',10,10,18); 
$pdf->Image('img/logo-2.jpg',174,10,20); 
$pdf->SetXY(53, 16);
$pdf->Cell(50,4,utf8_decode('DIRECCION DE LA COORDINACION FINANCIERA Y PLANEACIÓN'));
$pdf->SetFont('Arial','',8);
$pdf->SetXY(67, 21);
$pdf->Cell(37,4,utf8_decode('DIRECCION SOLICITANTE: '));
$pdf->Cell(50,4,utf8_decode($varDirSolicitante));
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(78, 26);
$pdf->Cell(37,4,utf8_decode('VALE DE SALIDA DE ALMACEN'));  
$pdf->SetXY(72, 30);
$pdf->Cell(42,4,utf8_decode('FECHA DE LA SOLICITUD: '));
//$pdf->Cell(37,4,utf8_decode($varFecha));

$miCabecera = array('NÚMERO DE PARTIDA', 'CANTIDAD SOLICITADA', 'UNIDAD DE MEDIDA','DESCRIPCION MATERIAL SOLICITADO','CANTIDAD SOLICITADA');
 
//Métodos llamados con el objeto $pdf
$pdf->fsolcom($miCabecera);

//select NoPartida, dvsCantidad,dvsUnidadMedida,dvsDescripcion,dvsCantidadEntregada from detallevs where dvsvaleSalida=2;

//$pdf->fsolcomt($miCabecera,48);
//Datos de Conexion
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
$result = mysqli_query($mysqli, "select NoPartida, dvsCantidad,dvsUnidadMedida,dvsDescripcion,dvsCantidadEntregada from detallevs where dvsvaleSalida=$idValeSalida");

//$row = mysqli_fetch_assoc($result);
$vartemp=48;
$noCol= mysqli_num_rows ($result);
$cont=1;
while($row1 = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $var=array($row1['NoPartida'],$row1['dvsCantidad'],$row1['dvsUnidadMedida'],$row1['dvsDescripcion'],$row1['dvsCantidadEntregada']);
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
//Seleccion de encargado
$result = mysqli_query($mysqli, "select Nombre from usuario where Puesto like 'Encargado de la coordinacion financiera y planeacion';");
$row = mysqli_fetch_assoc($result);

$nomAutoriza=$row['Nombre'];

//
$carAutoriza="Encargado de la coordinacion financiera y planeacion";




$result = mysqli_query($mysqli, "select fecha from valesalida where idvaleSalida=$idValeSalida");
$row = mysqli_fetch_assoc($result);
$varFecha=$row['fecha'];
$pdf->SetXY(114, 30);
$pdf->Cell(37,4,utf8_decode($varFecha));

$pdf->SetXY(15, 220);
$pdf->MultiCell(180,15,'',1,'C');


$pdf->SetFont('Arial','B',7);
$pdf->SetXY(33, 240);
$pdf->Cell(50,4,utf8_decode('SOLICITA'));
$pdf->SetXY(103, 240);
$pdf->Cell(50,4,utf8_decode('AUTORIZA'));
$pdf->SetXY(171, 240);
$pdf->Cell(50,4,utf8_decode('RECIBE'));

//Cargos
$pdf->SetXY(10, 268);
$pdf->MultiCell(58,4,utf8_decode($carSolicita),0,'C');
$pdf->SetXY(78, 268);
$pdf->MultiCell(63,4,utf8_decode($carAutoriza),0,'C');
$pdf->SetXY(155, 268);
$pdf->MultiCell(50,4,utf8_decode($carRecibe),0,'C');

//Nombres
$pdf->SetXY(10, 262);
$pdf->Cell(58,4,utf8_decode($noSolicita),0,0,'C');
$pdf->SetXY(78, 262);
$pdf->Cell(63,4,utf8_decode($nomAutoriza),0,0,'C');
$pdf->SetXY(155, 262);
$pdf->Cell(50,4,utf8_decode($noRecibe),0,0,'C');

$pdf->Line(15, 260, 63, 260);
$pdf->Line(83, 260, 135, 260);
$pdf->Line(156, 260, 205, 260);


mysqli_close($mysqli);
$pdf->Output();


?>
