<?php 
require 'sess.php'; 
date_default_timezone_set('Asia/Kolkata');
$current_date = date('d F Y g-i-s A');

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


$pdf->MultiCell(200,10,"Coding Answerscripts Report Generated on: ".$current_date);


$pdf->Cell(0,10,'____________________________________________',0,0,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','',10);
$answer_script= $db->selectCollection('coding_answerscript');
$answer_script_find= $answer_script->find();

$question= $db->selectCollection('questions');

foreach($answer_script_find as $answer)
{
    


$fullname=$answer["fullname"];
$category=$answer["category"];
$testid=$answer["testid"];

$pdf->Cell(200,10,"Name: ".$fullname);
 // Line break
 $pdf->Ln(5);

 $pdf->Cell(200,10,"Category: ".$category);
 // Line break
 $pdf->Ln(5);

 $pdf->Cell(20,10,"Question:");
 $pdf->Ln(10);

$question_find = $question->find(array("type" => "coding" ,"questionnumber" => intval($answer['questionnumber'])));

foreach($question_find as $qview){

    $pdf->MultiCell(200,5,$qview['text']);
    $pdf->Ln(10);

    $pdf->Cell(20,10,"Program:");
    $pdf->Ln(10);
    $pdf->MultiCell(200,5,html_entity_decode($answer['answer']),0,'L',false);
    $pdf->Ln(5);
    

$pdf->Cell(0,10,'*******************************************************************************************************************************************',0,0,'C');
    // Line break
    $pdf->Ln(10);  




}
    
        
}

$pdf->Output('Coding Answerscripts Generated On '.$current_date.'.pdf', 'D');



?>
