<?php

require_once('include/include.php');

if (!estConnecte()) {
	header("Location: index.php");
	exit;
}



?>
<div id="container" class="container mt-5">

	<form action="add_command.php" method="POST">
	  <div class="form-group">
		<label for="exportateur">Exportateur</label>
		<input type="text" class="form-control" name="exportateur" placeholder="Exportateur" required>
	  </div>
	  <div class="form-group">
		<label for="quantity">Quantité</label>
		<input type="number" class="form-control" name="quantity" placeholder="Quantité" required>
	  </div>
	  <div class="form-group">
		<label for="type">Type de café</label>
		<input type="text" class="form-control" name="type" placeholder="Type de café" required>
	  </div>
	  <div class="form-group">
		<label for="origine">Origine du café</label>
		<input type="text" class="form-control" name="origine" placeholder="Origine du café" required>
	  </div>
	  <button type="submit" class="btn btn-primary">Ajouter</button>
	</form>
</div>

<?php require_once("include/footer.php"); ?>