<?php

require_once("include/include.php");


?>

	<body>
	
	
		<?php
		
			if (isset($_SESSION["status"])) {
			
				switch ($_SESSION["status"]) {
					case "6435cb6d73c2cfdb5f7106d9d0e515a2f608ac40": //Succès suppression
						afficherSucces("La suppression a été effectuée !");
						break;
					case "1fbd1ac28aa66cc1c9630981edb77739e1577582": //Erreur suppression
						afficherErreur("Une erreur est survenue lors de la suppression du pays.");
						break;
						
				}
				
				unset($_SESSION["status"]);
			
			}
		
		
		?>
		
		<div class="tablePadding">
			<table class="table sortable" id="tableData" >
				<thead>
					<tr class="text-center">
						<th scope="col">Id</th>
						<th scope="col">Nom</th>
						<th scope="col">Capitale</th>
						<th scope="col">Drapeau</th>
						<th scope="col">Description</th>
						<th scope="col">Habitants (en millions)</th>
						<th scope="col">Surface (en km²)</th>
						<th scope="col">Qté. café prod. (en tonnes)</th>
						<th scope="col">Qté. café prod. (en % de la pop. mondiale)</th>
						<?php if (!estConnecte()) { ?> <th scope="col" class="sorttable_nosort">Actions</th> <?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php 
					
					$req = $bddConn->executeQueryAndGetReq("SELECT * FROM Pays", array());
					$compteurId = 1;
					
					while ($donnees = $req->fetch()) {
						
						?>
						<tr class="text-center">
							<td scope="row"><strong><?php echo $compteurId; ?></strong></td>
							<td id="dataNom<?php echo $donnees["id"]; ?>"><?php echo $donnees["Nom"]; ?></td>
							<td id="dataCapitale<?php echo $donnees["id"]; ?>"><?php echo $donnees["Capitale"]; ?></td>
							<td id="dataDrapeau<?php echo $donnees["id"]; ?>"><img class="drapeau" src="<?php echo $donnees["CheminDrapeau"]; ?>" alt="Drapeau <?php echo $donnees["Nom"]; ?>"> </td>
							<td id="dataDescription<?php echo $donnees["id"]; ?>"><?php echo $donnees["Description"]; ?></td>
							<td id="dataNbrHab<?php echo $donnees["id"]; ?>"><?php echo number_format($donnees["NbrHab"]); ?></td>
							<td id="dataSurface<?php echo $donnees["id"]; ?>"><?php echo number_format($donnees["Surface"]); ?></td>
							<td id="dataQteCafeProdTonnes<?php echo $donnees["id"]; ?>"><?php echo $donnees["QteCafeProd"]; ?></td>
							<td id="dataQteCafeProdPourcentage<?php echo $donnees["id"]; ?>"><?php echo $donnees["QteCafeProd"]; ?></td>
							<?php if (!estConnecte()) { ?> <td>
						
								<a href="#" class="btn btn-primary a-btn-slide-text editBtn" id="editBtn<?php echo $donnees["id"]; ?>">
									<span class="fa fa-edit" aria-hidden="true"></span>
									<span><strong>Editer</strong></span>            
								</a>
								
								<a href="#" id="delBtnPays<?php echo $donnees["id"]; ?>" class="btn btn-danger a-btn-slide-text delBtnPays">
									<span class="fa fa-remove" aria-hidden="true"></span>
									<span><strong>Supprimer</strong></span>            
								</a>
							
							</td> <?php } ?>			
						</tr>
						<?php
						
						$compteurId += 1;
					}
					
					createDatatable("tableData", null);
					
					?>
				</tbody>
			</table>
		</div>
		
		<?php createModal("ModalSupprPaysProd", "Confirmation", "Êtes-vous sur de vouloir supprimer ce pays ?", "Supprimer", null, null, False); ?>
	
	</body>
	
	<?php require_once("include/footer.php"); ?>
	
</html>