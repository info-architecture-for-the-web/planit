<?php
require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";


/**
 * Get all the friends of this user
 * 
 * @params  username
 * @return  array of objects with friends details(username,fullname)
 */
function getFriends($username){

    $customerQuery = sendQuery("SELECT friend,friendname FROM friends where username = '$username'");
    $friendArray = array();
    // output data of each row
    while($row = $customerQuery->fetch_assoc()) {
        // create object (username,fullname)
        $userProfile = new stdClass();
        $userProfile->fusername = $row["friend"];
        $userProfile->fname = $row["friendname"];
        // add it to our array
        array_push($friendArray,$userProfile);
    }
    
    // print all our friends
    // foreach ($friendArray as $friend) {
    //     echo "friend: " . $friend->fusername. " - friendname: " . $friend->fname. "<br>";
    // }

    return $friendArray;
}

/**
 * Add friends in the friend list 
 * @params array of friends to be added, username
 */
function addFriends($friendArray, $username) {
}

// getFriends("vbhor");
?>