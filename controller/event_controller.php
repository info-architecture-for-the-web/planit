<?php
require "../dbconnection/dbconnect.php";
include "../model/event_model.php";
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
if (isset($_GET['eventid'])) {
    // call update
    $eventObj->eventid = $_GET['eventid'];
    $status = updateEvent($eventObj);

} else {
    // call add
    $status = addEvent($eventObj);
    $eventObj->eventid = $status;
}

// Cover image
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/planit/uploads/";
$target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
//echo $target_file . "filecccc";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["cover_image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// We rename the file to be used saved by username
$target_file = $target_dir . $eventObj->eventid . "." . $imageFileType;
// store image name to be uploaded to database
$eventObj->cover_image = $eventObj->eventid . "." . $imageFileType;

// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// Check file size
if ($_FILES["cover_image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["profile_image"]["name"]). " has been uploaded.";
    } else {
        // echo "Sorry, there was an error uploading your profile Image.";
    }
}
echo $status;
if (isset($status)) {
    header("Location:/planit/events-details.php?eventid=" .$eventObj->eventid);
} else {
    echo '<script type="text/javascript">alert("Error creating event"); location="../create-event.php";</script>';
}
