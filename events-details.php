<!DOCTYPE html>
<html lang="en">
<?php 
	require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";
	include 'model\profile_model.php';
	include 'model\friends_model.php';
  include 'model\event_model.php';
  include 'model\task_model.php';
  $eventid = $_GET['eventid'];
  if (isset($_SESSION['username'])){
    $eventArray = getEventDetails($eventid);
    $tasks = getTasksByEvent($eventid);
	$memberArray = getEventMembers($eventid);
  }else{
    header("Location: login.php");
  }
  
	?>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plan It</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords"
        content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
     <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" rel="stylesheet"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    .bs-example {
        margin: 20px;
    }
    </style>
	<script>
		$("#save").click(function(e){
			console.log("in save");
//    e.preventDefault(); // cancel the link behaviour
//    var selText = $(this).text();
//    $("#tableButton").text(selText);
			<?php
			$taskObj = new stdClass();
			?>
});
	</script>
      <!-- <script>
        $(".approve").click( function(){
          takeAction( $(this), $(this).data("orgid"), "approve");
        });
        $(".reject").click( function(){
          takeAction( $(this), $(this).data("orgid"), "reject");
        });
    </script> -->
    <!-- =======================================================
    Theme Name: Delicious
    Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
	<!--banner-->
	<section id="banner">
		<div class="bg-color">
			<header id="header">
				<div class="container">
					<div id="mySidenav" class="sidenav">
						<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
						<a href="#about">About</a>
						<a href="#event">Event</a>

                        <?php if (isset($_SESSION['username'])) { ?>
                        <a href="create-event.php">Create Event</a> <!-- Can allow this only after login -->
                        <a href="myprofile.php">Manage Profile</a> <!-- Can allow this only after login -->
                        <a href="controller/logout_controller.php">Logout</a>
                        <?php
              }
              else { ?>
                        <a href="login.php">Login</a>
                        <?php }
            ?>

					</div>
					<!-- Use any element to open the sidenav -->
					<span onclick="openNav()" class="pull-right menu-icon">☰</span>
				</div>
			</header>
			<div class="container">
				<div class="row">
					<div class="inner text-center">
						<h1 class="logo-name"><?php echo $eventArray->ename;	?></h1>
						<h2><?php echo $eventArray->ehostName; ?></h2>
						<p><?php echo $eventArray->edescription; ?></p>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Tasks
</button>
					

						<!--Add tasks-->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-notify modal-warning">
								<div class="modal-content" style="height: 380px">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
								

									<h2 id="exampleModalLabel">Create Task</h2>
									<br>
									<div class="contact-form pad-form">

										<div class="form-group contact-form pad-form">
											<label for="taskname" style="padding-top: 1.3% !important;font-size: 15px!important;
    color: #494949!important;
    font-weight: normal!important;" class="col-sm-3 control-label formlabel">Task Name</label>
											<div class="col-sm-9">
												<input type="text" id="taskname" name="taskname" placeholder="Task Name" class="form-control">
											</div>
										</div>

										<div class="form-group contact-form pad-form">
											<label for="description" style="padding-top: 1.3% !important;font-size: 15px!important;
    color: #494949!important;
    font-weight: normal!important;" class="col-sm-3 control-label formlabel">Description</label>
											<div class="col-sm-9">
												<input type="text" id="description" name="description" placeholder="Description" class="form-control">
											</div>
										</div>
										<div class="form-group contact-form pad-form">
											<label for="targetedBy" style="padding-top: 1.3% !important;font-size: 15px!important;
    color: #494949!important;
    font-weight: normal!important;" class="col-sm-3 control-label formlabel">Targeted by</label>
											<div class="col-sm-9">
												<input type="date" id="date" name="date" placeholder="Date" class="form-control">

											</div>
										</div>
										<div class="form-group">
											<label for="assignedTo" style="padding-top: 1.3% !important;font-size: 15px!important;
    color: #494949!important;
    font-weight: normal!important;" class="col-sm-3 control-label formlabel">Assigned To</label>
											<div class="col-sm-9">
												<select class="form-control" id="assignedTo">
													
													<?php foreach ($memberArray as $member) {
		?> <option><?php echo $member->memberName;}	?></option> 
												</select>

											</div>


										</div>
										<div class="form-group">
											<label for="assignedTo" style="padding-top: 1.3% !important;font-size: 15px!important;
    color: #494949!important;
    font-weight: normal!important;" class="col-sm-3 control-label formlabel">Task Status</label>
											<div class="col-sm-9">
												<select class="form-control" id="taskStatus">
													
													<option>Pending</option>
													<option>Completed</option>
												</select>

											</div>


										</div>
										<br>
										<button style="margin: 20px" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button id="save" type="button" class="btn btn-primary">Save changes</button>
										<br>
									</div>
								</div>
							</div>
							<!--Add tasks-->
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- / banner -->
	<!--about-->
	<div class="col-md-12 text-center marb-35">
		<h1 class="header-h">To-Do List</h1>

	</div>
	<section id="about" class="section-padding">

		<div class="container">

			<div class="row">

                <ul class="collapsible task ">
                <?php
                  foreach ($tasks as $task){
                	?>
                    <li class="task">
                        <div class="collapsible-header"  style="display:flex;"><i class="material-icons" style="color:orange;">check_circle</i>
                          <div style="width:80%; margin-left:0.5%;">  <span class="tasks"><?php echo $task->title;?></span></div>
                            <span class="tasks-status"><?php echo $task->status;?></span>
                        </div>
                        <div class="collapsible-body ">
                        <p style="margin-left: 2.5%;">Details of task:</p>

                                    <dl>
                                        <dt>Task Description:</dt>
                                        <dd><?php echo $task->description;?></dd>

                                        <dt>Assigned to:</dt>
                                        <dd><?php echo $task->assignedToName;?></dd>

                                        <dt>Assigned by:</dt>
                                        <dd><?php echo $task->assignedByName;?></dd>

                                        <dt>Last Modified by:</dt>
                                        <dd><?php echo $task->modifiedByName;?></dd>

                                        <dt>Targeted by:</dt>
                                        <dd><?php echo $task->deadline;?></dd>
                                    </dl>
                            <hr />
                            <div class="taskaccord">
                                <div class="col s9"></div>
                                <div class="col s3 action-buttons">
                                    <a class="waves-effect waves-light btn approve" onclick = "echo " >Completed</a>
                                    <a class="waves-effect waves-light btn reject red" data-orgid="<?php echo $task->taskid; ?>">Pending</a>
                                </div>
                            </div>
                    </li>
                    <?php
                	}
                	?>

            </div>
        </div>
    </section>
    <!--/about-->

    <!-- footer -->
    <footer class="footer text-center">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div class="widget">
                        <h4 class="widget-title">Plan it!</h4>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- / footer -->

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>

</body>

</html>