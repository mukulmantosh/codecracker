<?php

require 'sess.php'; 
date_default_timezone_set('Asia/Kolkata');
$current_date = date('d F Y g-i-s A');
$collection= $db->selectCollection('bug_report');
$feed_find = $collection->find();


require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();


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
 
    $pdf->MultiCell(180,5,$feed["msg"],0,'L',false);
    $pdf->SetFont('Arial','',12);
   // Line break
    $pdf->Ln(10);
      $pdf->Cell(0,10,'------------------------------------------------------------------------------------------------------------------------------------------',0,0,'C');
    // Line break
    $pdf->Ln(10);


}


$pdf->Output('Complete BugReports Generated On '.$current_date.'.pdf', 'D');


?>