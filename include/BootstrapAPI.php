<?php


function getRequiredHeader() {
	?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="js/sorttable.js"></script>
		<script>sorttable.sort_alpha = function(a,b) { return a[0].localeCompare(b[0]); }</script>
		<script src="js/datatables.min.js"></script>
		<script src="js/clipboard.min.js"></script>
		<script src="js/BootstrapAPI.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<?php
}


function createModal($id, $header, $content, $footerBtnText, $jsCallback, $triggerInstant) {
	
	?>
	
	<div class="modal fade" id="<?php echo $id; ?>">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			  
				<!-- Modal Header -->
				<div class="modal-header">
				  <?php echo $header; ?>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body">
				  <?php echo $content; ?>
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
				  <button id="<?php echo $id; ?>ConfirmButton" class="btn btn-danger" onclick="<?php echo $jsCallback.'()'?>" ><?php echo $footerBtnText; ?></a>
				</div>
				
			</div>
		</div>
	</div>
	
	<?php
	
	if ($triggerInstant) {
		callModal($id);
	}
	
}

function callModalOnClick($modalId) {
	echo "onclick='$(\"#".$modalId."\").modal(\"toggle\");'";
}

function callModal($modalId) {
	echo '<script>$("#'.$modalId.'").modal(\'toggle\');</script>';
}

function createDatatable($tableId, $preDrawJSFunction) {
	?>
	
		<script>
			
			$('#<?php echo $tableId; ?>')
				.DataTable(DataTableStrings)
				.on( 'preDraw.dt',   function () { <?php if ($preDrawJSFunction != null) { echo $preDrawJSFunction."();"; } ?> } );
			$('#<?php echo $tableId; ?>').attr("class", "table sortable");

		</script>
	
	<?php
	
}



?>