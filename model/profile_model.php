<?php
//require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";

/**
 * Get profile for a user
 * @params  username
 * @return object containing all user details
 */
function getProfile($username) {
    $result = new stdClass();
    $userProfile = new stdClass();
    $customerQuery = sendQuery("SELECT * FROM person where username = '$username'");
    $result = $customerQuery->fetch_assoc();
    $userProfile->username = $result['username'];
    $userProfile->email = $result['email'];
    $userProfile->phone = $result['phone'];
    $userProfile->fullname = $result['fullname'];
    return $userProfile;
}

/**
 * Update profile
 * 
 * @params Object which contains complete profile of the user
 * 
 */
function updateProfile($userProfile){
    $updateQuery = sendQuery("
    UPDATE `planit`.`person`
    SET
    `email` = '$userProfile->username',
    `phone` = '$userProfile->phone',
    `fullname` = '$userProfile->fullname'
    WHERE `username` = '$userProfile->username'");

    if ($updateQuery) {
        return true;
    }
    return false;
}
?>