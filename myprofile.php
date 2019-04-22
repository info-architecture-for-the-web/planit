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
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
	<!-- =======================================================
    Theme Name: Delicious
    Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
	<?php 
//	echo "hi".$_SERVER['DOCUMENT_ROOT'];
	require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";
	include 'model/profile_model.php';
	include 'model/friends_model.php';
	include 'model/event_model.php';
	include 'model/task_model.php';
	$uploads_dir = $_SERVER['DOCUMENT_ROOT']."/planit/uploads/";
	$prof = getProfile($_SESSION['username']);
	$friendArray = getFriends($_SESSION['username']);
	$eventArray = getEvents($_SESSION['username']);
	$taskArray = getTasksByUsername($_SESSION['username']);
//	echo $prof->email;
	?>
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

		function saveChanges() {
//			var newFullName = $( '#fullname' ).html();
			var newEmail = $( '#email' ).val();
			var newPhone = $( '#phone' ).val();

			console.log( newEmail + " " + newPhone );
		}
		
		function readURL(input, id, size) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#" + id).attr("src", e.target.result);
            // $("#" + id).attr("width", size);
        };

        reader.readAsDataURL(input.files[0]);
    }

}
	</script>
</head>

<body>
	<!--banner-->
	<section id="banner2">
		<div class="bg-color2">
			<header id="header">
				<div class="container">
					<div id="mySidenav" class="sidenav">
						<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
						<a href="index.php">Home</a>
						
						<a href="create-event.php">Create Event</a>
						<!-- Can allow this only after login -->
						<a href="myprofile.php">Manage Profile</a>
						<!-- Can allow this only after login -->
						<a href="controller/logout_controller.php">Logout</a>
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

				<!--				<div class="panel panel-default">-->
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h4 class="heading">My Profile</h4>

					</div>
				<form action="controller/profile_controller.php" method="post" role="form" enctype="multipart/form-data">

					<div class="panel-body">

						<div class="box box-info">

							<div class="box-body">
								<div class="col-sm-12">
									<div align="center"> <img alt="User Pic" src="<?php echo $uploads_dir . $prof->profile_image ?>" id="profile-image1" class="img-circle img-responsive">
										<input type="file" id="profile-image-upload" name="profile_image" class="hidden"
											    onchange="readURL(this , 'profile-image1','200px');">
										<div style="color:#999;">Click here to change profile image</div>
										<!--Upload Image Js And Css-->
										<h4 style="color:#00b1b1;" >
											<div >
												<?php echo $prof->fullname ?>
												
											</div>
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


								<div class="col-sm-5 col-xs-6 form-group ">Username:</div>
								<div id="username" name="username" class="col-sm-7 form-group">
									<?php echo $prof->username ?>
									
									
								</div>
								<div class="clearfix"></div>
								<div class="bot-border"></div>

								<div class="col-sm-5 col-xs-6 form-group ">Email:</div>
								<div  class="col-sm-7" >
									<input id="email" name="email" type="text" class="form-control" id="email" value="<?php echo $prof->email ?>"</input>

								</div>
								<div class="clearfix"></div>
								<div class="bot-border"></div>

								<div class="col-sm-5 col-xs-6 form-group ">Phone Number:</div>
								<div class="col-sm-7" contenteditable="true">
									<input id="phone" name="phone" type="text" class="form-control" id="phone" value="<?php echo $prof->phone ?>"</input>
								
								</div>

								<div class="clearfix"></div>

								<div class="bot-border"></div>
								<button type="submit" style="align:center" >Save Changes</button>

								<!-- /.box-body -->
							</div>
							<!-- /.box -->

						</div>
					</form>

					</div>
<!--					<div style="display: flex">-->
						<div class="panel-body">

							<div class="box box-info">

								<div class="box-body">
									<div class="col-sm-12">

										<div  class="panel panel-warning" id="result_panel">
											<div class="panel-heading">
												<h5 class="heading">My Friends</h3>
										</div>
										<div class="panel-body">
											<ul class="list-group">
												
												
												  <?php foreach ($friendArray as $friend) {
		?> <li class="list-group-item"><strong><?php echo $friend->fname;}	?></li>   
												
        
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
						<div class="panel-body">

						<div class="box box-info">

							<div class="box-body">
								<div class="col-sm-12">
									
									<div class="panel panel-warning" id="result_panel">
										<div class="panel-heading">
											<h5 class="heading">My Tasks</h3>
										</div>
										<div class="panel-body">
											<ul class="list-group">
												
												  <?php foreach ($taskArray as $task) {
		?> <li class="list-group-item"><strong><?php echo $task->title;}	?></li> 
												
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<div class="panel-body">

						<div class="box box-info">

							<div class="box-body">
								<div class="col-sm-12">
									
									<div  class="panel panel-warning" id="result_panel">
										<div class="panel-heading">
											<h5 class="heading">My Events</h3>
										</div>
										<div class="panel-body">
											<ul class="list-group">
												
												  <?php foreach ($eventArray as $event) {
		?> <li class="list-group-item"><strong><a href="events-details.php?eventid=<?php echo $event->eventid;	?>"><?php echo $event->ename;}?></li>   
												
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
</div>
				</div>
			</div>
		</div>

		</button>

	</div>
	</div>
</body>

</html>