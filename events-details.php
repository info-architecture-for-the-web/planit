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


                        <!-- <a href="register.php">Register</a> -->
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
                        <a class="btn btn-imfo btn-read-more" href="create-event.php">Add Tasks</a>
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

            <div class="row ">

                <ul class="collapsible task ">
                <?php
                  foreach ($tasks as $task){
                	?>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">work</i>
                            <span class="tasks">Task 1</span>
                            <span class="tasks-status"><?php echo $task->status;?></span>
                        </div>
                        <div class="collapsible-body taskaccord">
                            <div class="row">
                              <div style="display: flex;" >
                                <div class="col s2 tasktitle">Task Description:</div>
                                <div class="col s9 taskdata"> <?php echo $task->title;?></div>
                              </div>
                              <div style="display: flex;" >
                                <div class="col s2">Assigned to:</div>
                                <div class="col s9"><?php echo $task->assignedToName;?></div>
                              </div>
                              <div style="display: flex;" >
                                <div class="col s2">Assigned by:</div>
                                <div class="col s9"><?php echo $task->assignedByName;?></div>
                              </div>
                              <div style="display: flex;" >
                                <div class="col s2">Last Modified by:</div>
                                <div class="col s9"><?php echo $task->modifiedByName;?></div>
                              </div>
                              <div style="display: flex;" >
                                <div class="col s2">Targeted by:</div>
                                <div class="col s9"><?php echo $task->deadline;?></div>
                              </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col s9"></div>
                                <div class="col s3 action-buttons">
                                    <a class="waves-effect waves-light btn approve  data-orgid="<?php echo $task->taskid; ?>">Completed</a>
                                    <a class="waves-effect waves-light btn reject red data-orgid="<?php echo $task->taskid; ?>">Pending</a>
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