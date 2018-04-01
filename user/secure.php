<?php

	function secure($var)
	{
		if(is_string($var))
		{

			$sanitize0 = (string)$var;
			$sanitize1 = trim($sanitize0);
			$sanitize2 = strip_tags($sanitize1);
			$sanitize3 = filter_var($sanitize2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
			$sanitize4 = htmlentities($sanitize3);
			$sanitize5 = filter_var($sanitize4,FILTER_SANITIZE_SPECIAL_CHARS);	
			$sanitize6 = filter_var($sanitize5, FILTER_SANITIZE_MAGIC_QUOTES);
			return $sanitize6;
		}
		else
		{

			return false;
		
		}
		
		
	}
?>