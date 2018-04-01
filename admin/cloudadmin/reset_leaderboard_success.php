<?php
require 'sess.php';

if(empty($_POST))
{
	die('Cannot Process');
}


			try
			{

				
				
				if(isset($_POST['delete_leaderboard']))
				{
					
					$collection= $db->selectCollection('leaderboard');
					$collection->remove();
					echo "<script>alert('Leaderboard Resetted');</script>";
					header('refresh:0;url=reset_leaderboard.php');
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
				header('refresh:0;url=reset_leaderboard.php');
				die();
			}


?>