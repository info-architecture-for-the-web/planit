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
 * 3 - Send invite to join the website
 * 4 - Invitation accepted to join the website
 */

$purpose = $_GET['purpose'];
$fromUsername = $_GET['from'];

// Get the name of the sender
$senderName = getProfile($fromUsername)->fullname;
// Todo: Update as per purpose
$link = "http://localhost/planit/";

if ($purpose == 1){
    $friends = $_POST['friends'];
    
    if(empty($friends))
    {
        echo("You have no friends.");
    }
    else{
        foreach($friends as $friend)
        {
            $toUsername = $friend;
            $receiver = getProfile($toUsername);
            $receiverName = $receiver->fullname;
            $receiverEmail = $receiver->email;
            // echo "\n sending email to".$receiverEmail;
            // Request to join event
            $eventName = getEventDetails($_GET['eventid'])->ename;
            $body = "Hi ".$receiverName. ",\n\n Your friend ". $senderName . " has requested you to join the event: ".$eventName;
            $body = $body . "\nPlease accept it by clicking on the below link:\n\t";
            $body = $body . $link;
            $body = $body ."\n\nRegards,\nTeam PlanIt.";
        
            $subject = 'Request to join event from '. $senderName;
            sendEmail($receiverEmail, $subject, $body);
        }
    }
    // header("Location: ../index.php");
    // echo '<script type="text/javascript">alert("Requests have been sent to your friends!!!"); location="../index.php";</script>';
    echo '<script type="text/javascript">alert("Requests have been sent to your friends!!!"); location="../events-details.php?eventid='.$_GET['eventid'].'";</script>';
    // $body = 'Your bid of amount ' .$amount. ' on post #' .$pid . ' has been successfully posted.';
    // $subject = 'We\'ve received your bid.';
    // sendEmail($email_from, $subject, $body);
} elseif ($purpose == 2) {
    // Request to join the website
    $body = 'The user ' . $email_from . ' has commented on your post #' .$pid . '. Scoot over to helpify.com to check it out.';
    $subject = 'Help is on its Way. Your post got a new comment';
    sendEmail($receiverEmail, $subject, $body);
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