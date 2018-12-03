<?php
	if(isset($_REQUEST["wrong_fields"]))
		$from_failed_subscription = $_REQUEST["wrong_fields"];
	else
		$from_failed_subscription = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Business Casual - Start Bootstrap Theme</title>

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


<!-- Custom styles for this template -->
<link href="css/styles.css" rel="stylesheet">
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/styling.js"></script>
<script>
	$(function(){
		<?php 
			if($from_failed_subscription){
				echo 'var messgDiv = $("<div class=col-xs-6>ΣΥΜΠΛΗΡΩΣΤΕ ΟΛΑ ΤΑ ΣΤΟΙΧΕΙΑ ΤΗΣ ΦΟΡΜΑΣ ΣΩΣΤΑ</div>");
					  $("#formHeadings").append(messgDiv);
					  $("#register-form-link").trigger( "click" );
					 ';
			}
		?>
	});
</script>

</head>

<body>

<h1 class="site-heading text-center text-white d-none d-lg-block">
  <span class="site-heading-upper text-primary mb-3">FREE LESSONS</span>
  <span class="site-heading-lower">Student to Student</span>
</h1>
		
<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div id="formHeadings" class="panel-heading">
						<div class="column">
							<div class="col-xs-6">
								<a href="#" <?php echo $from_failed_subscription? '' : 'class="active"' ?> id="login-form-link">Σύνδεση</a>
							</div>
							<div class="col-xs-6">
								<a href="#" <?php echo $from_failed_subscription? 'class="active"' : '' ?> id="register-form-link">Εγγραφή</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="main_window.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username1" tabindex="1" class="form-control" placeholder="Όνομα χρήστη" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password1" tabindex="2" class="form-control" placeholder="Κωδικός πρόσβασης">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Αποθήκευση χρήστη</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Σύνδεση">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Ξέχασες τον κωδικό?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="check_students_existence.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="am" id="am" tabindex="1" class="form-control" placeholder="Αριθμός μητρώου">
									</div>
									<div class="form-group">
										<input type="text" name="username" id="username2" tabindex="1" class="form-control" placeholder="Όνομα χρήστη" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Διεύθυνση ηλεκτρονικού ταχυδρομίου" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password2" tabindex="1" class="form-control" placeholder="Κωδικός πρόσβασης">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="1" class="form-control" placeholder="Επικύρωση κωδικού">
									</div>
									<div class="form-group">
										<label for="c1">DO YOU WANT TO BE A TEACHER <input type="checkbox" name="is_teacher" id="is_teacher"></label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Εγγραφή">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<footer class="footer text-faded text-center py-5">
  <div class="container">
	<p class="m-0 small">Copyright &copy; Your Website 2018</p>
  </div>
</footer>


	
</body>

</html>
