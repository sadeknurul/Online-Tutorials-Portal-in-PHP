<?php
	require_once("../../config.php");
	
	if(isset($_GET['id'])) {
		$query = query("DELETE FROM courses WHERE id = ".escape_string($_GET['id'])."");
		confirm($query);
		set_message("Course has been Deleted");
		redirect("../../../admin/index.php?courses");
	} else {
		redirect("../../../admin/index.php?courses");
	}

?>