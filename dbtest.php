<?php
require("dbconnection/dbconnect.php");
$user_query = sendQuery("show tables");
if($user_query) {
    $user = $user_query->fetch_assoc();
    //$username = $user['username'];
} else {
    echo '<script type="text/javascript"> alert("Sorry, you do not have access to this page.");</script>';
}

?>



<html>
    <head>
        <title>Plan-It!</title>
        

    </head>
    <body>
        <?php
        // session_destroy();
        if ($_SESSION["username"]) {
            echo "username present";
        }
        else {
            echo "username NOT present";
        }
        echo "DB Connected!".$_SESSION["username"];
        echo count($user);
		foreach($user as $value) {
		  echo $value;
		}
        ?>
    </body>
</html>