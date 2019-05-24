<?php

require_once('include/include.php');

if (!estConnecte()) {
	header("Location: index.php");
	exit;
}

try {
	
	$var_post = array( $_POST['pays_provenance'],$_POST['type_cafe'], $_POST['quantity'] );

	foreach( $var_post as $val) {
		if (!isset($val) || empty($val)) {
			header("Location: ajout_cafe.php");
			exit;
		}
	}


	$table = "typecafe";

	$query_id_pays = "select id from pays where nom = :provenance";
	$array = array('provenance' => $_POST['pays_provenance']);
	$provenance = $bddConn->executeNonQuery($query_id_pays, $array);

	$query = "insert into typecafe(TypeCafe, Provenance, QteStock) values(:type, :provenance, :quantity)";
	$array = array('type' => $_POST['type_cafe'],
					'provenance' => $provenance,
					'quantity' => $_POST['quantity']);
	$bddConn->executeNonQuery($query, $array);

	header("Location: index.php");
	exit;
	
} catch (Exception $e) {
	header("Location: index.php");
	exit;
}



?>