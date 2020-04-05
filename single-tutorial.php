<?php require_once("resources/config.php");?>
<?php 
	if(!isset($_SESSION['email'])){
		redirect("login.php");
	}
	if(!isset($_GET['id']) && !isset($_GET['tutorial'])){
			redirect("index.php");
	}
	
?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
	
	<div class="container">
		<?php 
			if(isset($_GET['tutorial'])){
				echo "<h2 class='text-center bg-primary margin-top-20'>{$_GET['tutorial']}</h2>";
			}
		?>
		<div class="row">
			<div class="col-md-6">
				<h3 class="bg-light">Video Tutorials</h3>
				<table id="video" class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Title</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php video_tutorials(); ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<h3 class="bg-light">Document Tutorials</h3>
				<table id="document" class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>S.N</th>
							<th>Title</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php document_tutorials(); ?>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>