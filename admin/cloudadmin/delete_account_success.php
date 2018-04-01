<?php
require 'sess.php';
if(empty($_POST))
{
	header('Location:delete_account.php');
	exit();
}
			try
			{
				$userid= $_POST['userid'];
				$regdno = intval($_POST['regdno']);

				$collection 	= $db->selectCollection('registration');				
				$certificate    = $db->selectCollection('certificates');
				$results 		= $db->selectCollection('results');
				$answerscript	= $db->selectCollection('answerscript');
				$leaderboard 	= $db->selectCollection('leaderboard');
				$feedback 		= $db->selectCollection('feedback');
				$bugreport		= $db->selectCollection('bug_report');
				$res_practice	= $db->selectCollection('results_practice');
				$coding_answer  = $db->selectCollection('coding_answerscript');
				$studentquest	= $db->selectCollection('studentquest');

				$certificate_find = $certificate->find(array("student_id" => $regdno));

				foreach($certificate_find as $cert){

					$cert_url = '../../'.$cert["certificate_url"];

					unlink($cert_url); // Delete Certificate

				}


				######### REMOVES EVERYTHING USER,FEEDBACK,BUG REPORT, CERTIFICATES,RESULTS,ANSWERSCRIPTS ETC.. ###########

				$collection->remove(array('_id' => new MongoId($userid)));
				$certificate->remove(array('student_id' => $regdno));
				$results->remove(array('userid' => new MongoId($userid)));
				$leaderboard->remove(array('userid' => new MongoId($userid)));
				$answerscript->remove(array('userid' => new MongoId($userid)));
				$res_practice->remove(array('userid' => new MongoId($userid)));
				$coding_answer->remove(array('userid' => new MongoId($userid)));
				$studentquest->remove(array('userid' => new MongoId($userid)));
				$feedback->remove(array('studentid' => new MongoId($userid)));
				$bugreport->remove(array('studentid' => new MongoId($userid)));


				header('Location:delete_account.php');	
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