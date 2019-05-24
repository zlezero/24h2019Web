<?php

session_start();
$bddConn = new BDDApi("localhost", "EquipeVelizy2", "user1", "user1");


function estConnecte() {
	
	if (isset($_SESSION['estConnecte']) AND isset($_SESSION['droits']) AND isset($_SESSION['idUser'])) {
		if ($_SESSION['estConnecte'] == True AND ($_SESSION['droits'] == "Exportateur" OR $_SESSION['droits'] == "Importateur") AND is_numeric($_SESSION['idUser'])) {
				return True;
		}
	}
	
	return False;
	
}

function estExportateur() {
	
	if (isset($_SESSION['droits'])) {
		return ($_SESSION['droits'] == "Exportateur");
	}

	return False;
}

function estImportateur() {
	
	if (isset($_SESSION['droits'])) {
		return ($_SESSION['droits'] == "Importateur");
	}

	return False;
}

?>