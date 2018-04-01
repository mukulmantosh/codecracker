<?php
require 'sess.php';

if(empty($_POST))
{
	die();
}
else{

		$id				 = $_POST['id'];
		$regdno			 = intval($_POST['regdno']);


		
		$password= password_hash($regdno, PASSWORD_DEFAULT);	

		$registration= $db->selectCollection('registration');
		$registration->update(array('_id'=> new MongoId($id)),
        array('$set' => array('password' => $password)));

		echo "<script>alert('Password Resetted');</script>";
		header('refresh:0;url=reset_password_list.php');
		die();


}		

		
		
	

?>