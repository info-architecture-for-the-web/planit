<?php
require "../dbconnection/dbconnect.php";
include "../model/profile_model.php";
/**
 * This controller is used to update the existing profile
 */

$profileObj = new stdClass();
$profileObj->username = $_SESSION["username"];
$profileObj->email = filter_input(INPUT_POST, 'email');
$profileObj->phone = filter_input(INPUT_POST, 'phone');

// Profile image
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["profile_image"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// We rename the file to be used saved by username
$target_file = $target_dir .$profileObj->username.".".$imageFileType;
// store image name to be uploaded to database
$profileObj->profile_image = $profileObj->username.".".$imageFileType;

// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// Check file size
if ($_FILES["profile_image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["profile_image"]["name"]). " has been uploaded.";
    } else {
        // echo "Sorry, there was an error uploading your profile Image.";
    }
}
if ( ! updateProfile($profileObj) ){
    echo '<script type="text/javascript">alert("Error updating profile")';
}
header("Location:../myprofile.php");
?>