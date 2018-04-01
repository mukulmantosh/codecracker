<?php
require 'sess.php';
if(empty($_POST))
{
	header('Location:dashboard.php');
	exit();
}
			try
			{
				$category = $_POST['category'];
				$type	  = $_POST['type'];
				$id 	  = $_POST['id'];

				$encrypted_category = base64_encode($category);
				$encrypted_type		= base64_encode($type);

				$collection= $db->selectCollection('questions');
				$collection->remove(array('_id' => new MongoId($id),'type' => $type,'category' => $category));
				header('Location:delete_questions.php?type='.$encrypted_type.'&category='.$encrypted_category);
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