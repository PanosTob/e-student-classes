<?php
	session_start();
	require_once("db_connect.php");
	$_SESSION["came_from_choose_teaching_lessons"] = 1;
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
		<script>
			$(function(){
				$('.checkedImg').hide();
				
				$(".course").click(function(){
					var clickedElement = this;
					var selected_course_name = $(this).find("span").text();
					$.ajax({
						method: "POST",
						url: 'check_if_course_is_passed.php',
						data:{
							course_name: selected_course_name
						},
						success: function(responseText){
							if(responseText.indexOf("Have not")!==-1)
								$("#courseSelectionModal").find(".modal-body").text("Το μάθημα αυτό δεν επιτρέπεται να το διδάξετε γιατί δεν το έχετε περάσει");
							else
								$("#courseSelectionModal").find(".modal-body").text("Το μάθημα αυτό δεν επιτρέπεται να το διδάξετε καθώς ο βαθμός σας είναι κάτω από 7");
							
							if(responseText.indexOf("fine")!==-1)
								$(clickedElement).find(".checkedImg").toggle();
							else
								$("#courseSelectionModal").modal('show');
						}
					});
					
				});
				
				$("#continueB").click(function(){
					var courses_names = [];
					$("#AllCoursesList").find(".checkedImg:visible").siblings("span").each(function(){
						courses_names.push($(this).text());
					});
					$.ajax({
						method: "POST",
						url: 'insertCourses.php',
						data:{
							coursesArray: courses_names
						},
						success: function(responseText){
							if(responseText.indexOf("Successfully")!==-1)
								window.location.replace("main_window.php");
							else if(responseText.indexOf("Failed")!==-1)
								window.location.replace("choose_teaching_lessons.php?errorCourses=1");
						}
					});
				});
			});
		</script>
	</head>
	<body>
	
		<div class="container">
			<div class="row">
				<h4 id="lessonHeading">Διαλέξτε τα μαθήματα που θέλετε να διδάσκετε</h4>
				<button id="continueB">Αποθήκευση</button>
				<div id="listWrapper" class="col-lg-12 col-md-12 col-s-12 col-xs-12">
					<ul id="AllCoursesList">
					<?php
						if(is_array($courses)){
							foreach($courses as $course){
								echo '<li class="course col-lg-4"><span>'.$course.'</span><img class="classImg" src="'.$img_courses[$course].'"><img class="checkedImg" src="img/blue-checkmark.png"></li>';
							}
						}
					?>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="modal fade in" id="courseSelectionModal" tabindex="-1" role="dialog" aria-labelledby="courceSelModalLabel" aria-hidden="true" >
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body"></div>			
					<div class="modal-footer">
						<button id="understoodButton" type="button" class="btn btn-main" data-dismiss="modal">Το κατάλαβα</button>
					</div>
				</div>
			</div>
		</div>
		
	<body>
</html>