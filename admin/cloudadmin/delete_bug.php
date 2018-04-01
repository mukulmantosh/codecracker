<?php
require 'sess.php';
if(empty($_POST))
{
	header('Location:viewfeedbacks.php');
	exit();
}
			try
			{
				$bug_id = $_POST['bug'];
				$collection= $db->selectCollection('bug_report');
				$collection->remove(array('_id' => new MongoId($bug_id)));
				header('Location:bugreports.php');
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