<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "users";

$conn = mysqli_connect($server, $user, $password,$db);
mysqli_select_db($conn,'users');
if(!$conn){
die("Connection failed: " . mysqli_connect_error());
}


?>