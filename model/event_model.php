<?php
// require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";

/**
 * Get all events for the given user
 * @params username
 * @return array of event objects, each object containing event details
 */
function getEvents($username){

    $customerQuery = sendQuery("SELECT * FROM event where eventid IN (select eventid from participate where username = '$username')");
    $eventArray = array();
    // output data of each row
    while($row = $customerQuery->fetch_assoc()) {
        // create object (username,fullname)
        $eventObj = new stdClass();
        $eventObj->eventid = $row["eventid"];
        $eventObj->ename = $row["name"];
        $eventObj->edate = $row["date"];
        $eventObj->elocation = $row["location"];
        $eventObj->edescription = $row["description"];
        // add it to our array
        array_push($eventArray,$eventObj);
    }
    
    // print all our friends
    // foreach ($eventArray as $event) {
    //     echo "event: " . $event->ename. " - edate: " . $event->edate. "<br>";
    // }

    return $eventArray;
    
}

/**
 * Add event
 * @params event object, should contain all data
 */
function addEvent($event) {
}

/**
 * Get all members in the event
 * @params eventId
 * @return list of member objects, each object containing member details
 */
function getEventMembers($eventId){
}
?>