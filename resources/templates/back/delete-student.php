<?php
	require_once("../../config.php");
	
	if(isset($_GET['id'])) {
		$query = query("DELETE FROM students WHERE id = ".escape_string($_GET['id'])."");
		confirm($query);
		set_message("Student has been Deleted");
		redirect("../../../admin/index.php?students");
	} else {
		redirect("../../../admin/index.php?students");
	}

?>