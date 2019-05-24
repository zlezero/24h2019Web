<?php

require_once("include/include.php");

if (!estConnecte()) {
	header('Location: index.php');
	exit;
}

if (isset($_GET["request"]) AND isset($_GET["id"]) AND is_numeric($_GET["id"])) {

	try {
		
		if ($_GET["request"] == "Pays")  {
			
			$bddConn->executeNonQuery("DELETE FROM Pays Where Id = :id", array("id" => $_GET["id"]));
			
			$_SESSION['status'] = sha1("successDel");
			header("Location: viewPaysProd.php");
			exit;
		}

	} catch (Exception $e) {
		$_SESSION['status'] = sha1("errorDel");
		header("Location: viewPaysProd.php");
		exit;
	}

}

header("Location: index.php");
exit;

?>