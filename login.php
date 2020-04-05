<?php require_once("resources/config.php");?>


<!DOCTYPE HTML>

<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Student Login | ISTT CSE</title>
	<link rel="stylesheet" type="text/css" href="css/login_style.css" media="all" />
</head>
<body>
	
	<div class="login">
	<h1>Student Login</h1>
	<h2 class="text-center bg-warning" style="color:white;font-size:25px;text-align:center;"><?php display_message(); ?></h2>
    <form method="post">
	<?php login_student(); ?>
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
    </form>
	<p>Design & Developed by <a href="#">Sadek Nurul</a></p>
</div>

</body>
</html>




