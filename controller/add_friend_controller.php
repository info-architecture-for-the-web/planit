<?php
require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";
include $_SERVER['DOCUMENT_ROOT']."/planit/model/friends_model.php";

addFriendship($_GET['user1'],$_GET['user2']);

echo '<script type="text/javascript">alert("Thank you for accepting friendship request."); location="../index.php";</script>';
?>