<!DOCTYPE html>
<html lang="en">
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/planit/dbconnection/dbconnect.php";
include 'model/profile_model.php';
include 'model/friends_model.php';
include 'model/event_model.php';
include 'model/task_model.php';
$eventid = $_GET['eventid'];

$uploads_dir = "uploads/";

if (isset($_SESSION['username'])) {
    $eventArray = getEventDetails($eventid);
    $tasks = getTasksByEvent($eventid);
    $memberArray = getEventMembers($eventid);
    $friendArray = getFriends($_SESSION['username']);
} else {
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
    $("#save").click(function(e) {
        console.log("in save");
        //    e.preventDefault(); // cancel the link behaviour
        //    var selText = $(this).text();
        //    $("#tableButton").text(selText);
        <?php
$taskObj = new stdClass();
?>
    });
    </script>
    <script>
    function datatoggle(evt, tab) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tab).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>
</head>

<body>


    <!-- <section id="banner"> -->
    <section>

        <div class="bg-color" style="background:url(<?php echo $uploads_dir . $eventid ?>.jpg); no-repeat;
  background-size: cover;">
            <header id="header">
                <div class="container">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="index.php">Home</a>
                        <?php if (isset($_SESSION['username'])) {?>
                        <a href="create-event.php">Create Event</a>
                        <!-- Can allow this only after login -->
                        <a href="myprofile.php">Manage Profile</a>
                        <!-- Can allow this only after login -->
                        <a href="search-people.php">Invite Friends</a>
                        <a href="controller/logout_controller.php">Logout</a>
                        <?php
} else {
    ?>
                        <a href="login.php">Login</a>
                        <?php }
?>

                    </div>
                    <!-- Use any element to open the sidenav -->
                    <span onclick="openNav()" class="pull-right menu-icon">☰</span>
                </div>
            </header>
            <div>
                <div class="row">
                    <div class="inner text-center">
                        <h1 class="logo-name">
                            <?php echo $eventArray->ename; ?>
                        </h1>
                        <h2 style="font-family: 'Satisfy', sans-serif;
  font-size: 40px;
  color: #ffb03b;">
                            <?php echo $eventArray->ehostName; ?>
                        </h2>
                        <p style="font-family: 'Satisfy', sans-serif;
  font-size: 40px;
  color: #ffb03b;">
                            <?php echo $eventArray->edescription; ?>
                        </p>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">Add
                            Tasks</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#peopleModal">Add
                            People</button>

                        <!--						Add People-->
                        <!--Add tasks-->
                        <div class="modal fade" id="peopleModal" tabindex="-1" role="dialog"
                            aria-labelledby="peopleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-warning">
                                <div class="modal-content" style="height: 450px">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <form
                                        action="controller/email_controller.php?purpose=1&eventid=<?php echo $eventid; ?>&from=<?php echo $_SESSION['username']; ?>"
                                        method="post" role="form">
                                        <!--									<div style="height: 300px" class="panel panel-warning" id="result_panel">-->
                                        <!--										<div class="panel-heading">-->
                                        <h2>Invite Friends</h2>
                                        <!--										</div>-->
                                        <div class="panel-body">
                                            <ul class="list-group">


                                                <?php foreach ($friendArray as $friend) {?>

                                                <li class="list-group-item" style="text-align: left">
                                                    <div style="display: flex; width: 100%;">
                                                        <strong>

                                                            <input type="checkbox" class="form-check-input" id="check"
                                                                name="friends[]"
                                                                value="<?php echo $friend->fusername; ?>">
                                                            <?php echo $friend->fname; ?>


                                                            <!-- <button type="button" class="btn btn-primary"
                                                                style="align: right">Send Invite</button> -->

                                                    </div>
                                                </li>
                                                <?php }?>

                                            </ul>
                                        </div>
                                        <button id="invite" type="submit" class="btn btn-primary">Invite</button>
                                        <!--									</div>-->
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!--Add tasks-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-warning">
                                <div class="modal-content" style="height: 380px">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>



                                    <h2 id="exampleModalLabel">Create Task</h2>
                                    <br>
                                    <form action="controller/add_task_controller.php?eventid=<?php echo $eventid; ?>"
                                        method="post" role="form">
                                        <div class="contact-form pad-form">

                                            <div class="form-group contact-form pad-form">
                                                <label for="taskname" style="padding-top: 1.3% !important;font-size: 15px!important;
    color: #494949!important;
    font-weight: normal!important;" class="col-sm-3 control-label formlabel">Task Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="taskname" name="taskname"
                                                        placeholder="Task Name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group contact-form pad-form">
                                                <label for="description" style="padding-top: 1.3% !important;font-size: 15px!important;
    color: #494949!important;
    font-weight: normal!important;" class="col-sm-3 control-label formlabel">Description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="description" name="description"
                                                        placeholder="Description" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group contact-form pad-form">
                                                <label for="targetedBy" style="padding-top: 1.3% !important;font-size: 15px!important;
    color: #494949!important;
    font-weight: normal!important;" class="col-sm-3 control-label formlabel">Targeted by</label>
                                                <div class="col-sm-9">
                                                    <input type="date" id="date" name="date" placeholder="Date"
                                                        class="form-control">

                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="assignedTo" style="padding-top: 1.3% !important;font-size: 15px!important;
    color: #494949!important;
    font-weight: normal!important;" class="col-sm-3 control-label formlabel">Assigned To</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="assignedTo" name="assignedTo">

                                                        <?php foreach ($memberArray as $member) {
    ?>
                                                        <option value="<?php echo $member->username; ?>">
                                                            <?php echo $member->memberName;} ?>
                                                        </option>
                                                    </select>


                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="assignedTo" style="padding-top: 1.3% !important;font-size: 15px!important;
    color: #494949!important;
    font-weight: normal!important;" class="col-sm-3 control-label formlabel">Task Status</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="taskStatus" name="taskStatus">

                                                        <option>Pending</option>
                                                        <option>Completed</option>
                                                    </select>

                                                </div>


                                            </div>
                                            <br>
                                            <button style="margin: 20px" type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button id="save" type="submit" class="btn btn-primary">Save
                                                changes</button>
                                            <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--Add tasks-->

                            <!--							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#peopleModal">Add People</button>-->

                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- / banner -->
    <!--about-->
    <!-- / banner -->


    <section id="menu-list" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">
                    <h1 class="header-h">Event Information</h1>
                    <p class="header-p">Plan you events and more...
                        <br> Select an option</p>
                </div>

                <div class="tab col-md-12  text-center" id="menu-flters">
                    <ul>
                        <li><a HREF="javascript:datatoggle(event, 'todo' )" id="todobtn"
                                class="tablinks filter active">To Do List</a></li>
                        <li><a HREF="javascript:datatoggle(event, 'friendlist' )" id="peoplebtn"
                                class="tablinks filter">People</a></li>
                        <li><a HREF="update-event.php?eventid=<?php echo $eventid ?>" id="update"
                                class="tablinks filter">Edit Event</a></li>
                    </ul>
                </div>

                <!--about-->
                <section id="todo" class="tabcontent section-padding" style="display:block;">

                    <div class="container">

                        <div class="row">

                            <ul class="collapsible task ">
                                <?php
