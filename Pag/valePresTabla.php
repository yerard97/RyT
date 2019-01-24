<?php
require('fpdf/fpdf.php');
 
class valePresTabla extends FPDF
{
    
    function fsolcom($cabecera)
    {
        $this->SetXY(15,81);
        $this->SetFont('Arial','B',8);
       // foreach($cabecera as $fila)
        //{
            //Atención!! el parámetro valor 0, hace que sea horizontal
        $this->MultiCell(50,8,utf8_decode($cabecera[0]),1,'C');
        $this->SetXY(65,81);
        $this->MultiCell(100,8,utf8_decode($cabecera[1]),1,'C');
        $this->SetXY(165,81);
        $this->MultiCell(30,4,utf8_decode($cabecera[2]),1,'C');

        //}
    }
        function fsolcomt($cabecera,$val)
    {
        $this->SetXY(10, $val);
        $this->SetFont('Arial','B',8);
       // foreach($cabecera as $fila)
        //{
            //Atención!! el parámetro valor 0, hace que sea horizontal
        $this->Cell(25,8, utf8_decode($cabecera[0]),1, 0 , 'C' );
        $this->Cell(25,8, utf8_decode($cabecera[1]),1, 0 , 'C' );
        $this->Cell(30,8, utf8_decode($cabecera[2]),1, 0 , 'C' );
        $this->Cell(80,8, utf8_decode($cabecera[3]),1, 0 , 'C' );
        $this->Cell(30,8, utf8_decode($cabecera[4]),1, 1 , 'C' );

        //}
    }
    function tabla1($cabecera, $val)
    {
        $this->SetXY(15, $val);
        $this->SetFont('Arial','B',8);
       // foreach($cabecera as $fila)
        //{
            //Atenci�n!! el par�metro valor 0, hace que sea horizontal
        $this->Cell(90,4, utf8_decode($cabecera[0]),1, 0 , '' );
        $this->Cell(90,4, $cabecera[1],1, 0 , 'C' );

        //}
    }
       /* function tabla1($cabecera, $val)
    {
        $this->SetXY(10, $val);
        $this->SetFont('Arial','B',8);
       // foreach($cabecera as $fila)
        //{
            //Atención!! el parámetro valor 0, hace que sea horizontal
        $this->Cell(70,4, utf8_decode($cabecera[0]),1, 0 , '' );
        $this->Cell(74,4, utf8_decode($cabecera[1]),1, 0 , 'C' );

        //}
    }
        function tabla2($cabecera, $val)
    {
        $this->SetXY(173, $val);
        $this->SetFont('Arial','B',8);
       // foreach($cabecera as $fila)
        //{
            //Atención!! el parámetro valor 0, hace que sea horizontal
        $this->Cell(26,4, utf8_decode($cabecera[0]),1, 0 , 'C' );

        //}
    }*/
    
} // FIN Class PDF
?>