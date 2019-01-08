<?php
session_start();
require_once("db_connect.php");
if(!isset($_SESSION['username'])){
	$u = $_REQUEST['username'];
	$p = $_REQUEST['password'];
	$sql = "select username,curr_sem,is_teacher,count(*) as ok from students where username=? and password=?";//and passwd_enc=PASSWORD(?)
	$stmt = $mysql->prepare($sql);
	$stmt->bind_param("ss",$u,$p);
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()){
		if($row['ok'] == 1){
			$_SESSION['username'] = $row['username'];
			$_SESSION['semester'] = $row['curr_sem'];
			$_SESSION['is_teacher'] = $row['is_teacher'];
			header("Location:main_window.php");
		}else{
			header('Location: index.php?wrong_credentials=1');
		}
	}
}else{
	header("Location:main_window.php");
}

?>