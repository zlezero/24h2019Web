<?php

require_once('include/include.php');

if (!estConnecte()) {
	header("Location: index.php");
	exit;
}

$var_post = array($_POST['exportateur'], $_POST['quantity'], $_POST['type'], $_POST['origine']);
foreach( $var_post as $val) {
	if (!isset($val) || empty($val)) {
		header("Location: command_form.php");
		exit;
	}
}


// Get exportateur id
$query = "select id from users where nom = :exportateur and (type = 'Exportateur' or  type = 'exportateur')";
$array = array('exportateur' => $_POST['exportateur']);
$exportateur = $bddConn->executeNonQuery($query, $array);

$query = "select Nom from pays where id = :id";
$array = array('id' => $_POST['origine']);
$origine = $bddConn->executeNonQuery($query, $array);

// get quantity of cafe
$query = "select QteStock from typecafe where exportateur= :exportateur and TypeCafe=:type";
$array = array('type' => $_POST['type'],'exportateur' => $exportateur);
$QteStock = $bddConn->executeNonQuery($query, $array);
// check if there is enough cafe
if ($QteStock < $_POST['quantity']) {
	echo 'OUI';
}
echo intval($QteStock > $_POST['quantity']);
$remaining = $QteStock - $_POST['quantity'];
echo $QteStock . '<br>';
echo  $_POST['quantity'] . '<br>';
echo '>' . $remaining;

// add command
$query = "insert into command(Type, Origine, QteCafe, Exportateur, Date) values(:type, :origine, :quantity, :exportateur, NOW())";
$array = array('type' => $_POST['type'],
				'origine' => $origine,
				'provenance' => $origine,
				'quantity' => $_POST['quantity'],
				'exportateur' => $exportateur);
$res = $bddConn->executeNonQuery($query, $array);
echo $res;

// update stock
$query = "update typecafe set QteStock = :stock where exportateur = :exportateur and TypeCafe = :typecafe";
$array = array('stock' => $remaining, 'typecafe' => $_POST['type']);
$bddConn->executeNonQuery($query, $array);

//header("Location: command_form.php");
//exit;

?>