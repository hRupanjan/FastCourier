<?php
session_start();
error_reporting(0);
require './shared.php';
$con = mysqli_connect($host, $user, $password, $database);
 // Starting Session
//$error=''; // Variable To Store Error Message
//if (isset($_POST['submit'])) {
if (empty($_POST['userid']) || empty($_POST['pass'])) {
echo "Please enter your user ID and Password!";
}
else
{

$email=$_POST['userid'];
    //echo $email;
$password=$_POST['pass'];


$email = stripslashes($email);
$password = stripslashes($password);
$email = mysqli_real_escape_string($con,$email);
$password = mysqli_real_escape_string($con,$password);

$query = mysqli_query($con,"select * from mst_user where login_pass='$password' AND email='$email'");
    //echo $query;
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$email;
//header("location: ../../panel.php"); 
    die('true');
} else {
echo "Username or Password is invalid";
}
}
//}

?>