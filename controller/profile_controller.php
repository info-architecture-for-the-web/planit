<?php
require "../dbconnection/dbconnect.php";

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

echo getProfile("mbelnek")->email;
?>