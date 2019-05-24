<?php

require_once("include/conf.php");

if (!estConnecte()) {
	header('Location: login.php');
	exit;
}

if (isset($_GET["request"]) AND isset($_GET["id"]) AND is_numeric($_GET["id"])) {
	
	try {
		
		if ($_GET["request"] == "Pays")  {
			
			
			
		}
		
	} catch (Exception $e) {
		$_SESSION['status'] = sha1("errorEdit");
		header("Location: index.php");
		exit;
	}

	
} 

header("Location: index.php");
exit;

?>