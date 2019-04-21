<?php
// require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";;

/**
 * This contoller handles requests for both, add and update events
 * this is defined if the session variable has EVENT_ID defined or not
 */
$status = false;
$eventObj = new stdClass();
$eventObj->ename = filter_input(INPUT_POST, 'name');
$eventObj->edate = filter_input(INPUT_POST, 'date');
$eventObj->elocation = filter_input(INPUT_POST, 'location');
$eventObj->edescription = filter_input(INPUT_POST, 'description');

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
return $status;
?>