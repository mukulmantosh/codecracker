<?php

require 'sess.php'; 
date_default_timezone_set('Asia/Kolkata');
$current_date = date('d F Y g-i-s A');
$collection= $db->selectCollection('feedback');
$feed_find = $collection->find();


require('fpdf/fpdf.php');

class PDF extends FPDF
{


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',15);

$pdf->MultiCell(200,10,"Complete Feedbacks Report Generated on: ".$current_date);


$pdf->Cell(0,10,'____________________________________________',0,0,'C');
$pdf->Ln(10);


foreach($feed_find as $feed){
    $pdf->SetFont('Arial','',10);
	$pdf->Cell(20,10,"Name: ".$feed["fullname"]);
	 // Line break
    $pdf->Ln(5);
    $pdf->Cell(20,10,"Registration Number: ".$feed["regdno"]);
    // Line break
    $pdf->Ln(5);
    $pdf->Cell(20,10,"Posting Date: ".$feed["posting_date"]);
    // Line break
    $pdf->Ln(10);   
    $pdf->SetFont('Arial','BI',10);
 
    $pdf->MultiCell(180,5,html_entity_decode($feed["msg"]),0,'L',false);
    $pdf->SetFont('Arial','',12);
   // Line break
    $pdf->Ln(10);

    $pdf->SetFont('Arial','',10);
      $pdf->Cell(0,10,'---------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,0,'C');
    // Line break
    $pdf->Ln(10);


}


$pdf->Output('Complete Feedback Generated On '.$current_date.'.pdf', 'D');


?>