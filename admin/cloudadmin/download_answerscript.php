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

$pdf->MultiCell(200,10,"MCQs Answerscripts Report Generated on: ".$current_date);


$pdf->Cell(0,10,'____________________________________________',0,0,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','',10);
$answer_script= $db->selectCollection('answerscript');
$answer_script_find= $answer_script->find();

$question= $db->selectCollection('questions');

foreach($answer_script_find as $answer)
{
    

$fullname=$answer["fullname"];
$category=$answer["category"];
$testid=$answer["testid"];


$pdf->Cell(200,10,"NAME: ".$fullname);
 // Line break
 $pdf->Ln(5);

 $pdf->Cell(200,10,"CATEGORY: ".$category);
 // Line break
 $pdf->Ln(5);

 


$count_ques=count($answer["questionnumber"]);
$count_ops= count($answer["option"]);


    
    for($i=0;$i<$count_ques;$i++)
    {
        $ques= $question->find(array("category"=>$category,"questionnumber"=>$answer["questionnumber"][$i]));
        foreach($ques as $q)
        {
            
            $pdf->Cell(20,10,"QUESTION NUMBER: ".$q["questionnumber"]);
             // Line break
             $pdf->Ln(5);


             $pdf->Cell(20,10,"QUESTION: ");
             // Line break
             $pdf->Ln(10);

            $pdf->MultiCell(200,5,html_entity_decode($q['text']),0,'L',false);
             // Line break
             $pdf->Ln(5);

              $pdf->Cell(100,10,"Option 1: ".$q["option1"]);
             // Line break
             $pdf->Ln(5);

              $pdf->Cell(100,10,"Option 2: ".$q["option2"]);
             // Line break
             $pdf->Ln(5);

              $pdf->Cell(100,10,"Option 3: ".$q["option3"]);
             // Line break
             $pdf->Ln(5);

              $pdf->Cell(100,10,"Option 4: ".$q["option4"]);
             // Line break
             $pdf->Ln(5);
            


                       
            if(password_verify($answer["option"][$i], $q["answer"]))
            {
                
                $pdf->Cell(100,10,"CHOOSEN OPTION IS RIGHT: ".$answer["option"][$i]);
                $pdf->Ln(5);
                $pdf->Ln(5);
                
            }
            else
            {
                $pdf->Cell(100,10,"CHOOSEN OPTION IS WRONG: ".$answer["option"][$i]);
                $pdf->Ln(5);
                $pdf->Ln(5);
                
            }
        }
        
        
    }

$pdf->Cell(0,10,'------------------------------------------------------------------------------------------------------------------------------------------------',0,0,'C');
    // Line break
    $pdf->Ln(10);  
}
  


$pdf->Output('MCQ Answerscripts Generated On '.$current_date.'.pdf', 'D');





?>
