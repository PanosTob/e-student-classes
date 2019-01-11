<?php
session_start();
require_once("db_connect.php");

$sqlFind = "select * from courses where name=?";
$stmtFind = $mysql->prepare($sqlFind);
$stmtFind->bind_param("s",$_REQUEST["course_name"]);
$stmtFind->execute();
	
$resultFind = $stmtFind->get_result();
$rowFind = $resultFind->fetch_assoc(); // H GRAMMI POY PERIEXEI TO ID TOU MATHIMATOS

$sqlCheck = "select count(*) as found from teaches where courseID=? and studentID=?";
$stmtCheck = $mysql->prepare($sqlCheck);
$stmtCheck->bind_param("is",$rowFind['ID'],$_SESSION["username"]);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();
$rowCheck = $resultCheck->fetch_assoc();

if($rowCheck["found"])
	echo "Course found";
else
	echo "Course not found";
?>