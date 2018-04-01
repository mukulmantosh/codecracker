<?php
require 'sess.php';

			try
			{
			$register_collection= $db->selectCollection('registration');
			$certificate_collection=$db->selectCollection('certificates');
			

			if(isset($_POST['regdno']))
			{
				$id = $_POST['regdno'];
				$id=intval($id);
				$certificates_find= $certificate_collection->find(array("student_id" =>$id));
				foreach($certificates_find as $cert){
					
					
					$cert_location = "../../".$cert["certificate_url"];
					unlink($cert_location); // Delete File

				}

				$certificate_collection->remove(array('student_id' => $id));
				$register_collection->update(array('regdno' => $id),
				array('$set' =>	array('certificate_status'=>"no")),
				array("upsert" => true));


				header('Location:certificates.php');
				die();
			}
			
			
			}
			catch(MongoConnectionException $e)
			{
				die("Cannot Connect".$e->getMessage());
			}


?>