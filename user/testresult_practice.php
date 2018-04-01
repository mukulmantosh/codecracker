<?php
require 'cloudesession.php';

if (empty($_POST))
{
	die();
}
else
{

	// DO NOTHING

}

$userid = $profile["_id"]; // ID required for updation of current user
date_default_timezone_set("Asia/Kolkata");
$questiondb = $db->selectCollection('practice_test');
$testcollection = $db->selectCollection('practiceschedule');
$resultcollection = $db->selectCollection('results_practice');
$correct_credit = 5;
$wrong_credit = 2;
$right_answer = 0;
$wrong_answer = 0;
$testres = $testcollection->find();

foreach($testres as $test)
{
	$test["timer"];
	$test["question"];
	$test["testid"];
	$test["testname"];
}

$testid = $test["testid"];
$result_find = $resultcollection->find(array(
	"userid" => $userid,
	"testid" => $test["testid"]
));

foreach($result_find as $res)
{
	$res["starttime"];
}

$TimeStart = $res["starttime"];
$TimeEnd = strtotime(date("H:i:s"));
$time_taken = ($TimeEnd - $TimeStart);
$questionres = $questiondb->find(array(
	'category' => $test["testname"]
));



	$right_answer = 0;
	$wrong_answer = 0;

	



	foreach($questionres as $m)
	{
		foreach($_POST as $question => $option)
		{

			// echo $question."<br />";
			// echo $option."<br />";

			$m["questionnumber"];
			$d = $m["answer"];


			if ($m["questionnumber"] == $question)
			{

				$option = intval($option);
				
				
				if (password_verify($option, $d)) 
				//if ($d == $option)
				{

					$right_answer++;

				}
				else
				{
					$wrong_answer++;
				}
			} //########## END OF IF STATEMENT #############
		} //####### END OF NESTED FOREACH LOOP ########
	} //####### END OF FIRST FOREACH LOOP ##############


################### UPDATING DB ################

$finalscore = $right_answer * $correct_credit - $wrong_answer * $wrong_credit;
$resultcollection->update(array(
	'userid' => $userid,
	'testid' => $testid
) , array(
	'$set' => array(
		'resultstatus' => 'done',
		'score' => $finalscore,
		'testid' => $testid,
		'timetaken' => $time_taken
	)
));



echo "RIGHT ANSWERS : <span style='color:#99cc00;'>".$right_answer."</span> | WRONG ANSWERS : 
<span style='color:#ff0000;'>".$wrong_answer."</span>";

echo "<br><br>";

echo "Total Score : <span style='color:#0099cc;'>".$finalscore."</span>";

die();

?>