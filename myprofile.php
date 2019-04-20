<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Plan It</title>
	<meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
	<meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- =======================================================
    Theme Name: Delicious
    Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
	<?php 
	echo "hi".$_SERVER['DOCUMENT_ROOT'];
	include 'model\profile_model.php';
	$prof = getProfile($_SESSION['username']);
	echo $prof->email;
	?>
</head>

<body>
	<!--banner-->
	<section id="banner2">
		<div class="bg-color2">
			<header id="header">
				<div class="container">
					<div id="mySidenav" class="sidenav">
						<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
						<a href="#about">About</a>
						<a href="#event">Event</a>
						<a href="create-event.php">Create Event</a>
						<!-- Can allow this only after login -->
						<a href="myprofile.php">Manage Profile</a>
						<!-- Can allow this only after login -->
						<a href="login.php">Login</a>
						<!-- <a href="register.php">Register</a> -->
					</div>
					<!-- Use any element to open the sidenav -->
					<span onclick="openNav()" class="pull-right menu-icon">☰</span>
					<div class="inner text-center">
						<h1 class="logo-name2">Plan It</h1>
					</div>
				</div>

			</header>
	</section>

	<div class="container">
		<div class="row">
			<br>
			<div class="col-md-12">

				<div class="panel panel-default">
					<div class="panel-heading" >
						<h4>My Profile</h4>
						<button style="font-size:24px"><i class="material-icons" >mode_edit</i>
					</div>
					
					<div class="panel-body">

						<div class="box box-info">

							<div class="box-body">
								<div class="col-sm-12">
									<div align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">

										<input id="profile-image-upload" class="hidden" type="file">
										<div style="color:#999;">click here to change profile image</div>
										<!--Upload Image Js And Css-->






										<h4 style="color:#00b1b1;">
											<?php echo $prof->fullname ?>
										</h4>
									</div>

									<br>

									<!-- /input-group -->
								</div>
								<div class="col-sm-6">

									</span>

								</div>
								<div class="clearfix"></div>
								<hr style="margin:5px 0 5px 0;">


								<div class="col-sm-5 col-xs-6 tital ">Username:</div>
								<div class="col-sm-7 ">
									<?php echo $prof->username ?>
								</div>
								<div class="clearfix"></div>
								<div class="bot-border"></div>

								<div class="col-sm-5 col-xs-6 tital ">Email:</div>
								<div class="col-sm-7">
									<?php echo $prof->email ?>
								</div>
								<div class="clearfix"></div>
								<div class="bot-border"></div>

								<div class="col-sm-5 col-xs-6 tital ">Phone Number:</div>
								<div class="col-sm-7">
									<?php echo $prof->phone ?>
								</div>
								<div class="clearfix"></div>
								<div class="bot-border"></div>


								<!-- /.box-body -->
							</div>
							<!-- /.box -->

						</div>


					</div>
				</div>
			</div>
			<script>
				$( function () {
					$( '#profile-image1' ).on( 'click', function () {
						$( '#profile-image-upload' ).click();
					} );
				} );
			</script>
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.easing.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/custom.js"></script>
			<script src="contactform/contactform.js"></script>
			<script>
				$( document ).ready( function () {
					console.log( "on ready" );

				} );
			</script>
			</button>

		</div>
	</div>
</body>

</html>