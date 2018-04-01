<?php require 'sess.php'; ?>

<?php

if(empty($_POST))
{
	die();
}
else
{
	$key =$_POST['delete'];
	$quest= $db->selectCollection('studentquest');
	$quest->remove(array("_id" => new MongoId($key)));

	header('Location:uploadquestions.php');
}



?>