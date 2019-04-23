<?php
require $_SERVER['DOCUMENT_ROOT'] . "/planit/dbconnection/dbconnect.php";
$fullname = filter_input(INPUT_POST, 'fullname');
$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$confirmpassword = filter_input(INPUT_POST, 'confirmpassword');
$phone = filter_input(INPUT_POST, 'phone');
//  echo 'Signing Up';
//  echo $fullname;
//  echo $username;
//  echo $email;
//  echo $password;
//  echo $confirmpassword;
//  echo $phone;

if ($password == $confirmpassword) {
    // echo 'Password matched';
    $createUser = sendQuery("SELECT username FROM person where username = '$username'");
    if ($createUser) {
        echo '<script type="text/javascript">alert("The username is already taken"); location="../register.php";</script>';
    } else {
        $password = md5($password);
        $query = "INSERT INTO `person` (`fullname`, `username`, `password`, `email`, `phone`) VALUES('$fullname','$username','$password','$email','$phone')";
        echo (sendQuery($query));

        echo '<script type="text/javascript">alert("Registration Successful"); location="../login.php";</script>';
    }
} else {
    // echo "Password does not match";
    echo '<script type="text/javascript">alert("Password does not match"); location="../register.php";</script>';
}