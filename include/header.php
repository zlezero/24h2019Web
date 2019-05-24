<?php require_once("include.php"); ?>

<html>

	<?php getRequiredHeader(); ?>
	
	<div class="entete"></div>
	
	<nav>
		<ul>
			<li><a href="index.php" class="imgLogo"> <span class="color"> COF</span> 'TRADE</a></li>
			<li><a href="index.php" title="Accueil">Accueil</a></li>
			<?php if (!estConnecte()) { ?> <li><a href="inscription.php" title="S'inscrire">S'inscrire</a></li> <?php } ?>
			<?php if (!estConnecte()) { ?> <li><a href="login.php" title="Se connecter">Se connecter</a></li> <?php } ?>
			<?php if (estConnecte() AND estExportateur()) { ?> <li><a href="change_stock.php" title="Gestion des stocks">Gestion des stocks</a></li> <?php } ?>
			<?php if (estConnecte()) { ?> <li><a href="logout.php" title="Se déconnecter">Se déconnecter</a></li> <?php } ?>
			<li style="float:right"><a class="active" href="about.php">A propos</a></li>
		</ul>
	</nav>