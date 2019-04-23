<?php
//require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";


/**
 * Get all the friends of this user
 * 
 * @params  username
 * @return  array of objects with friends details(username,fullname)
 */
function getFriends($username){

    $customerQuery = sendQuery("SELECT friend,friendname FROM friends where username = '$username'");
    $friendArray = array();
    if (! $customerQuery ) {
        return $friendArray;
    }
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

function getAllUsers()
{
    $customerQuery = sendQuery("SELECT * FROM person");
    $friendArray = array();
    if (! $customerQuery ) {
        return $friendArray;
    }
    // output data of each row
    while($row = $customerQuery->fetch_assoc()) {
        // create object (username,fullname)
        $userProfile = new stdClass();
        $userProfile->fusername = $row["username"];
        $userProfile->fname = $row["fullname"];
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
 * Add friendship between user1 and user2
 * @params array of friends to be added, username
 */
function addFriendship($user1, $user2) {

    // We get a dictionary of username => fullname, this will be useful to us when
    // we have to get the fullname using the username
    $nameQuery = sendQuery("SELECT * from person");
    $nameArray = array();
    while($row = $nameQuery->fetch_assoc()) {
        // add it to our array
        $nameArray[$row["username"]] = $row["fullname"];
    }

    // We need to add two entries
    // 1. user1 friends with user2(user2's username, user2's fullname)
    // 2. user2 friends with user1(user1's username, user1's fullname)
    // We add this redundancy to improve fetching data at runtime, as
    // #read_requests >> #write_requests
    
    // First insert query:
    $insertQuery = sendQuery("INSERT INTO `planit`.`friends`
    (`username`,
    `friend`,
    `friendname`)
    VALUES
    ('$user1',
    '$user2',
    '$nameArray[$user2]')");

    // Second insert query:
    $insertQuery = sendQuery("INSERT INTO `planit`.`friends`
    (`username`,
    `friend`,
    `friendname`)
    VALUES
    ('$user2',
    '$user1',
   ' $nameArray[$user1]')");
}
?>