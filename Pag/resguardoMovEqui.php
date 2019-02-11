<?php

//require('fpdf/fpdf.php');
include_once "../php/dbconfig.php";
include_once('classResMovEqui.php');



$pdf=new FPDF('P','mm','Letter');
$pdf = new classResMovEqui();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Image('img/logo-1.jpg',10,10,18); 
$pdf->Image('img/logo-2.jpg',174,10,20); 
$pdf->SetXY(56, 16);
$pdf->Cell(50,4,utf8_decode('DIRECCIÓN DE COORDINACIÓN FINANCIERA Y PLANEACIÓN'));
$pdf->SetXY(68, 21);
$pdf->Cell(50,4,utf8_decode('DEPARTAMENTO DE SERVICIOS GENERALES'));




$varareadripcio=$_POST['aread'];
$usuario=$_POST['res'];


$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset("utf8");
if (!$mysqli) die("No puede conectar a MySQL: " . mysql_error());
$cargo=mysqli_query($mysqli,"SELECT Puesto, Nombre FROM `usuario` where Nombre LIKE '$usuario';");
$car=mysqli_fetch_assoc($cargo);
$puesto=$car['Puesto'];
$result = mysqli_query($mysqli, "SELECT `No.Inv.`,Descripcion, Color, 
Material, Marca, Modelo, Serie from mobiliarioyequipo,usuario 
where mobiliarioyequipo.idUsuario=usuario.idUsuario && Puesto='$puesto';");




$vartemp=78;
$noCol= mysqli_num_rows ($result);
$cont=1;
while($row1 = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $var=array($row1['No.Inv.'],$row1['Descripcion'],$row1['Color'],$row1['Material'],$row1['Marca'],$row1['Modelo'],$row1['Serie']);
    $pdf->fsolcomt($var,$vartemp);
    $vartemp=$vartemp+4;
    /*if($cont==17){
        $pdf->AddPage();
        $pdf->fsolcomt($miCabecera,50);
        $vartemp=58;
    }else if($cont == 21){
        //$pdf->AddPage();
        //$pdf->fsolcomt($miCabecera,50);
        //$vartemp=58;
    }*/
    $cont=$cont+1;
}

$result = mysqli_query($mysqli, "SELECT numeroresguardo FROM variablessistema where idvs=1;");
$row = mysqli_fetch_assoc($result);
$valorNumRes=$row['numeroresguardo']+1;
$result = mysqli_query($mysqli, "update  variablessistema set numeroresguardo=$valorNumRes where idvs=1;");


 
//Métodos llamados con el objeto $pdf
$reg1 = array('DEPENDENCIA Y/O ORGANISMO','RADIO Y TELEVISION DE HIDALGO');
$val=34;
$pdf->tabla1($reg1,$val);
$reg1 = array('ÁREA DE ADSCRIPCIÓN',$varareadripcio);
$pdf->tabla1($reg1,$val+4);
$reg1 = array('USUARIO',$car['Nombre']);
$pdf->tabla1($reg1,$val+8);
$reg1 = array('CARGO',$car['Puesto']);
$pdf->tabla1($reg1,$val+12);

$reg2 = array('FECHA DE');
$pdf->tabla2($reg2,$val);
$reg2 = array('ASIGNACIÓN');
$pdf->tabla2($reg2,$val+4);
$reg2 = array(date('Y-m-d'));
$pdf->tabla2($reg2,$val+8);
$reg2 = array('RESGUARDO');
$pdf->tabla2($reg2,$val+12);
$reg2 = array($valorNumRes);
$pdf->tabla2($reg2,$val+16);



$pdf->SetXY(60,61);
$pdf->Cell(20,4,utf8_decode('RESGUARDO INTERNO DE MOBILIARIO Y EQUIPO'));

//Títulos que llevará la cabecera
$miCabecera = array('No. INV.', 'DESCRICPCIÓN', 'COLOR', 'MATERIAL', 'MARCA', 'MODELO', 'SERIE');
 
//Métodos llamados con el objeto $pdf
$pdf->resguardoMovEquipo($miCabecera);

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

$result1 = mysqli_query($mysqli, "select nombre from usuario where Puesto='Encargado de la coordinacion financiera y planeacion';");

$row1 = mysqli_fetch_assoc($result1);
$result2 = mysqli_query($mysqli, "select nombre from usuario where Puesto='Enc. Depto. Servicios Generales';");

$row2 = mysqli_fetch_assoc($result2);



$pdf->SetXY(15, 264);
$pdf->Cell(50,4,strtoupper ($row1['nombre']));
$pdf->SetXY(15, 268);
$pdf->Cell(50,4,utf8_decode('ENC. DEPTO. SERVICIOS GENERALES'));
$pdf->SetXY(88, 264);
$pdf->Cell(50,4,strtoupper ($row2['nombre']));


$pdf->SetXY(88, 268);
$pdf->Cell(50,4,utf8_decode('DIRECTOR DE COORDINACION'));
$pdf->SetXY(90, 271);
$pdf->Cell(50,4,utf8_decode('FINANCIERA Y PLANEACION'));
$pdf->SetXY(166, 268);
$pdf->Cell(50,4,strtoupper ($car['Puesto']));
$pdf->SetXY(166, 264);
$pdf->Cell(50,4,$car['Nombre']);



$pdf->Line(15, 260, 63, 260);
$pdf->Line(83, 260, 133, 260);
$pdf->Line(156, 260, 205, 260);


$pdf->Output();


?>
