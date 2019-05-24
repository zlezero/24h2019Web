<?php

class BDDApi {
	
	private $_BddConn;
	
	public function __construct($host, $database, $login, $password) {
		try {		
			$this->_BddConn = new PDO('mysql:host='.$host.';dbname='.$database.';charset=utf8', ''.$login.'', ''.$password.'', array(PDO::ATTR_EMULATE_PREPARES=>false, PDO::MYSQL_ATTR_DIRECT_QUERY=>false, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));	
		} catch(Exception $e) {
			die('Erreur de connexion à la bdd : '.$e->getMessage());
		}
	}
	
	public function getOneRow($command) {
		$reponse = $this->_BddConn->query($command);
		$row = $reponse->fetch();
		$reponse->closeCursor();
		return $row[0];
	}
	
	public function executeQueryAndGetResultInArray($command, $paramArray) {
		
		$req = $this->_BddConn->prepare($command);	
		$req->execute($paramArray);
		
		$arrayReponses = array();
		//$compteur = 0;
		
		while ($donnees = $req->fetch()) {
			$arrayReponses[] = $donnees;
			//$compteur++;
		}

		return $arrayReponses;
	}
	
	public function executeQueryAndGetReq($command, $paramArray) {	
		$req = $this->_BddConn->prepare($command);	
		$req->execute($paramArray);
		return $req;
	}
	
	public function executeNonQuery($command, $paramArray) {
		
		try {
			$req = $this->_BddConn->prepare($command);	
			$req->execute($paramArray);
			return true;
		} catch (Exception $e) {
			return false;
		}
		
	}
	
	public function getConn() {
		return $this->_BddConn;
	}
	
}

?>