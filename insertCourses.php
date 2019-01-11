<?php
	session_start();
	require_once("db_connect.php");
	$failed = 0; 
	
	foreach($_REQUEST["coursesArray"] as $course_name){
		// BRISKEI TO ID TOY MATHIMATOS GIA TIN KATHE EPANALIPSI
		$sqlFind = "select * from courses where name=?";
		$stmtFind = $mysql->prepare($sqlFind);
		$stmtFind->bind_param("s",$course_name);
		$stmtFind->execute();
		$resultFind = $stmtFind->get_result();
		$rowFind = $resultFind->fetch_assoc(); // H GRAMMI POY PERIEXEI TO ID TOU MATHIMATOS
			
		$sqlAdd = "insert into teaches (courseID, studentID) VALUES (?,?)";
		$stmtAdd = $mysql->prepare($sqlAdd);
		$stmtAdd->bind_param("is",$rowFind['ID'],$_SESSION["username"]);
		if(!$stmtAdd->execute())
			$failed = 1;
	}
	if($failed)
		echo "Teaching Courses Update Failed";
	else
		echo "Teaching Courses Updated Successfully";
?>