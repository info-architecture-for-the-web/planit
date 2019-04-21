<?php
// require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";

// Will return all the tasks assigned to this user
function getTasksByUsername($username){
    // SELECT * FROM planit.task where assignedTo = 'vbhor';

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
        $taskObj->eventid = $row["eventid"];
        $taskObj->assignedBy = $row["assignedBy"];
        $taskObj->modifiedBy = $row["modifiedBy"];

        // add it to our array
        array_push($taskArray,$taskObj);
    }
    
    // print all our friends
    foreach ($taskArray as $task) {
        echo "task: " . $task->title. " - edate: " . $task->assignedTo. "<br>";
    }

    return $taskArray;

}

// Will return all the tasks in this event
function getTasksByEvent($eventid){
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
        $taskObj->eventid = $row["eventid"];
        $taskObj->assignedBy = $row["assignedBy"];
        $taskObj->modifiedBy = $row["modifiedBy"];

        // add it to our array
        array_push($taskArray,$taskObj);
    }
    
    // print all our friends
    foreach ($taskArray as $task) {
        echo "task: " . $task->title. " - edate: " . $task->assignedTo. "<br>";
    }

    return $taskArray;
}

function addTask($task) {
    
}
?>