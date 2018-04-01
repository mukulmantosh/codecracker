<?php
require 'sess.php';

			try
			{
				$collection= $db->selectCollection('feedback');
				$collection->remove();
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