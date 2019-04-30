<?php
require "../dbconnection/dbconnect.php";
include "../model/task_model.php";

$status = false;
$eventid = 0;
if(isset($_GET["eventid"])){
    $eventid = $_GET["eventid"];
}
$taskObj = new stdClass();
$taskObj->title = filter_input(INPUT_POST, 'taskname');
$taskObj->deadline = filter_input(INPUT_POST, 'date');
$taskObj->status = filter_input(INPUT_POST, 'taskStatus');
$taskObj->assignedTo = filter_input(INPUT_POST, 'assignedTo');
$taskObj->eventid = $eventid;
$taskObj->assignedBy = $_SESSION['username'];
$taskObj->modifiedBy = $_SESSION['username'];
$taskObj->description = filter_input(INPUT_POST, 'description');

// check if we have 'taskid' in our request
if (isset($_GET["taskid"])) {
    // call update
    $taskObj->eventid = $_SESSION['EVENT_ID'];
    $status = updateTask($taskObj);
    
}
else{
    // call add
    $status = addTask($taskObj);
}

if ( ! $status ) {
    echo '<script type="text/javascript">alert("Error creating task");';
}

header("Location:/planit/events-details.php?eventid=$eventid");
?>