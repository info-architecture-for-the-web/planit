<?php
require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";
include $_SERVER['DOCUMENT_ROOT']."/planit/model/profile_model.php";
/**
 * This controller is used to update the existing profile
 */

$profileObj = new stdClass();
$profileObj->username = $_SESSION["username"];
$profileObj->email = filter_input(INPUT_POST, 'email');
$profileObj->phone = filter_input(INPUT_POST, 'phone');

if ( ! updateProfile($profileObj) ){
    echo '<script type="text/javascript">alert("Error updating profile")';
}
header("Location:/planit/myprofile.php");
?>