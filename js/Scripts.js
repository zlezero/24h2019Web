window.onload = function() {
		
	$(".delBtnPays").click(function() {
			var id = $(this).attr("id").split("delBtnPays")[1];
			$("#ConfirmButton").attr("href", "delete.php?request=Pays&id=" + id);
			$("#ModalSupprPaysProd").modal('toggle');
			return false;
	});
	
}
