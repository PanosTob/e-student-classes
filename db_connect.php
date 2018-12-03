<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "e-classesdb";

if(!isset($mysql)){
	$mysql = new mysqli($server,$username,$password,$dbname);
}
if ($mysql->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$mysql->set_charset("utf8");
?>