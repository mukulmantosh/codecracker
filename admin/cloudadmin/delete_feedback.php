<?php
require 'sess.php';
if(empty($_POST))
{
	header('Location:viewfeedbacks.php');
	exit();
}
			try
			{
				$feedback_id = $_POST['feedback'];
				$collection= $db->selectCollection('feedback');
				$collection->remove(array('_id' => new MongoId($feedback_id)));
				header('Location:viewfeedbacks.php');
				die();
							
			}
			catch(MongoConnectionException $e)
			{
				die("Cannot Connect".$e->getMessage());
			}
			catch(MongoException $e)
			{
				echo "<script>alert('Exception');</script>";
				die();
			}


?>