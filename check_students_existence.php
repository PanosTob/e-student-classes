<?php
	if(!empty($_REQUEST["am"]) and !empty($_REQUEST["username"]) and !empty($_REQUEST["email"]) and !empty($_REQUEST["password"]) and !empty($_REQUEST["confirm-password"])){
	session_start();
	require_once("db_connect.php");
	$givenAM = $_REQUEST['am'];
	
	ob_start();
	require_once("sample.json");
	$json = ob_get_contents();
	ob_end_clean();
	
	preg_match_all('/\"AM\":\"([0-9]+)\"/', $json,$matches);
	
	$offset = strpos($json,$givenAM)+8;
	
	$length = strpos($json,"}",$offset) - $offset;
	
	$other_students_information = explode(",",substr($json,$offset,$length));
	
	
	for($i=0;$i<sizeof($other_students_information);$i++){
		$other_students_information[$i] = substr($other_students_information[$i],strpos($other_students_information[$i],":")+1);
		$other_students_information[$i] = preg_replace("/[\":]/","",$other_students_information[$i]);
	}
		
	$found_ams = $matches[1];
	
	foreach($found_ams as $value){
		if($value == $givenAM){
			$found_student = 1;
			break;
		}
	}
	if($found_student){
		$stmt = $mysql->prepare("INSERT INTO students (AM, firstname, lastname, curr_sem, is_teacher, username, password, email, have_chosen_teaching_lessons, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		
		if(isset($_REQUEST["is_teacher"]))
			$_REQUEST["is_teacher"] = 1;
		else
			$_REQUEST["is_teacher"] = 0;
		
		$_SESSION['username'] = $_REQUEST["username"];
		$_SESSION['semester'] = $other_students_information[2];
		$_SESSION['is_teacher'] = $_REQUEST["is_teacher"];
		$_SESSION['have_chosen_teaching_lessons'] = 0;
		
		$stmt->bind_param("issiisssis", $_REQUEST["am"], $other_students_information[0], $other_students_information[1], intval($other_students_information[2]), $_REQUEST["is_teacher"], $_REQUEST["username"], $_REQUEST["password"], $_REQUEST["email"], $_SESSION['have_chosen_teaching_lessons'], $other_students_information[3]);
		if($stmt->execute()){
			header($_REQUEST["is_teacher"]?'Location: choose_teaching_lessons.php':'Location: main_window.php');
		}else{
			header('Location: index.php?wrong_fields=1');
		}
	}
	else
		header('Location: index.php?wrong_fields=1');
?>

<?php
	}
	else
		header('Location: index.php?wrong_fields=1');
?>