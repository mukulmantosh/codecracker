<?php

	require 'sess.php';
	date_default_timezone_set("Asia/Kolkata");
	if(empty($_POST))
	{
		header('Location:hackathon.php');
		die();
	}
	else
	{
		try
		{
			

				date_default_timezone_set("Asia/Kolkata");
         		$current_time 	=  	date('YmdHis');
				$title 		 = $_POST['title'];
				$instruction = $_POST['instruction'];
				$time	 	 = $_POST['time'];				
				$date	 	 = $_POST['date'];

				// 12-hour time to 24-hour time 
				$time_in_24_hour_format  = date("H:i:00", strtotime($time));
				$time = $time_in_24_hour_format;
				
				
				if(strlen($title)==0){
					echo "hackathon title is empty";
					die();
				}else if(strlen($instruction)==0){
					echo "Instruction is empty";
					die();
				}else if(strlen($time)==0){
					echo "Ending Time is empty";
					die();
				}else if(strlen($date)==0){
					echo "End Data is empty";
					die();
				}
				else
				{
					
					$hackathon 		  =	$db->selectCollection('hackathon');
					$expiry_time 	  =	$date.' '.$time; //"2016-02-20 17:00:00";
					$timestamp 		  = strtotime($expiry_time);
					
					$data=array();
					$data['title']				= 	$title;
					$data['instruction']		=	$instruction;
					$data['time'] 				=	$time;
					$data['date']				= 	$date;
					$data['expireAt'] 			= 	new MongoDate($timestamp); 
		
					$hackathon->insert($data);
					$hackathon->createIndex(array('expireAt' => 1), array('expireAfterSeconds' => 0));

					
					echo "success";
					
					die();
				}
		}
		
		catch(MongoException $e)
		{
			echo "Exception Occured";
			die();
		}


	}
		

	
	
	

?>







