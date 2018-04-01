<?php
require 'sess.php';
if(empty($_POST))
{
	header('Location:delete_exam.php');
	exit();
}
			try
			{
				$examname = $_POST['examname'];
				$collection= $db->selectCollection('test');
				$question_collection= $db->selectCollection('questions');
				$practice_collection= $db->selectCollection('practice_test');
				$collection->remove(array('testname' => $examname));
				$question_collection->remove(array('category'=> $examname));
				$practice_collection->remove(array('category' => $examname));
				echo $examname." deleted successfully";
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