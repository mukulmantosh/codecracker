<?php require 'sess.php'; ?>
<?php
if(empty($_POST))
{
	die();
}
else
{
	
	$text 		= htmlentities($_POST['question']);
	$answer		= htmlentities($_POST['answer']);
	$option1	= htmlentities($_POST['option1']);
	$option2	= htmlentities($_POST['option2']);
	$option3	= htmlentities($_POST['option3']);
	$option4	= htmlentities($_POST['option4']);
	$category	= htmlentities($_POST['category']);
	$id 		= htmlentities($_POST['questionid']);

	$answer = intval($answer);
	$secured_answer=password_hash($answer,PASSWORD_DEFAULT);


	$addquestioncollection= $db->selectCollection('practice_test');			
	$countquestion= $addquestioncollection->find(array("category" =>$category))->count();				

	$student_collection= $db->selectCollection('studentquest');
			

			$data=array();
			$data['questionnumber']= $countquestion;
			$data['category']=$category;
			$data['type'] = 'mcq';
			$data['text'] =$text;
			$data['option1']= $option1;
			$data['option2']= $option2;
			$data['option3']= $option3;
			$data['option4']= $option4;
			$data['answer'] = $secured_answer;
			$addquestioncollection->insert($data);
			$student_collection->remove(array('_id' => new MongoId($id)));
			echo "<script>alert('Question Added Successfully');</script>";
			header('refresh:0;url=uploadquestions.php');
	

}




?>