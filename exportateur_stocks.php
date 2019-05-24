<?php

require_once('include/include.php');

if (!estConnecte()) {
	header("Location: index.php");
	exit;
}

$query = "select TypeCafe, QteStock from typecafe where exportateur = :exportateur";
$array = array('exportateur' => $_SESSION['idUser']);

$res = $bddConn->executeQueryAndGetReq($query, $array);



?>
<table class="table">
	<?php while($data = $res->fetch()): ?>

		<tr>
			<form action="change_stock.php" method="POST">
				<td><?php echo $data['TypeCafe']; ?></td>
				<input type="hidden" name="TypeCafe" value="<?php echo $data['TypeCafe']; ?>">
				<td> <input type="number" class="form-control" name="QteStock" value="<?php echo $data['QteStock']; ?>"> </td>
				<td> <button type="submit" class="btn btn-primary">Submit</button> </td>
			</form>
		</tr>

	<?php endwhile; ?>
</table>