<?php 
include('comman/con.php');
$action = '';
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
}
if($action == 'login')
{
    $email = $_POST['email'];
    $password = $_POST['password'];
}