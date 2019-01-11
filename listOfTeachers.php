<?php
	session_start();
	require_once("db_connect.php");
	$sql = "select DISTINCT s.username,s.firstname,s.gender
			from students s join teaches t on s.username=t.studentID";
	$stmt = $mysql->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()){
		$teachers[] = "User: ".$row["username"].", Όνομα: ".$row["firstname"];
		$img_gender[] = $row['gender'];
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>E-Student-classes</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		
		<!-- Custom styles for this template -->
		<link href="css/styles.css" rel="stylesheet">
		
		<script>
			$(function(){
				
			});
		</script>
	</head>
	<body>
		<div>
			<span id="logoutspan">Αποσύνδεση</span>
		</div>
		<div class="container">
			<div class="row">
				<h4 id="lessonHeading">Αυτοί είναι οι καθηγητές που διδάσκουν</h4>
				<div id="listWrapper" class="col-lg-12 col-md-12 col-s-12 col-xs-12">
					<ul id="AllTeachersList">
					<?php
						if(isset($teachers) && is_array($teachers)){
							$loop_snap = 0;
							foreach($teachers as $teacher){
								$gender_img_source = $img_gender[$loop_snap++]=="M"?'img/male_teacher_icon.jpg':'img/female_teacher_icon.jpg';
								echo '<li class="course col-lg-4"><span>'.$teacher.'</span><img class="classImg" src="'.$gender_img_source.'"></li>';
							}
						}
					?>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>