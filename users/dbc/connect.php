<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "thedripnetwork";

$dbc = mysqli_connect($servername,$username,$password,$db);
    
if($dbc){

} else{
	die("dbcnecton failed: ".mysqli_connect_error());
}


?>