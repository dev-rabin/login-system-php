<?php 
$server = "localhost";
$user = "root";
$password = "";


$connection = mysqli_connect($server, $user, $password);
mysqli_select_db($connection,'users');
if(!$connection){
die("Unsuccesful". mysqli_connect_error());
}


?>