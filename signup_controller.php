<?php

require "dbconnection/dbconnect.php";
$fullname = filter_input(INPUT_POST, 'name');
$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$confirmpassword = filter_input(INPUT_POST, 'repassword');
$phone = filter_input(INPUT_POST, 'phone');
echo 'Signing Up';
echo $fullname;
echo $username;
echo $email;
echo $password;
echo $confirmpassword;
echo $phone;

if ($password == $confirmpassword) {
    echo 'Password matched';
    $createUser = pg_query("SELECT username FROM profile_management where username = '$username'");
    echo pg_num_rows($createUser);
    if ( pg_num_rows($createUser) > 0 ) {
            echo ":::Username Taken";
            echo '<script type="text/javascript">alert("The username is already taken"); location="login.php";</script>';
    } else {
        echo "creating new user";
        $password = $password;// md5($password);
        $query = "INSERT INTO profile_management (fullname, username, password, email, phone) VALUES('$fullname','$username','$password','$email','$phone')";
        echo(pg_query($query));                
        echo '<script type="text/javascript">alert("Registration Successful"); location="login.php";</script>';
    }
} else {
    echo '<script type="text/javascript">alert("Password does not match"); location="login.php";</script>';
}
