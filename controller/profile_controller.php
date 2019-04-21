<?php
//require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";

/**
 * This controller is used to update the existing profile
 */

$profileObj = new stdClass();
$profileObj->username = $_SESSION["username"];
$profileObj->email = filter_input(INPUT_POST, 'email');
$profileObj->phone = filter_input(INPUT_POST, 'phone');
$profileObj->fullname = filter_input(INPUT_POST, 'fullname');

return updateProfile($profileObj);
?>