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
	
	<script>
		$(".sidebar-brand a").click(function (e){
			e.preventDefault();
		});
	</script>

  </head>
  
  <body>
	<div id="carnavContainer" class="container">
		<div class="row">
			<div id="myCarousel" class="carousel slide col-lg-9 col-md-9 col-s-12 col-xs-12">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- Carousel items -->
				
				<div id="myCarInner" class="carousel-inner">
						<div class="carousel-item active" data-slide-number="0"><img class="d-block w-100" src="https://www.it.teithe.gr/wp-content/uploads/2013/07/Girl1.jpg"></div>
						<div class="carousel-item" data-slide-number="1"><img class="d-block w-100" src="https://www.it.teithe.gr/wp-content/uploads/2016/12/ers_mixer-727x383.jpg"></div>
						<div class="carousel-item" data-slide-number="2"><img class="d-block w-100" src="https://www.it.teithe.gr/wp-content/uploads/2013/07/cisco1.jpg"></div>
				</div>
				
				
				<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			
			<div id="sidebar-wrapper" class="col-lg-3 col-md-3 col-s-12 col-xs-12">
				<ul class="sidebar-nav">
					<li class="sidebar-brand">
						<a href="#">
							Μαθήματα
						</a>
					</li>
					<li class="sidebar-brand">
						<a href="#">Φοιτητές</a>
					</li>
				</ul>
	      </div>
      </div>
	  <div class="row">
		<div id="SemesterCourses">
			<h2 id="semesterTitle">Μαθήματα ? Εξαμήνου</h4>
			<ul id="coursesList">
				<li class="course col-lg-4"><span>Ασφάλεια Πληροφοριακών Συστημάτων</span><img src="https://aetos.it.teithe.gr/~iliou/cs4601/Greekchapterlogo.gif"></li>
				<li class="course col-lg-4"><span>Δίκτυα Η/Υ</span><img src="http://liomas.gr/external/eclass-images/Diktia_Hlektronikon_1.jpg"></li>
				<li class="course col-lg-4"><span>Γραφικά Υπολογιστών</span><img src="http://iiwm.teikav.edu.gr/iinew/wp-content/uploads/2015/08/grafika.png"></li>
			</ul>
		</div>
	  </div>
  </body>
</html>