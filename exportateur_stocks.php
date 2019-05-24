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
	<body>
		
		<div class="tablePadding">
		
			<table class="table" id="tableStocks">
				<thead>
					<td>Type de café</td>
					<td>Quantité de stock</td>
					<td>Action</td>
				</thead>
				<?php while($data = $res->fetch()): ?>

				<tbody>
					<tr>
						<form action="change_stock.php" method="POST">
							<td><?php echo $data['TypeCafe']; ?>						<input type="hidden" name="TypeCafe" value="<?php echo $data['TypeCafe']; ?>">
	</td>
							<td> <input type="number" class="form-control" name="QteStock" value="<?php echo $data['QteStock']; ?>"> </td>
							<td> <button type="submit" class="btn btn-primary">Submit</button> </td>
						</form>
					</tr>
				</tbody>

				<?php endwhile; ?>
			
			
			</table>
		</div>
		
		<?php createDatatable("tableStocks", null); ?>
		
	</body>

</html>

