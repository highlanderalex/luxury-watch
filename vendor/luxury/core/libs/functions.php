<?php
	function debug($data)
	{
		echo '<pre style="color: #e1e0e0;background: #232323; margin:0; padding: 10px;">';
		print_r($data);
		echo '</pre>';
	}
	
	function redirect($http = false)
	{
		if ($http)
		{
			$redirect = $http;
		}
		else
		{
			$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
		}
		header("Location: $redirect");
		exit;
	}
	
	function h($str)
	{
		return htmlspecialchars($str, ENT_QUOTES);
	}