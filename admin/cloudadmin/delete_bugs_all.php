<?php
require 'sess.php';

			try
			{
				$collection= $db->selectCollection('bug_report');
				$collection->remove();
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