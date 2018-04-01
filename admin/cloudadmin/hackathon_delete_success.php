<?php
require 'sess.php';
if(empty($_POST))
{
	header('Location:hackathon_delete.php');
	exit();
}
			try
			{
				$hackdelete = $_POST['hackdelete'];
				$collection= $db->selectCollection('hackathon');
				$collection->remove(array('_id' =>new MongoId($hackdelete)));
				header('Location:hackathon_delete.php');
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