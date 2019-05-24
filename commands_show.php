<?php

require_once('include/include.php');

if (!estConnecte()) {
	header("Location: index.php");
	exit;
}

$query = "select id, Type, Origine,	QteCafe, Exportateur, Date, etat from commandes where etat ='en cours' and exportateur = :exportateur" ;
$res = $bddConn->executeQueryAndGetReq($query, array("exportateur"=>$_SESSION['idUser']));

?>

<h1>Commandes</h1>
<div class="tablePadding">
	<table class="table" id="tableauCommandes" >
		<thead>
			<td>Type</td>
			<td>Origine</td>
			<td>Quantité</td>
			<td>Exportateur</td>
			<td>Date</td>
			<td>Etat</td>
			<td></td>
		</thead>
		<?php while($data = $res->fetch()): ?>
		<tbody>
			<tr>
				<td><?php echo $data['Type'] ?></td>
				<td><?php  echo $data['Origine'] ?></td>
				<td><?php echo $data['QteCafe'] ?></td>
				<td><?php  echo $data['Exportateur'] ?></td>
				<td><?php  echo $data['Date'] ?></td>
				<td><?php  echo $data['etat'] ?></td>

				<td>
				<form action='changestate.php' method= 'post'>
					<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
				<select name="etat">
				<option value="valide">Validé</option>
				<option value="prepare">Preparé</option>
				<option value="attente">Attente</option>
				<option value="expedie">Expédié</option>
				<option value="comfirme">Confirmé</option>
				<option value="annule">Annulé</option></select>
				<input type="submit" class="form-control btn btn-primary">
				</form></td>

			</tr>
		</tbody>
		<?php endwhile; ?>
	</table>
</div>


<?php 

createDatatable("tableauCommandes", null);

require_once("include/footer.php"); ?>