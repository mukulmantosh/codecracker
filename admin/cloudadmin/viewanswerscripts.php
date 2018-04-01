<?php require 'sess.php'; ?>

<link href='googlefont/font.css' rel='stylesheet' type='text/css'>

<style>

p,h1,h2,h3,body
{
	font-family: 'Montserrat', sans-serif;
}

</style>

<?php

$userid=  base64_decode($_GET['id']);
$tid= base64_decode($_GET['tid']);
$answer_script= $db->selectCollection('answerscript');
$answer_script_find= $answer_script->find(array("userid" => new MongoId($userid),"testid" => $tid));

$question= $db->selectCollection('questions');

foreach($answer_script_find as $answer)
{
	
echo "<hr>";
$fullname=$answer["fullname"];
$category=$answer["category"];
$testid=$answer["testid"];

echo "<strong>FULLNAME: </strong>".$fullname."<br>";
echo "<strong>CATEGORY: </strong>".$category."<br>";
echo "<strong>TESTID: </strong>".$testid."<br><br>";


$count_ques=count($answer["questionnumber"]);
$count_ops=	count($answer["option"]);


	
	for($i=0;$i<$count_ques;$i++)
	{
		$ques= $question->find(array("category"=>$category,"questionnumber"=>$answer["questionnumber"][$i]));
		foreach($ques as $q)
		{
			echo "<strong style='color:#0099FF;'>QUESTION NUMBER: </strong>".$q["questionnumber"]."<br>";
			echo "<strong>QUESTION: </strong>"."<em>".$q["text"]."</em>"."<br><br>";
			echo "<strong>OPTION 1: </strong>".$q["option1"]."<br>";
			echo "<strong>OPTION 2: </strong>".$q["option2"]."<br>";
			echo "<strong>OPTION 3: </strong>".$q["option3"]."<br>";
			echo "<strong>OPTION 4: </strong>".$q["option4"]."<br><br>";
			
			if(password_verify($answer["option"][$i], $q["answer"]))
			{
				echo "<strong style='color:#009900;'>YOUR OPTION IS RIGHT: </strong>".$answer["option"][$i]."<br><br>";
			}
			else
			{
				echo "<strong style='color:#F00;'>YOUR OPTION IS WRONG: </strong>".$answer["option"][$i]."<br><br>";
			}
		}
		
		
	}


}

?>
