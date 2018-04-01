<?php
	
	require 'sess.php';
	require 'secure.php';
	if(empty($_POST))
	{
		header('Location:create_exam.php');
		die();
	}
	
	else
	{
	
		$examname= secure(strtolower($_POST['examname']));
		$examtype= secure(strtolower($_POST['examtype']));
		$length1= strlen($examname);
		$length2= strlen($examtype);

		if($length1==0 || $length2==0)
		{
			echo "Empty Data cannot be passed";
			die();
		}

		$testcollection= $db->selectCollection('test');

		$testnamecount= $testcollection->find(array("testname"=>$examname))->count();

		if($testnamecount==1)
		{
			echo $examname." Already Exists";
			die();					
		}		
		else
		{
			try
			{
				
				$document=array();
				$document["testname"] = strtolower($examname);
				$document["testtype"] = strtolower($examtype);
				
				$testcollection->insert($document);
				echo "success";
				die();

			}
			catch(MongoException $e)
			{
				die("Exception");
				header('refresh:0;url=add_new_test.php');
				die();
			}
		}
		
		
	
	}
	
	

?>