<?php
require "../dbconnection/dbconnect.php";
echo $_POST["status"];
if(isset($_POST["status"])){
    $data = $_POST["status"];
}else{

}
if(isset($_GET["taskid"])){
    $taskid = $_GET["taskid"];
}

if(isset($_GET["eventid"])){
    $eventid = $_GET["eventid"];
}

updateTaskStatus($data , $taskid,$eventid);

// Update status of this task with newStatus
function updateTaskStatus($data, $taskid,$eventid){
    $statusQuery = sendQuery("UPDATE `planit`.`task` SET `status` = '$data' WHERE `taskid` = '$taskid'");

    if ($statusQuery) {
        header("Location:../events-details.php?eventid=$eventid");
        return true;
    }
    header("Location:../events-details.php?eventid=$eventid");
    return false;
}


?>