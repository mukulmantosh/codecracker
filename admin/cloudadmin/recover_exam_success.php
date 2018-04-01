<?php
require 'sess.php';

			try
			{

				$collection= $db->selectCollection('results');
				
				if(isset($_POST['recover']))
				{
					$id = $_POST['recover'];
					$collection->remove(array('_id' => new MongoId($id)));
					header('Location:recover_exam.php');
					die();
				}			
			}
			catch(MongoConnectionException $e)
			{
				die("Cannot Connect".$e->getMessage());
			}
			catch(MongoException $e)
			{
				echo "<script>alert('Exception');</script>";
				header('refresh:0;url=recover_exam.php');
				die();
			}


?>