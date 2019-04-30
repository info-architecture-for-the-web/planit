<?php
//  require "../dbconnection/dbconnect.php";
 $username = filter_input(INPUT_POST, 'username');
 $password = filter_input(INPUT_POST, 'password');
//  echo $username . $password;
 $passwordEnc = md5($password);
 $customerQuery = sendQuery("SELECT password FROM person where username = '$username'");
 function password_auth($authQuery) {
     global $passwordEnc, $username;
     $result = $authQuery->fetch_assoc();
     $passwordRetr = $result['password'];
     if ($passwordEnc == $passwordRetr) {
         $_SESSION['username'] = $username;
         return true;
     } else {
        echo '<script type="text/javascript">alert("Incorrect Password"); location="../login.php";</script>';
     }
 }
 if ($customerQuery && password_auth($customerQuery)) {
    // Set username on session object
    $_SESSION["username"] = $username;
    header("Location: ../index.php");
 } else{
     echo '<script type="text/javascript">alert("Unknown User"); location="../login.php";</script>';
 } 
?>