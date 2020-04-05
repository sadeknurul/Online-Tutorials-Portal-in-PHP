<?php
	require_once("../../config.php");
	
	if(isset($_GET['id'])) {
		$query = query("DELETE FROM tutorials WHERE id = ".escape_string($_GET['id'])."");
		confirm($query);
		set_message("Tutorial has been Deleted");
		redirect("../../../admin/index.php?tutorials");
	} else {
		redirect("../../../admin/index.php?tutorials");
	}

?>