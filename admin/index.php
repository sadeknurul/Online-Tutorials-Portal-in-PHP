<?php require_once("../resources/config.php");?>
<?php
	if(!isset($_SESSION['username'])) {
		redirect("login.php");
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ISTT Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include(TEMPLATE_BACK . DS . "side_nav.php"); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include(TEMPLATE_BACK . DS . "top_nav.php"); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading 
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			</div>-->
			<?php
				 if($_SERVER['REQUEST_URI'] == "/istt-tutorial/admin/" || $_SERVER['REQUEST_URI'] == "/istt-tutorial/admin/index.php") {
					 //include(TEMPLATE_BACK . DS . "admin_content.php");
				 }
				 
				 if(isset($_GET['courses'])) {
					 include(TEMPLATE_BACK . DS . "courses.php");
				 }
				 
				 if(isset($_GET['add_course'])) {
					 include(TEMPLATE_BACK . DS . "add-course.php");
				 }
				 if(isset($_GET['edit_course'])) {
					 include(TEMPLATE_BACK . DS . "edit-course.php");
				 }
				 if(isset($_GET['tutorials'])) {
					 include(TEMPLATE_BACK . DS . "tutorials.php");
				 }
				 if(isset($_GET['add_tutorial'])) {
					 include(TEMPLATE_BACK . DS . "add-tutorial.php");
				 }
				 if(isset($_GET['edit_tutorial'])) {
					 include(TEMPLATE_BACK . DS . "edit-tutorial.php");
				 }
				 if(isset($_GET['students'])) {
					 include(TEMPLATE_BACK . DS . "students.php");
				 }
				 if(isset($_GET['add_student'])) {
					 include(TEMPLATE_BACK . DS . "add-student.php");
				 }
				 
				 
				 
				 if(isset($_GET['change_password'])) {
					 include(TEMPLATE_BACK . DS . "change_password.php");
				 }
				 
				 
			?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include(TEMPLATE_BACK . DS . "footer.php"); ?>
