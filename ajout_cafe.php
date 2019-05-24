<?php

require_once('include/include.php');

if (!estConnecte()) {
	header("Location: index.php");
	exit;
}

?>


<h1>Ajouter une variété de café</h1>

<div id="container" class="container mt-5">

	<form action="add_cafe.php" method="POST">
	  <div class="form-group">
		<label for="type_cafe">Variété de café</label>
		<input type="text" name="type_cafe" class="form-control" aria-describedby="emailHelp" placeholder="Type de café" required>
	  </div>
	  <div class="form-group">
		<label for="pays_provenance">Provenance (pays)</label>
		<input type="text" name="pays_provenance" class="form-control" placeholder="Pays" required>
	  </div>
	  <div class="form-group">
		<label for="quantity">Quantité</label>
		<input type="number" class="form-control" name="quantity" value="0" required>
	  </div>
	  <button type="submit" class="btn btn-primary">Ajouter</button>
	</form>
	
</div>

<?php require_once("include/footer.php"); ?>