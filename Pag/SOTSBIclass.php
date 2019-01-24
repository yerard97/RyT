<?php
require('fpdf/fpdf.php');
class SOTSBIclass extends FPDF
{
   
        function fsolcom($cabecera,$pos)
    {
        $this->SetXY(47, $pos);
        $this->SetFont('Arial','B',8);
       // foreach($cabecera as $fila)
        //{
            //Atención!! el parámetro valor 0, hace que sea horizontal
        $this->Cell(68,4, utf8_decode($cabecera[0]),1, 0 , 'C' );
        $this->Cell(24,4, utf8_decode($cabecera[1]),1, 0 , 'C' );
        $this->Cell(29,4, utf8_decode($cabecera[2]),1, 0 , 'C' );
        $this->Cell(22,4, utf8_decode($cabecera[3]),1, 0 , 'C' );
        $this->Cell(26,4, utf8_decode($cabecera[4]),1, 0 , 'C' );
        $this->Cell(27,4, utf8_decode($cabecera[5]),1, 1 , 'C' );

        //}
    }
} 
?>