<?php 

require_once("include/include.php"); 

if (estConnecte()) {
	header("Location: index.php");
	exit;
}

if (isset($_POST["id"]) AND !empty($_POST["id"]) AND isset($_POST["pwd"]) AND !empty($_POST["pwd"])) {
	
	try {
		
		$req = $bddConn->getConn()->prepare('Select id, TypeUtilisateur FROM users WHERE identifiant = :identifiant AND mdp = :mdp');
	
		$req->execute(array(
			'identifiant' => $_POST["id"],
			'mdp' => hash("sha512", $_POST["pwd"])
		));
		
		$result = $req->fetch(PDO::FETCH_OBJ);
		
		if(!isset($result->id) OR !isset($result->TypeUtilisateur)) {
			$_SESSION["connexionInvalide"] = True;
		} else {
			$_SESSION['estConnecte'] = True;
			$_SESSION['idUser'] = $result->id;
			$_SESSION['droits'] = $result->TypeUtilisateur;
			header('Location: index.php');
			exit;
		}
		
	} catch (Exception $e) {
		$_SESSION["erreurTraitement"] = True;
	}

}


?>

	<body>
	
		<div id="container" class="container mt-5">

			<div class="row mt-2">
			  <div class="col-md-3"></div>
			  <div class="col-md-6">
				<h1>Connexion</h1>
				<hr>
				<?php 
					if (isset($_SESSION["connexionInvalide"])) { #Si il y a eu une erreur on l'affiche
						afficherErreur("<strong>Identifiant</strong> ou <strong>mot de passe</strong> incorrect !");
						unset($_SESSION['connexionInvalide']);
					} elseif (isset($_SESSION["erreurTraitement"])) {
						afficherErreur("Une erreur est survenue lors de la connexion.");
						unset($_SESSION['erreurTraitement']);
					}
				?>
			  </div>
			</div>

			<form class="form-group" action="login.php" method="post">

				<div class="row">

				<div class="col-md-3"></div>
				<div class="col-md-6">
				  <label for="id">Identifiant :</label>
				  <input type="text" class="form-control" id="id" name="id" placeholder="Identifiant" required>
				</div>
			  </div>

			  <div class="row mt-2">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				  <label for="pwd">Mot de passe :</label>
				  <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Mot de passe" required>
				</div>
			  </div>

			  <div class="row mt-2">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				  <button type="submit" class="btn btn-success"> <i class="fa fa-sign-in"></i> Se connecter</button>
				</div>
			  </div>

			</form>

		 </div>
	</body>
	
	<?php require_once("include/footer.php"); ?>
	
 </html>