<?php
require "../dbconnection/dbconnect.php";
include "../event_model.php";

addMemberToEvent($_GET['username'],$_GET['eventid'],'member');

echo '<script type="text/javascript">alert("Thank you for accepting the invitation.\nYou have been added to the event."); location="../events-details.php?eventid='.$_GET['eventid'].'";</script>';
?>