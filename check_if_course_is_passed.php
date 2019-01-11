<?php
	session_start();
	require_once("db_connect.php");
	
	//BRISKEI TO AM TOU MATHITI ME TO SIGKEKRIMENO USERNAME
	$sqlAM = "select * from students where username=?";
	$stmtAM = $mysql->prepare($sqlAM);
	$stmtAM->bind_param("s",$_SESSION["username"]);
	$stmtAM->execute();
	$resultFindAM = $stmtAM->get_result();
	$rowFindAM = $resultFindAM->fetch_assoc(); // H GRAMMI POU PERIEXEI TO AM TOU FOITITI
	// BRISKEI TO ID TOY MATHIMATOS GIA TIN KATHE EPANALIPSI
	$sqlFind = "select * from courses where name=?";
	$stmtFind = $mysql->prepare($sqlFind);
	$stmtFind->bind_param("s",$_REQUEST["course_name"]);
	$stmtFind->execute();
		
	$resultFind = $stmtFind->get_result();
	$rowFind = $resultFind->fetch_assoc(); // H GRAMMI POY PERIEXEI TO ID TOU MATHIMATOS
	
	//ELEGXOS AN O FOITITIS SE AYTO TO MATHIMA EXEI PANW APO 7
		$sqlCheck = "select *,count(*) as passed from grades where studentID=? and courseID=?";
		$stmtCheck = $mysql->prepare($sqlCheck);
		$stmtCheck->bind_param("ii",$rowFindAM['AM'],$rowFind['ID']);
		$stmtCheck->execute();
		$resultCheck = $stmtCheck->get_result();
		$rowCheck = $resultCheck->fetch_assoc(); // H GRAMMI POU PERIEXEI TON BATHMO TOU FOITITI SE AYTO TO MATHIMA
		if($rowCheck["passed"]!==0){
			if($rowCheck["grade"]<7){
				echo "Grade is bad";
			}else{
				echo "Grade is fine";
			}
		}else{
			echo "Have not passed this course";
		}
?>