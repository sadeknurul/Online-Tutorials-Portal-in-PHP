<?php
ob_start();
session_start();
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS ."templates/front");
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS ."templates/back");


defined("TUTORIAL_DIRECTORY") ? null : define("TUTORIAL_DIRECTORY", __DIR__ . DS . "tutorial-images");
defined("PATIENT_DIRECTORY") ? null : define("PATIENT_DIRECTORY", __DIR__ . DS . "patient-images");


 
defined("DB_HOST") ? null : define("DB_HOST","localhost");
defined("DB_USER") ? null : define("DB_USER","root");
defined("DB_PASS") ? null : define("DB_PASS","");
defined("DB_NAME") ? null : define("DB_NAME","istt_tutorial");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
mysqli_query($connection,'SET CHARACTER SET utf8');

mysqli_query($connection,"SET SESSION collation_connection ='utf8_general_ci'");
require_once("functions.php");


?>