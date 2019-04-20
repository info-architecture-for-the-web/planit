<?php
// destroy session and move to login page
session_start();
session_destroy();
header("Location: ../index.php");
?>