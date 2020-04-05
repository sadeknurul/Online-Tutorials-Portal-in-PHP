<?php require_once("resources/config.php");?>
<?php 
	if(!isset($_SESSION['email'])){
		redirect("login.php");
	}
?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
	
	<div class="container margin-top-20">
		<h2 class="bg-success text-center"><?php //display_message(); ?></h2>
		<div class="row">
		<?php courses_in_index() ?>
			
		</div>
	</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
