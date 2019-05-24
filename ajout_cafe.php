<?php

if (estConnecte()) {
	header("Location: index.php");
	exit;
}
require_once("include/header.php");

?>

<h1>Ajouter une variété de café</h1>

<form action="add_cafe.php" method="POST">
  <div class="form-group">
    <label for="type_cafe">Variété de café</label>
    <input type="text" name="type_cafe" class="form-control" aria-describedby="emailHelp" placeholder="Type de café">
  </div>
  <div class="form-group">
    <label for="pays_provenance">Provenance (pays)</label>
    <input type="text" name="pays_provenance" class="form-control" placeholder="Pays">
  </div>
  <div class="form-group">
  	<label for="quantity">Quantité</label>
    <input type="number" class="form-control" name="quantity">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>