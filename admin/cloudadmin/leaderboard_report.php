<?php

require 'sess.php'; 
date_default_timezone_set('Asia/Kolkata');
$current_date = date('d F Y g-i-s A');
$leaderboard = $db->selectCollection('leaderboard');
$leaderboard_find = $leaderboard->find();

require('fpdf/mc_table.php');


$pdf=new PDF_MC_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Cell(20,10,"Leaderboard Report generated on ".$current_date);
// Line break
$pdf->Ln(20);
 

//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,50,30,40));


    $pdf->Row(array("Name","Registration Number","MCQ Score","Coding Score"));
 foreach($leaderboard_find as $leader){

 	$pdf->Row(array($leader['fullname'],$leader["regdno"],$leader["total"],$leader["coding_total"]));

 }   
    
    

$pdf->Output('Leaderboard Generated On '.$current_date.'.pdf', 'D');

?>
