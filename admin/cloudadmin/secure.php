<?php

	function secure($a)
	{
		$secure0= preg_replace('/\s+/', '', $a);
		$secure1= strip_tags($secure0);
		$secure2= ltrim($secure1);
		$secure3= rtrim($secure2);
		$secure4 = htmlspecialchars($secure3);
		$secure5 = stripslashes($secure4);
		
		return $secure5;
		
		
	}
?>