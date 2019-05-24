window.onload = function() {

	$(".delBtnUsers").click(function() {
		var id = $(this).attr("id").split("delBtnUsers")[1];
        $("#delConfirmBtn").attr("href", "delete.php?request=Users&id=" + id);
        $("#modalSuppressionUsers").modal('toggle');
        return false;
    });
	
}