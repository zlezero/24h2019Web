<?php 

require_once('include/include.php');

if (!estConnecte()) {
	header("Location: index.php");
	exit;
}

$query = "update commandes set etat = :stock where id = :id";
$array = array('stock' => $_POST['etat'], 'id'=> $_POST['id']);
$bddConn->executeNonQuery($query, $array);

header("Location: commands_show.php");
exit;


?>