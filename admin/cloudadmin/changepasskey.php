<?php
	
	require 'sess.php';
	require 'secure.php';
	if(empty($_POST))
	{
		header('Location:passkey.php');
		die();
	}
	else
	{
	
		$passkey= secure($_POST['passkey']);
		$passkey=substr($passkey,0,20);
		$passkeycollection= $db->selectCollection('passkey');
		$registercollection= $db->selectCollection('registration');
		$passkeycount= $passkeycollection->count();

		if($passkeycount==1)
		{
			
			$passkeycollection->update(array(),array('$set' => array('passkey' => $passkey,'expireAt' =>new MongoDate())),array("multiple" => true));
			$passkeycollection->createIndex(array('expireAt' => 1), array('expireAfterSeconds' => 1800));
			$registercollection->update(array(),array('$set' => array('passkey' => $passkey)),array("multiple" => true));	
			echo "<strong style='color:#00ccff;'>".$passkey."</strong>";
		}
		else
		{
			$document=array();
			$document["passkey"] = $passkey;
			$document["expireAt"] = new MongoDate();
			$passkeycollection->insert($document);
			$passkeycollection->createIndex(array('expireAt' => 1), array('expireAfterSeconds' => 1800));
			$registercollection->update(array(),array('$set' => array('passkey' => $passkey)),array("multiple" => true));
			echo "<strong style='color:#00ccff;'>".$passkey."</strong>";
		}
		
		
		
	
	}
	
	

?>