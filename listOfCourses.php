<?php
	session_start();
	require_once("db_connect.php");
	$sql = "select name,img_course from courses";
	$stmt = $mysql->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()){
		$courses[] = $row['name'];
		$img_courses[$row['name']] = $row['img_course'];
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
				$(".course").click(function(){
					if($("#courseSelectionModal").length){
						$("#courseSelectionModal").find("button").click(function(ev){
							if(ev.target.id=="learnChoiceButton")
								window.location.assign("choose_teacher.php");
							else if(ev.target.id=="teachChoiceButton")
								window.location.assign("waiting_room.php");
						});
						$("#courseSelectionModal").modal('show');
					}else{
						window.location.assign("choose_teacher.php");
					}
				});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h4 id="lessonHeading">Επιλέξτε κάποιο μάθημα για να παρακολουθήσετε<?php echo $_SESSION["is_teacher"]?" ή να διδάξετε":"";?></h4>
				<div id="listWrapper" class="col-lg-12 col-md-12 col-s-12 col-xs-12">
					<ul id="AllCoursesList">
					<?php
						if(is_array($courses)){
							foreach($courses as $course){
								echo '<li class="course col-lg-4"><span>'.$course.'</span><img class="classImg" src="'.$img_courses[$course].'"></li>';
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