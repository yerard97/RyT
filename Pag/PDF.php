<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
    function resguardoMovEquipo($cabecera)
    {
        $this->SetXY(10, 70);
        $this->SetFont('Arial','B',8);
       // foreach($cabecera as $fila)
        //{
            //Atenci�n!! el par�metro valor 0, hace que sea horizontal
        $this->Cell(19,8, utf8_decode($cabecera[0]),1, 0 , 'C' );
        $this->Cell(50,8, utf8_decode($cabecera[1]),1, 0 , 'C' );
        $this->Cell(25,8, utf8_decode($cabecera[2]),1, 0 , 'C' );
        $this->Cell(18,8, utf8_decode($cabecera[3]),1, 0 , 'C' );
        $this->Cell(30,8, utf8_decode($cabecera[4]),1, 0 , 'C' );
        $this->Cell(19,8, utf8_decode($cabecera[5]),1, 0 , 'C' );
        $this->Cell(25,8, utf8_decode($cabecera[6]),1, 0 , 'C' );
        //}
    }
        function tabla1($cabecera, $val)
    {
        $this->SetXY(10, $val);
        $this->SetFont('Arial','B',8);
       // foreach($cabecera as $fila)
        //{
            //Atenci�n!! el par�metro valor 0, hace que sea horizontal
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
            //Atenci�n!! el par�metro valor 0, hace que sea horizontal
        $this->Cell(26,4, utf8_decode($cabecera[0]),1, 0 , 'C' );

        //}
    }
    
} // FIN Class PDF
?>