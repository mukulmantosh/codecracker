<?php

	function secure1($a)
	{
		$secure0= $a;
		$secure1= $secure0;
		$secure2= ltrim($secure1);
		$secure3= rtrim($secure2);
		$secure4 = htmlspecialchars($secure3);
		$secure5 = stripslashes($secure4);
		$secure6= trim($secure5);
		return $secure6;
		
		
	}
?>