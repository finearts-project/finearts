<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);

$GLOBALS['link'] = mysqli_connect('localhost', 'root', 'root', 'fine_arts')or die("Error Connecting to PHPmyadmin"); 
// $GLOBALS['link'] = mysqli_connect('localhost', 'dbconfiguser', 'DBasdfjkl@!20', 'sakra_main')or die("Error Connecting to PHPmyadmin"); 
$base_url = ''; 


// Encryption Algorithm
$GLOBALS['secret_key'] = "FineArts";
?>