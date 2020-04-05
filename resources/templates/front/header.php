<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>ISTT CSE</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>
<body>
	<!-- header start -->
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="images/logo.jpg" alt="" /></a>
			</div>
			<h2>Institute of Science Trade & Technology</h2>
			<p>Study materials for free</p>
		</div>
	</div>
	
	
	<div class="row">
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<!---<li class="nav-item">
							<a class="nav-link" href="#">List</a>
						</li>--->
						
						<?php
					if(isset($_SESSION['email'])) {
						$logout = <<<DELIMETER
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Logout</a>
						</li>
DELIMETER;
						echo $logout;
					}
					?>
					</ul>
					
				</div>
			</div>
		</nav>		
	</div>
	<!-- header end -->
