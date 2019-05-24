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
<table class="table">
	<tr>
		<td>Type</td>
		<td>Origine</td>
		<td>Quantité</td>
		<td>Exportateur</td>
		<td>Date</td>
		<td>Etat</td>
		<td></td>
	</tr>
	<?php while($data = $res->fetch()): ?>
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
		<option value="valide"> valide </option>
		<option value="prepare">prepare</option>
		<option value="attente">attente</option>
		<option value="expedie">expedie</option>
		<option value="comfirme">comfirme</option>
		<option value="annule">annule</option></select>
		<input type="submit" class="form-control">
		</form></td>

	</tr>
	<?php endwhile; ?>
</table>