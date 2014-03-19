<?php
namespace AirAtlantique\GeneratorBundle\Service;
use AirAtlantique\GeneratorBundle\Service\fpdf\FPDF;

class PdfGenerator
{
   function PdfGenerator($filename)
   {
        $pdf = new FPDF();
        $pdf->AddPage();
        $header=array(1=>"IdFlight",2=>"Origin");
        $data=array(1=>"1252",2=>"flight");
        // En-tête
        foreach($header as $col)
        {
            $pdf->Cell(40,7,$col,1);
            $pdf->Ln();
        }
        // Données
        foreach($data as $row)
        {
                $pdf->Cell(40,6,$row,1);
                $pdf->Ln();
       }
       $pdf->Output("error.pdf");
    }
}


?>