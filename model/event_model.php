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

    if (! $customerQuery ) {
        return $eventArray;
    }
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
    $eventObj = new stdClass();

    if (! $customerQuery ) {
        return $eventObj;
    }
    $row = $customerQuery->fetch_assoc();

    // create object (username,fullname)
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
    if (! $nameQuery ) {
        return $nameArray;
    }
    
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
    
    if (! $memberQuery ) {
        return $memberArray;
    }
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
 * @return id of the event created, 0 otherwise
 */
function addEvent($event) {
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

    $eventId = 0;
    if ($addQuery) {
        $eventId = mysqli_insert_id (getMySqli());

        // add entry in participate
        $participateQuery = sendQuery(
            "INSERT INTO `planit`.`participate`
            (`role`,
            `username`,
            `eventid`)
            VALUES
            ('organizer',
            '$event->host',
            '$eventId')"
        );
    }    
    return $eventId;
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
        `date` = STR_TO_DATE('$event->date','%Y-%m-%d'),
        `location` = '$event->location',
        `description` = '$event->description',
        `host` = '$event->host'
        WHERE `eventid` = '$event->eventid'");

    $eventId = 0;
    if (updateQuery) {
        $eventId = mysqli_insert_id (getMySqli());
    }    
    return $eventId;
}

function addMemberToEvent($username,$eventid,$role)
{
    $insertQuery = sendQuery(
        "INSERT INTO `planit`.`participate`
        (`role`,
        `username`,
        `eventid`)
        VALUES
        ('$role',
        '$username',
        '$eventid');");

    return $eventid;
}
addMemberToEvent('mbelnek','30','member');

?>