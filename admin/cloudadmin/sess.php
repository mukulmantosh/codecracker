<?php
require('../session.php');
require('../user.php');
$user = new User();
if (!$user->isLoggedIn()){
	
echo "<script>alert('Session Expired');</script>";
echo "<script>window.location.replace('../index.php');</script>";	

exit;
}

			try
			{
			
				$connection= new MongoClient("mongodb://cloud#er_muk:cloud#&_juld9@localhost:27017");
		
				$db= $connection->selectDB('codetest');
			}
			catch(MongoConnectionException $e)
			{
				
				die("Server not Connected....");
			
			}
			catch(MongoException $e)
			{
			
				die("Exception");
			
			}
			

	
?>