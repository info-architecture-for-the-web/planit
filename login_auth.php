<?php
//session_start();
require "dbconnection/dbconnect.php";
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$passwordEnc = $password; //md5($password);
$customerQuery = pg_query("SELECT password FROM profile_management  where username = '$username'");
echo $customerQuery;
echo pg_num_rows($customerQuery);

function password_auth($authQuery) {
    global $passwordEnc, $username;
    $result = pg_fetch_assoc($authQuery);
    $passwordRetr = $result['password'];

    if ($passwordEnc == $passwordRetr) {
        $_SESSION['username'] = $username;
        return true;
    } else {
       echo '<script type="text/javascript">alert("Incorrect Password"); location="login.php";</script>';
    }
}
if (pg_num_rows($customerQuery) > 0 && password_auth($customerQuery)) {
    header("Location: index.php");
} else{
    echo '<script type="text/javascript">alert("Unknown User"); location="login.php";</script>';
}