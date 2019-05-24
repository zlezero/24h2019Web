<?php

$traitement = True;

require_once("include/include.php");

$required = array('id' => true,
                  'email' => true,
                  'droits' => true,
                  'tel' => true,
                  'numRue' => true,
                  'nomRue' => true,
                  'nomEntreprise' => true,
                  'codePostal' => true,
                  'ville' => true,
                  'mdp' => true,
                  'pays' => true,
                  'mdpConfirm' => true);
				  
foreach ($required as $input => $check_empty) {
	if (!isset($_POST[$input]) AND ($check_empty && empty($_POST[$input])) ) {
		$traitement = False;
	}
}

if ($traitement) {
	if (is_numeric($_POST["tel"]) AND is_numeric($_POST["numRue"]) AND is_numeric($_POST["codePostal"])) {
		if ($_POST["mdp"] == $_POST["mdpConfirm"]) {
			if ($_POST["droits"] == "exportateur" Or $_POST["droits"] == "importateur") {
				try {
					$idPays = $bddConn->executeQueryAndGetResultInArray("SELECT ID FROM pays WHERE Nom = :nom", array('nom' => $_POST["pays"]))[0];
					$arrayParam = array('numrue' => $_POST["numRue"], 'codepostal' => $_POST["codePostal"], 'ville' => $_POST["ville"], 'idpays' => $idPays[0]);
					$bddConn->executeNonQuery("INSERT INTO Adresse(NumRue, CodePostal, Ville, IdPays) VALUES(:numrue, :codepostal, :ville, :idpays)", $arrayParam);
					$maxAdresse = $bddConn->getOneRow("SELECT MAX(ID) FROM adresse");
					$arrayParam = array('typeutilisateur' => ucfirst($_POST["droits"]), 'identifiant' => $_POST["id"], 'mdp' => hash("sha512", $_POST["mdp"]), 'nomentreprise' => $_POST["nomEntreprise"], 'numtel' => $_POST["tel"], 'idadresse' => $maxAdresse);
					$bddConn->executeNonQuery("INSERT INTO Users(TypeUtilisateur, Identifiant, Mdp, NomEntreprise, NumTel, IdAdresse) VALUES(:typeutilisateur, :identifiant, :mdp, :nomentreprise, :numtel, :idadresse)", $arrayParam);
					$_SESSION['status'] = sha1("successInscription");
					header('Location: login.php');
					exit;
				}
				catch (Exception $e) {
					$erreur = True;
				}
			}
		} else {
			$erreurMdp = True;
		}
	}
}
?>

<body>

<div id="container" class="container mt-5">
	
	<?php if (isset($erreur)) { afficherErreur("Une erreur est survenue lors de l'inscription."); }
		  elseif (isset($erreurMdp)) { afficherErreur("Erreur : Les mots de passe ne correspondent pas."); }

	?>
	
	<form method="post" action="" id="formEditBtn">
									
		<div class="form-group">
			<label for="id">Identifiant</label>
			<input type="text" class="form-control" name="id" id="idEdit" placeholder="Identifiant" required>
		</div>
				  
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" id="emailEdit" placeholder="Email" required>
		</div>
				  
		<div class="form-group">
			<label for="droits">Catégorie</label>
			<select name="droits" class="form-control">
				<option value="importateur" id="optionUserEdit">Importateur</option>
				<option value="exportateur" id="optionAdminEdit">Exportateur</option>
			</select>
		</div>
		
		<div class="form-group">
			<label for="nomEntreprise">Nom de l'entreprise</label>
			<input type="text" class="form-control" name="nomEntreprise" id="nomEntreprise" placeholder="Nom de l'entreprise" required>
		</div>
		
		<div class="form-group">
			<label for="tel">Numéro de téléphone</label>
			<input type="number" class="form-control" name="tel" id="telId" placeholder="Numéro de téléphone" required>
		</div>
		
		<div class="form-group">
			<label for="numRue">Numéro de la rue</label>
			<input type="number" class="form-control" name="numRue" id="numRue" placeholder="Numéro de la rue" required>
		</div>
		
		<div class="form-group">
			<label for="nomRue">Nom de rue</label>
			<input type="text" class="form-control" name="nomRue" id="nomRue" placeholder="Nom de la rue" required>
		</div>
		
		<div class="form-group">
			<label for="codePostal">Code postal</label>
			<input type="number" class="form-control" name="codePostal" id="codePostal" placeholder="Code postal" required>
		</div>
		
		<div class="form-group">
			<label for="ville">Ville</label>
			<input type="text" class="form-control" name="ville" id="ville" placeholder="Ville de l'entreprise" required>
		</div>
		
		<div class="form-group">
			<label for="pays">Pays</label>
			<input type="text" class="form-control" name="pays" id="pays" placeholder="Pays de l'entreprise" required>
		</div>
		
		<div class="form-group">
			<label for="mdp" id="labelNewMdp" >Mot de passe</label>
			<input type="password" class="form-control" name="mdp" id="mdp" placeholder="Nouveau mot de passe">
		</div>
		
		<div class="form-group">
			<label for="mdpConfirm" id="labelConfirmNewMdp" >Confirmer le mot de passe</label>
			<input type="password" class="form-control" name="mdpConfirm" id="mdpConfirm" placeholder="Confirmer le nouveau mot de passe">
		</div>
		
		<button type="submit" class="btn btn-success"> <i class="fa fa-sign-in"></i> S'inscrire</button>
		
	</form>
</div>

</body>

<?php require_once("include/footer.php"); ?>

</html>