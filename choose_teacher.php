<?php
	session_start();
	require_once("db_connect.php");
	//ELEGXOS GIA LANTHASMENO MATHIMA STO URL
	$sqlCheck = "select ID,count(*) as found from courses where name=?";
	$stmtCheck = $mysql->prepare($sqlCheck);
	$stmtCheck->bind_param("s",$_REQUEST["course"]);
	$stmtCheck->execute();
	$resultCheck = $stmtCheck->get_result();
	$rowCheck = $resultCheck->fetch_assoc();
	if($rowCheck["found"]==0)
		header("Location:main_window.php");
	
	//ENTOPISMOS FOITITWN-DASKALWN KAI VATHMWN TOUS SAUTO TO MATHIMA
	$sql = "select s.username,s.firstname,s.gender,g.grade
			from students s join grades g on s.AM=g.studentID
			where exists (select t.courseID
						  from teaches t
						  where t.studentID=s.username)
						  and g.courseID = ?";
	$stmt = $mysql->prepare($sql);
	$stmt->bind_param("i",$rowCheck["ID"]);
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()){
		$teachers[] = "User: ".$row["username"].", Όνομα: ".$row["firstname"].", Βαθμός: ".$row["grade"];
		$img_gender[] = $row['gender'];
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>

	<meta charset="utf-8">
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
	</head>
	
	<body>
		<div>
			<span id="logoutspan">Αποσύνδεση</span>
		</div>
		<div class="container">
			<div class="row">
				<h4 id="teachersHeading">Αυτοί είναι οι διαθέσοι καθηγητές</br>Επιλέξτε ποιου καθηγητή το μάθημα θέλετε να παρακολουθήσετε</h4>
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
		<?php
		if($_SESSION["is_teacher"])
			require_once("courseSelModalCode.php");
		?>
	</body>
</html>