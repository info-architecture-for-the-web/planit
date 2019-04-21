<?php
require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";;
include $_SERVER['DOCUMENT_ROOT']."/planit/model/event_model.php";
/**
 * This contoller handles requests for both, add and update events
 * this is defined if the session variable has EVENT_ID defined or not
 */

$status = false;
$eventObj = new stdClass();
$eventObj->name = filter_input(INPUT_POST, 'name');
$eventObj->date = filter_input(INPUT_POST, 'date');
$eventObj->location = filter_input(INPUT_POST, 'venue');
$eventObj->description = filter_input(INPUT_POST, 'message');
$eventObj->host = $_SESSION["username"];

// check if we have 'EVENT_ID' set
if (isset($_SESSION['EVENT_ID'])) {
    // call update
    $eventObj->eventid = $_SESSION['EVENT_ID'];
    $status = updateEvent($eventObj);
    
}
else{
    // call add
    $status = addEvent($eventObj);
}

if ($status) {
    header("Location:/planit/events-details.php?eventid=$status");
}
else {
    echo '<script type="text/javascript">alert("Error creating event"); location="../create-event.php";</script>';
}

?>