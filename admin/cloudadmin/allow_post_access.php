<?php
require 'sess.php';

if(empty($_POST))
{
	die();
}
$val=$_POST['access'];

		if(isset($_POST['access']))
		{
			$access= $db->selectCollection('stud_access');
			
			$access->update(array(),array('$set' => array('access' => $val)),
     array("upsert"=>true ,"multiple"=> true )
 );
			 
			 
		}
		
		header('Location:uploadquestions.php');
		die();

?>