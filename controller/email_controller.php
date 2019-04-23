<?php
header("Access-Control-Allow-Origin: *");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/exception.php';
require 'PHPMailer/phpmailer.php';
require 'PHPMailer/smtp.php';
require $_SERVER['DOCUMENT_ROOT']."/planit/dbconnection/dbconnect.php";
include $_SERVER['DOCUMENT_ROOT']."/planit/model/profile_model.php";
include $_SERVER['DOCUMENT_ROOT']."/planit/model/event_model.php";

$email_from = 'no-reply@planit.com';
/**
 * Valid values for purpose:
 * 1 - Invite to join event
 * 2 - Invitation accepted to join event
 * 3 - Invite to be friends
 * 4 - Invitation accepted to be friends
 */

$purpose = $_GET['purpose'];
$fromUsername = $_GET['from'];

// Get the name of the sender
$senderName = getProfile($fromUsername)->fullname;
// Todo: Update as per purpose
$link = "http://localhost/planit/";

if ($purpose == 1){
    $link = $link . "controller/add_event_member_controller.php?eventid=".$_GET['eventid'];
    $friends = $_POST['friends'];
    if(empty($friends))
    {
        echo("You have no friends.");
    }
    else{
        foreach($friends as $friend)
        {
            $toUsername = $friend;
            $newLink = $link . "&username=".$friend;
            $receiver = getProfile($toUsername);
            $receiverName = $receiver->fullname;
            $receiverEmail = $receiver->email;
            // echo "\n sending email to".$receiverEmail;
            // Request to join event
            $eventName = getEventDetails($_GET['eventid'])->ename;
            $body = "Hi ".$receiverName. ",\n\n Your friend ". $senderName . " has requested you to join the event: ".$eventName;
            $body = $body . "\n\nPlease accept it by clicking on the below link:\n\t";
            $body = $body . $newLink;
            $body = $body ."\n\nRegards,\nTeam PlanIt.";
        
            $subject = 'Request to join event from '. $senderName;
            sendEmail($receiverEmail, $subject, $body);
        }
    }
    // header("Location: ../index.php");
    // echo '<script type="text/javascript">alert("Requests have been sent to your friends!!!"); location="../index.php";</script>';
    echo '<script type="text/javascript">alert("Requests have been sent to your friends!!!"); location="../events-details.php?eventid='.$_GET['eventid'].'";</script>';
} elseif ($purpose == 2) {
    // Invitation accepted
}
elseif ($purpose == 3){
    // Invitation to be friends
    $link = $link . "controller/add_friend_controller.php?user1=".$fromUsername;
    $friends = $_POST['friends'];
    if(empty($friends))
    {
        echo("You have no friends.");
    }
    else{
        foreach($friends as $friend)
        {
            $toUsername = $friend;
            $newLink = $link . "&user2=".$friend;
            $receiver = getProfile($toUsername);
            $receiverName = $receiver->fullname;
            $receiverEmail = $receiver->email;
            $body = "Hi ".$receiverName. ",\n\n". $senderName . " has sent you a friendship request on PlanIt.";
            $body = $body . "\n\nPlease accept it by clicking on the below link:\n\t";
            $body = $body . $newLink;
            $body = $body ."\n\nRegards,\nTeam PlanIt.";
        
            $subject = 'Friendship request from '. $senderName;
            sendEmail($receiverEmail, $subject, $body);
            echo '<script type="text/javascript">alert("Friendship requests have been sent!!!"); location="../myprofile.php';
        }
    }
}

function sendEmail($to, $subject, $body){
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP(); 
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'planit.cs.123@gmail.com';            // SMTP username
    $mail->Password   = 'infoweb2019';                           // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('no-reply@planit.com');
    $mail->addAddress($to);     // Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    // Content
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->send();
    // echo 'Message has been sent';
 } catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }
}
?>