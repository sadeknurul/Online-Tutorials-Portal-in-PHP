<?php

//helper functions
date_default_timezone_set('Asia/Dhaka');
function last_id() {
	global $connection;
	return mysqli_insert_id($connection);
}

function set_message($msg) {
	if(!empty($msg)) {
		$_SESSION['message'] = $msg;
	} else {
		$msg = "";
	}
}

function display_message() {
	if(isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function redirect($location){
	header("Location: $location");
}

function query($sql){
	global $connection;
	return mysqli_query($connection,$sql);
}

function confirm($result){
	global $connection;
	if(!$result){
		die("QUERY FAILED" . mysqli_error($connection));
	}
}

function escape_string($string){
	global $connection;
	return mysqli_real_escape_string($connection,$string);
}

function fetch_array($result){
	
	return mysqli_fetch_array($result);
}

function remove_slashes($string){
	$text = str_replace("\\r\\n", "", $string);
	$text = implode("",explode("\\",$text));
	return $text;
}

/***************Front End Functions*****************/
/**** index page ****/
function courses_in_index() {
	$query = query("SELECT * FROM courses ORDER BY id DESC");
	confirm($query);
	while($row = fetch_array($query)) {
		$course = <<<DELIMETER
			<div class="col-md-3">
			<div class="card">
				<img src="resources/tutorial-images/{$row['image']}" class="card-img-top" alt="images.png">
				<div class="card-body">
					<a href="single-tutorial.php?id={$row['id']}&tutorial={$row['name']}"><h5 class="card-title">{$row['name']}</h5></a>
						
					<a href="single-tutorial.php?id={$row['id']}&tutorial={$row['name']}" class="btn btn-primary">Explore Course</a>
				</div>
			</div>
		</div>
DELIMETER;
		echo $course;
			
	}
}
function video_tutorials() {
	$query = query("SELECT * FROM tutorials WHERE category='video' AND course_id = " . escape_string($_GET['id']). " ");
	confirm($query);
	$i = 0;
	while($row = fetch_array($query)) {
		$i++;
		$tutorial = <<<DELIMETER
			<tr>
				<td>{$i}</td>
				<td><a href="{$row['link']}" target="_blank">{$row['title']}</a></td>
				<td>{$row['date']}</td>
			</tr>
DELIMETER;
		echo $tutorial;
			
	}
}
function document_tutorials() {
	$query = query("SELECT * FROM tutorials WHERE category='document' AND course_id = " . escape_string($_GET['id']). " ");
	confirm($query);
	$i = 0;
	while($row = fetch_array($query)) {
		$i++;
		$tutorial = <<<DELIMETER
			<tr>
				<td>{$i}</td>
				<td><a href="{$row['link']}" target="_blank">{$row['title']}</a></td>
				<td>{$row['date']}</td>
			</tr>
DELIMETER;
		echo $tutorial;
			
	}
}
// patient register

function patient_register() {
	if(isset($_POST['register'])) {
		$name               = escape_string($_POST['name']);
		$phone         = escape_string($_POST['phone']);
		$email   = escape_string($_POST['email']);
		$password         = escape_string($_POST['password']);
		$gender     = escape_string($_POST['gender']);
		$image         = $_FILES['image']['name'];
		$image_temp_location = $_FILES['image']['tmp_name'];
		//making the unique name
		$div = explode('.', $image);
		$file_ext = strtolower(end($div));
		$unique_file = substr(md5(time()), 0, 10).'.'.$file_ext;
		
		$date=date(" jS \ F, Y ");
		//email check
		$query1    = query("select * from patients where email='$email'");
	    if(mysqli_num_rows($query1) > 0 ){
		   set_message("Sorry this email is used.Please try with another email !");
		   
	    }
		else {
			move_uploaded_file($image_temp_location , PATIENT_DIRECTORY . DS . 	$unique_file);

			$query = query("INSERT INTO patients(name, image, phone, email, password, gender, date) VALUES('{$name}','{$unique_file}','{$phone}','{$email}','{$password}','{$gender}','{$date}')");
			confirm($query);
			set_message("Registration Successful");
		}
	}
}

//Patient login

function login_student() {
	if(isset($_POST['login'])) {
		$email    = escape_string($_POST['email']);
		$password = escape_string($_POST['password']);
		$query    = query("SELECT * FROM students WHERE email = '{$email}' AND password = '{$password}'");
		
		confirm($query);
		if(mysqli_num_rows($query) == 0){
			set_message("Invalid !");
			redirect("index.php");
		} else {
			$_SESSION['email'] = $email;
			redirect("index.php");
		}
	}
	
	
	
	
	
}

// contact page

function send_messsage() {
	if(isset($_POST['submit'])) {
		$to        = "sadeknurul5@gmail.com";
		$form_name = $_POST['name'];
		$email     = $_POST['email'];
		$phone   = $_POST['phone'];
		$message   = $_POST['message'];
		$header    = "From: {$form_name} {$email}";
		$result    = mail($to,$phone,$message,$header);
		if(!$result) {
			set_message("Sorry we could not send your message");
			redirect("contact.php");
		} else {
			set_message("Your message has been sent");
			redirect("contact.php");
		}
	}
}





/***************Back End Functions Start*****************/

//login page

function login_admin() {
	if(isset($_POST['login'])) {
		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);
		$query = query("SELECT * FROM admins WHERE username = '{$username}' AND password = '{$password}'");
		
		confirm($query);
		if(mysqli_num_rows($query) == 0){
			set_message("Invalid");
			redirect("login.php");
		} else {
			$_SESSION['username'] = $username;
			redirect("../admin");
		}
	}
}
// Change Password
function change_password() {
	if(isset($_POST['change_password'])){
		$c_password   = escape_string($_POST['c_password']);
		$n_password   = escape_string($_POST['n_password']);
		$cn_password  = escape_string($_POST['cn_password']);
		$username     = $_SESSION['username'];
		$query=query("select * from admins where password='$c_password' AND username='$username'");
		confirm($query);
		$rows = mysqli_num_rows($query);
	
	    if($rows == 0) {
			set_message("Your Current Password is Wrong !");
			//redirect("index.php?change_password");
		}
		else if($n_password != $cn_password) {
			set_message("Password not match !");
			//redirect("index.php?change_password");
		}
		else {
			$update_pass=query("update admins set password='$n_password' where username='$username'");
			confirm($update_pass);
			set_message("Your Password was Updated Successfully !");
			//redirect("index.php?change_password");
		}
	
  }
}
// courses in admin
function courses_in_admin() {
	$query = query("SELECT * FROM courses ORDER by id DESC");
	confirm($query);
	$i = 0;
	while($row = fetch_array($query)) {
		$i++;
		$course = <<<DELIMETER
		<tr>
            <td>{$i}</td>
            <td><a href="index.php?edit_course&id={$row['id']}">{$row['name']}</a>
            </td>
            <td><img src="../resources/tutorial-images/{$row['image']}" width='100'  alt=""></td>
            <td>{$row['date']}</td>
			<td class="delete_permission"><a class="btn btn-danger course_container" href="../resources/templates/back/delete-course.php?id={$row['id']}"><span class="glyphicon glyphicon-remove"></span>Delete</a></td>
        </tr>

           
DELIMETER;

echo $course;
	}
}
// Add course
function add_course() {


if(isset($_POST['publish'])) {

$name        = escape_string($_POST['name']);
$image               = $_FILES['image']['name'];
$image_temp_location = $_FILES['image']['tmp_name'];
//making the unique name
$div = explode('.', $image);
$file_ext = strtolower(end($div));
$unique_file = substr(md5(time()), 0, 10).'.'.$file_ext;
$date = date(' jS \ F Y , g:i a');

move_uploaded_file($image_temp_location , TUTORIAL_DIRECTORY . DS . $unique_file);

$query = query("INSERT INTO courses(name, image, date) VALUES('{$name}','{$unique_file}','{$date}')");
$last_id = last_id();
confirm($query);
set_message("New Course with id {$last_id} was Added");
redirect("index.php?courses");
        }


}
// Update Course

function update_course() {
	if(isset($_POST['update'])) {

		$name        		 = escape_string($_POST['name']);
		$image               = $_FILES['image']['name'];
		$image_temp_location = $_FILES['image']['tmp_name'];

		if(empty($image)) {
			$get_pic = query("SELECT image FROM courses WHERE id = " . escape_string($_GET['id']). "");
			confirm($get_pic);
			while($pic = fetch_array($get_pic)) {
				$image = $pic['image'];
			}
		}
		else {
			$div = explode('.', $image);
			$file_ext = strtolower(end($div));
			$unique_file = substr(md5(time()), 0, 10).'.'.$file_ext;
			$image = $unique_file;
			move_uploaded_file($image_temp_location , TUTORIAL_DIRECTORY . DS . $image);
		}
		
		$query  = "UPDATE courses SET ";
		$query .= "name       = '{$name}'       , ";
		$query .= "image    = '{$image}'           ";
		$query .= "WHERE id = " . escape_string($_GET['id']);
		$send_update_query = query($query);
		confirm($send_update_query);
		set_message("Course has been Updated");
		redirect("index.php?courses");


    }
}
function course_name($id){
	$query = query("SELECT * FROM courses WHERE id = " . escape_string($id). " ");
	confirm($query);
	$row = fetch_array($query);
	return $row['name'];
}
// courses in admin
function tutorials_in_admin() {
	$query = query("SELECT * FROM tutorials ORDER by id DESC");
	confirm($query);
	$i = 0;
	while($row = fetch_array($query)) {
		$i++;
		$course_name = course_name($row['course_id']);
		$tutorial = <<<DELIMETER
		<tr>
            <td>{$i}</td>
            <td><a href="index.php?edit_tutorial&id={$row['id']}">{$row['title']}</a>
            </td>
            <td>{$course_name}</td>
            <td><a href="{$row['link']}" target="_blank">{$row['link']}</a></td>
            <td>{$row['category']}</td>
            <td>{$row['date']}</td>
			<td class="delete_permission"><a class="btn btn-danger course_container" href="../resources/templates/back/delete-tutorial.php?id={$row['id']}"><span class="glyphicon glyphicon-remove"></span>Delete</a></td>
        </tr>

           
DELIMETER;

echo $tutorial;
	}
}
// course dropdown
function course_dropdown(){
	$query = query("SELECT * FROM courses ORDER BY id DESC");
	confirm($query);
	while($row = fetch_array($query)){
		$name = <<<DELIMETER
			<option value="{$row['id']}">{$row['name']}</option>
DELIMETER;
	echo $name;
	}
}
// Add Tutorial
function add_tutorial() {


if(isset($_POST['publish'])) {

$title       = escape_string($_POST['title']);
$course_id   = escape_string($_POST['course_id']);
$link        = escape_string($_POST['link']);
$category    = escape_string($_POST['category']);
$date 		 = date(' jS \ F Y , g:i a');


$query = query("INSERT INTO tutorials(title, course_id, link, category, date) VALUES('{$title}','{$course_id}','{$link}','{$category}','{$date}')");
$last_id = last_id();
confirm($query);
set_message("New tutorial with id {$last_id} was Added");
redirect("index.php?tutorials");
        }


}
// Update Tutorial

function update_tutorial() {
	if(isset($_POST['update'])) {

		$title       = escape_string($_POST['title']);
		$course_id   = escape_string($_POST['course_id']);
		$link        = escape_string($_POST['link']);
		$category    = escape_string($_POST['category']);
		$query  = "UPDATE tutorials SET ";
		$query .= "title       = '{$title}'       , ";
		$query .= "course_id       = '{$course_id}'       , ";
		$query .= "link       = '{$link}'       , ";
		$query .= "category    = '{$category}'           ";
		$query .= "WHERE id = " . escape_string($_GET['id']);
		$send_update_query = query($query);
		confirm($send_update_query);
		set_message("Tutorial has been Updated");
		redirect("index.php?tutorials");


    }
}

// students in admin
function students_in_admin() {
	$query = query("SELECT * FROM students ORDER by id DESC");
	confirm($query);
	$i = 0;
	while($row = fetch_array($query)) {
		$i++;
		$student = <<<DELIMETER
		<tr>
            <td>{$i}</td>
            <td>{$row['name']}</td>
            <td>{$row['session']}</td>
            <td>{$row['email']}</td>
            <td>{$row['date']}</td>
			<td class="delete_permission"><a class="btn btn-danger course_container" href="../resources/templates/back/delete-student.php?id={$row['id']}"><span class="glyphicon glyphicon-remove"></span>Delete</a></td>
        </tr>

           
DELIMETER;

echo $student;
	}
}
// Add Student
function add_student() {


if(isset($_POST['publish'])) {

$name       = escape_string($_POST['name']);
$session   = escape_string($_POST['session']);
$email        = escape_string($_POST['email']);
$password    = escape_string($_POST['password']);
$date 		 = date(' jS \ F Y , g:i a');


$query = query("INSERT INTO students(name, session, email, password, date) VALUES('{$name}','{$session}','{$email}','{$password}','{$date}')");
$last_id = last_id();
confirm($query);
set_message("New student with id {$last_id} was Added");
redirect("index.php?students");
        }


}






?>