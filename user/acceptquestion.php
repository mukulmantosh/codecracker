<?php

require 'cloudesession.php'; 
date_default_timezone_set("Asia/Kolkata");


$request= $db->selectCollection('stud_access');
$requestfind= $request->find();
foreach($requestfind as $req)
{
	$req["access"];
}

if($req["access"]==='NOTALLOW')
{
		echo "Sorry you are not allowed to submit question.";

	die();

}


	 
	 if(empty($_POST))
	 {
		 die();
	 }
	
	  

	$question 	= htmlentities(trim($_POST['question']));
	$option1	= htmlentities(trim($_POST['option1']));
	$option2	= htmlentities(trim($_POST['option2']));
	$option3	= htmlentities(trim($_POST['option3']));
	$option4	= htmlentities(trim($_POST['option4']));
	$category	= htmlentities(trim($_POST['category']));
	$answer 	= htmlentities(trim($_POST['answer']));

	$category_collection = $db->selectCollection('test');
	$count_category = $category_collection->find(array("testtype" => "mcq" ,"testname" =>$category))->count();
	
	$studentcollection= $db->selectCollection('studentquest');
	
	if(strlen($question)==0)
	{
		echo "Question is Empty";
		die();
	}
	else if(strlen($option1)==0)
	{
		echo "Options cannot be empty !!!";
		die();
	}
	else if(strlen($option2)==0)
	{
		echo "Options cannot be empty !!!";
		die();
	}
	else if(strlen($option3)==0)
	{
		echo "Options cannot be empty !!!";
		die();
	}
	else if(strlen($option4)==0)
	{
		echo "Options cannot be empty !!!";
		die();
	}
	else if(strlen($answer)==0)
	{
		echo "Answer cannot be empty !!!";
		die();
	}
	else if(ctype_digit($answer)==false)
	{
		echo "Answer should be Option Numbers between 1-4 !!!";
		die();
	}
	else if($answer > 4)
	{
		echo "Answer should be Option Numbers between 1-4 !!!";
		die();
	}else if($count_category==0){

		echo "This Category does not Exists";
		die();
	}

	
	try
	{
		$document=array();	
		$document['name']= $profile["fullname"];
		$document['regdno'] = $profile["regdno"];
		$document['userid'] = $profile["_id"];
		$document['createdAt']= date("d/m/Y H:i:s");
		$document['category']= $category;
		$document['question']= $question;
		$document['option1']= $option1;
		$document['option2']= $option2;
		$document['option3']= $option3;
		$document['option4']= $option4;
		$document['answer']=$answer;
		
		$studentcollection->insert($document);
		echo "success";
		die();

	
	}
	catch(MongoConnectionException $e)
	{
		echo "Connection not established";
		die();
	}




 require 'footer.php'; 



 ?>
