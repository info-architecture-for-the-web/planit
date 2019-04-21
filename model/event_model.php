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

// get event details
function getEventDetails($eventId)
{
    $customerQuery = sendQuery("SELECT * FROM event inner join person ON event.host = person.username where eventid = '$eventId'");
    $row = $customerQuery->fetch_assoc();

    // create object (username,fullname)
    $eventObj = new stdClass();
    $eventObj->eventid = $row["eventid"];
    $eventObj->ename = $row["name"];
    $eventObj->edate = $row["date"];
    $eventObj->elocation = $row["location"];
    $eventObj->edescription = $row["description"];
    $eventObj->ehostUsername = $row["host"];
    $eventObj->ehostName = $row["fullname"];
    
    // print all our friends
    // echo "event: " . $eventObj->hostUsername. " - edate: " . $eventObj->hostName. "<br>";

    return $eventObj;
}

/**
 * Get all members of the of this event
 * @params eventId
 * @return array of member objects(memberUsername,memberName,role)
 */
function getEventMembers($eventId)
{
    // We also get a dictionary of username => fullname, this will be useful to us when
    // we have to get the fullname using the username
    $nameQuery = sendQuery("SELECT * from person");
    $nameArray = array();
    while($row = $nameQuery->fetch_assoc()) {
        // add it to our array
        $nameArray[$row["username"]] = $row["fullname"];
    }

    // print all users
    // foreach ($nameArray as $name) {
    //     echo "username: " . $nameArray['vbhor'] . "<br>";
    // }
    
    $memberQuery = sendQuery("SELECT * FROM planit.participate where eventid = '$eventId'");
    $memberArray = array();
    // output data of each row
    while($row = $memberQuery->fetch_assoc()) {
        // create object (username,fullname)
        $memberProfile = new stdClass();
        $memberProfile->username = $row["username"];
        $memberProfile->memberName = $nameArray[$memberProfile->username];
        $memberProfile->role = $row["role"];
        // add it to our array
        array_push($memberArray,$memberProfile);
    }
    
    // print all our friends
    // foreach ($memberArray as $member) {
    //     echo "friend: " . $member->username. " - friendname: " . $member->memberName. "<br>";
    // }
    return $memberArray;
}

/**
 * Add a new event
 * @params event object, should contain all data
 * @return true if successfull, false otherwise
 */
function addEvent($event) {
    echo "INSERT INTO `event`
    (`name`,
    `date`,
    `location`,
    `description`,
    `host`)
    VALUES
    ('$event->name',
    STR_TO_DATE('$event->date','%Y-%m-%d'),
    '$event->location',
    '$event->description',
    '$event->host')";
    $addQuery = sendQuery(
        "INSERT INTO `event`
        (`name`,
        `date`,
        `location`,
        `description`,
        `host`)
        VALUES
        ('$event->name',
        STR_TO_DATE('$event->date','%Y-%m-%d'),
        '$event->location',
        '$event->description',
        '$event->host')");

    if ($addQuery) {
        return true;
    }    
    return false;
}

/**
 * Update an existing event
 * @params event object, should contain all data
 * @return true if successfull, false otherwise
 */
function updateEvent($event) {
    $updateQuery = sendQuery(
        "UPDATE `planit`.`event`
        SET
        `name` = '$event->name',
        `date` = STR_TO_DATE('$event->date','%m/%d/%Y'),
        `location` = '$event->location',
        `description` = '$event->description',
        `host` = '$event->host'
        WHERE `eventid` = '$event->eventid'");

    if (updateQuery) {
        return true;
    }    
    return false;
}
?>