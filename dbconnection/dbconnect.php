<?php

/*
 * Caution: Need to call $conn->close() after including this file
 */
$db_server = 'db.ils.indiana.edu';
$db_username = 'mbelnek';
$db_password = "K3ZxVwHW";
$db_name = 'mbelnek\planit';
// TODO:
// Move table to planit db.
// Using public db for now to avoid access issues, that's why used dbname='$db_username'
$connection_string = "host='$db_server' dbname='$db_username' port=5433 user='$db_username' password='$db_password'";
$conn = pg_connect($connection_string) or die('Could not connect: ' . pg_last_error());

function sendQuery($cmd){ 
    global $conn;
    // $conn->set_charset('utf8');

    // Performing SQL query
    $result = pg_query($cmd) or die('Query failed: ' . pg_last_error());
    
    /* SELECT:
     *  result has multiple rows -> return obj
     *  result has 0 rows -> return false
     *
     * INSERT/DELETE/UPDATE/...
     *  successful -> return true
     *  unsuccessful -> return false
     */
    if (gettype($result) == "boolean" or $result->num_rows > 0) {
        return $result; // to read: $result->fetch_assoc()["$column_name"]
    } else {
        return false;
    }
    pg_close($conn);
}