foreach ($tasks as $task) {
    ?>
                                <li class="task">
                                    <div class="collapsible-header" style="display:flex;"><i class="material-icons"
                                            style="color:orange;">check_circle</i>
                                        <div style="width:80%; margin-left:0.5%;"> <span
                                                class="tasks"><?php echo $task->title; ?></span></div>
                                        <span class="tasks-status"><?php echo $task->status; ?></span>
                                    </div>
                                    <div class="collapsible-body ">
                                        <p style="margin-left: 2.5%;">Details of task:</p>

                                        <dl>
                                            <dt>Task Description:</dt>
                                            <dd><?php echo $task->description; ?></dd>

                                            <dt>Assigned to:</dt>
                                            <dd><?php echo $task->assignedToName; ?></dd>

                                            <dt>Assigned by:</dt>
                                            <dd><?php echo $task->assignedByName; ?></dd>

                                            <dt>Last Modified by:</dt>
                                            <dd><?php echo $task->modifiedByName; ?></dd>

                                            <dt>Targeted by:</dt>
                                            <dd><?php echo $task->deadline; ?></dd>
                                        </dl>
                                        <hr />
                                        <div class="taskaccord">
                                            <div class="col s9"></div>
                                            <div class="col s3 action-buttons">
                                                <form method="post"
                                                    action="controller/task_controller.php?eventid=<?php echo $eventid; ?>&taskid=<?php echo $task->taskid; ?>">
                                                    <button type="Submit" name="status" value="Completed"
                                                        class="waves-effect waves-light btn completed">Completed</button>
                                                    <button type="Submit" name="status" value="Pending"
                                                        class="waves-effect waves-light btn pending">Pending</button>
                                                </form>
                                            </div>

                                        </div>
                                </li>
                                <?php
}
?>


                        </div>
                    </div>
                </section>
                <section id="friendlist" class="tabcontent section-padding">
                    <div class="panel-body">

                        <div class="box box-info">

                            <div class="box-body">
                                <div class="col-sm-12">

                                    <div class="panel panel-warning" id="result_panel">
                                        <div class="panel-heading">
                                            <h5 class="heading">My Friends</h3>
                                        </div>
                                        <div class="panel-body">
                                            <ul class="list-group">


                                                <?php foreach ($memberArray as $member) {
    ?> <li class="list-group-item"><strong><?php echo $member->memberName;} ?></li>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/about-->
            </div>
    </section>

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
