<?php

	require 'sess.php';
	require 'securequestion.php';

	if(empty($_POST))
	{
		header('Location:add_questions.php');
		die();
	}
	else
	{
		try
		{
			if($_POST['type']==="mcq")
			{


					$questionid = htmlentities($_POST['questionid']);
					$question	= htmlentities($_POST['question']);
					$option1	= htmlentities($_POST['option1']);
					$option2	= htmlentities($_POST['option2']);
					$option3	= htmlentities($_POST['option3']);
					$option4	= htmlentities($_POST['option4']);
					$category	= htmlentities($_POST['category']);
					$type		= htmlentities($_POST['type']);
					$answer     = htmlentities($_POST['answer']);

					
					
					if(strlen($question)==0){
						echo "Question is empty";
						die();
					}else if(strlen($option1)==0){
						echo "Option 1 is empty";
						die();
					}else if(strlen($option2)==0){
						echo "Option 2 is empty";
					}else if(strlen($option3)==0){
						echo "Option 3 is empty";
						die();
					}else if(strlen($option4)==0){
						echo "Option 4 is empty";
						die();
					}else if(strlen($answer)==0){
						echo "Answer is empty";
						die();
					}else if(ctype_digit($answer)==false)
					{
						echo "ANSWER SHOULD BE NUMBER BETWEEN 1-4";
						die();
					}
					elseif($answer > 4)
					{
						echo "ANSWER SHOULD BE NUMBER BETWEEN 1-4";
						die();
					}
					else
					{
						$answer= intval($answer);
						$secured_answer=password_hash($answer,PASSWORD_DEFAULT);

					
						$quesupdate= $db->selectCollection('questions');
						$quesupdate->update(array('_id'=> new MongoId($questionid)),array('$set' => array('text' => $question,'answer' => $secured_answer, 'option1' => $option1, 'option2' => $option2, 'option3' => $option3, 'option4' => $option4)));
						echo "success";
						die();						
					}
			}
			else if($_POST['type']==="coding")
			{

				$questionid = secure1($_POST['questionid']);
				$question	= secure1($_POST['question']);				
				$input		= secure1($_POST['input']);
				$output     = secure1($_POST['output']);
				$category	= secure1($_POST['category']);	
				$type		= secure1($_POST['type']);	

				if(strlen($question)==0){
					echo "Question is empty";
					die();
				}else if(strlen($input)==0){
					echo "Input is empty";
					die();
				}else if(strlen($output)==0){
					echo "Output is empty";
					die();
				}else{



						$quesupdate= $db->selectCollection('questions');
						$quesupdate->update(array('_id'=> new MongoId($questionid)),array('$set' =>
						array('text' => $question,'input' => $input,'output' => $output)));
						echo "success";
						die();					

				}




			}
			else
			{
				die("SOMETHING WENT WRONG");
			}



			

		}
		catch(MongoException $e)
		{
			echo "Exception Occured";
			die();
		}


	}
		

	
	
	

?>







