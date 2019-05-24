<?php

require_once("include/include.php");

?>

<div id="container" class="container mt-5">

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
			<label for="id">Nom de l'entreprise</label>
			<input type="text" class="form-control" name="nom" id="nomEntreprise" placeholder="Nom de l'entreprise" required>
		</div>
		
		<div class="form-group">
			<label for="tel">Numéro de téléphone</label>
			<input type="tel" class="form-control" name="tel" id="telId" placeholder="Numéro de téléphone" required>
		</div>
		
		<div class="form-group">
			<label for="mdp" id="labelNewMdp" >Mot de passe</label>
			<input type="password" class="form-control" name="mdp" id="mdpEdit" placeholder="Nouveau mot de passe">
		</div>
		
		<div class="form-group">
			<label for="mdpConfirm" id="labelConfirmNewMdp" >Confirmer le mot de passe</label>
			<input type="password" class="form-control" name="mdpConfirm" id="mdpConfirmEdit" placeholder="Confirmer le nouveau mot de passe">
		</div>
		
	</form>
</div>