<?php
// require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";

// Will return details for the given task
function getTaskDetails($taskId){
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

    $taskQuery = sendQuery("SELECT * FROM planit.task where taskid = '$taskId'");
    $taskArray = array();
    // output data of each row
    $row = $taskQuery->fetch_assoc();
    // create object for task
    $taskObj = new stdClass();
    $taskObj->taskid = $row["taskid"];
    $taskObj->title = $row["title"];
    $taskObj->deadline = $row["deadline"];
    $taskObj->status = $row["status"];
    $taskObj->assignedTo = $row["assignedTo"];
    $taskObj->assignedToName = $nameArray[$taskObj->assignedTo];
    $taskObj->eventid = $row["eventid"];
    $taskObj->assignedBy = $row["assignedBy"];
    $taskObj->assignedByName = $nameArray[$taskObj->assignedBy];
    $taskObj->modifiedBy = $row["modifiedBy"];
    $taskObj->modifiedByName = $nameArray[$taskObj->modifiedBy];
    $taskObj->description = $row["description"];
    
    // print task details
    // echo "task: " . $taskObj->assignedToName. " - edate: " . $taskObj->assignedByName. "<br>";

    return $taskObj;
}

// Will return all the tasks assigned to this user
function getTasksByUsername($username){
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

    $taskQuery = sendQuery("SELECT * FROM planit.task where assignedTo = '$username'");
    $taskArray = array();
    // output data of each row
    while($row = $taskQuery->fetch_assoc()) {
        // create object (username,fullname)
        $taskObj = new stdClass();
        $taskObj->taskid = $row["taskid"];
        $taskObj->title = $row["title"];
        $taskObj->deadline = $row["deadline"];
        $taskObj->status = $row["status"];
        $taskObj->assignedTo = $row["assignedTo"];
        $taskObj->assignedToName = $nameArray[$taskObj->assignedTo];
        $taskObj->eventid = $row["eventid"];
        $taskObj->assignedBy = $row["assignedBy"];
        $taskObj->assignedByName = $nameArray[$taskObj->assignedBy];
        $taskObj->modifiedBy = $row["modifiedBy"];
        $taskObj->modifiedByName = $nameArray[$taskObj->modifiedBy];
        $taskObj->description = $row["description"];

        // add it to our array
        array_push($taskArray,$taskObj);
    }
    
    // print all tasks
    // foreach ($taskArray as $task) {
    //      echo "assignedToName: " . $task->assignedToName. " - assignedByName: " . $task->assignedByName. "<br>";
    // }
    return $taskArray;
}

// Will return all the tasks in this event
function getTasksByEvent($eventid){
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

    $taskQuery = sendQuery("SELECT * FROM planit.task where eventid = '$eventid'");
    echo "SELECT * FROM planit.task where eventid = '$eventid'";
    $taskArray = array();
    // output data of each row
    while($row = $taskQuery->fetch_assoc()) {
        // create object (username,fullname)
        $taskObj = new stdClass();
        $taskObj->taskid = $row["taskid"];
        $taskObj->title = $row["title"];
        $taskObj->deadline = $row["deadline"];
        $taskObj->status = $row["status"];
        $taskObj->assignedTo = $row["assignedTo"];
        $taskObj->assignedToName = $nameArray[$taskObj->assignedTo];
        $taskObj->eventid = $row["eventid"];
        $taskObj->assignedBy = $row["assignedBy"];
        $taskObj->assignedByName = $nameArray[$taskObj->assignedBy];
        $taskObj->modifiedBy = $row["modifiedBy"];
        $taskObj->modifiedByName = $nameArray[$taskObj->modifiedBy];
        $taskObj->description = $row["description"];

        // add it to our array
        array_push($taskArray,$taskObj);
    }
    
    // print all our friends
    // foreach ($taskArray as $task) {
    //     echo "task: " . $task->title. " - edate: " . $task->assignedTo. "<br>";
    // }

    return $taskArray;
}

function addTask($task) {
    
}

// Update status of this task with newStatus
function updateTaskStatus($taskId, $newStatus){
    $statusQuery = sendQuery("UPDATE `planit`.`task` SET `status` = '$newStatus' WHERE `taskid` = '$taskId'");

    if ($statusQuery) {
        return true;
    }

    return false;
}
?>