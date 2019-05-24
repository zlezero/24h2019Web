<?php
require_once('include/include.php');

if (!estConnecte()) {
	header("Location: index.php");
	exit;
}

$var_post = array($_POST['QteStock'], $_POST['TypeCafe']);
foreach( $var_post as $val) {
	if (!isset($val) || empty($val)) {
		header("Location: exportateur_stocks.php");
		exit;
	}
	echo $val;
}

$query = "update typecafe set QteStock= :stock where TypeCafe = :typecafe and exportateur = :exportateur";
$array = array('stock' => $_POST['QteStock'],
		'typecafe' => $_POST['TypeCafe'],
		'exportateur' => $_SESSION['idUser']);
$bddConn->executeNonQuery($query, $array);

header("Location: exportateur_stocks.php");
exit;
?>