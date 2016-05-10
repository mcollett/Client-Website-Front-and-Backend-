<?php

include('../_sql/sqlcon.php');

$tID = $_GET['tID'];

$get_email = mysql_query("SELECT email FROM buyerlist WHERE connectkey = '$tID'");
$user_email = mysql_result($get_email,0);

$trID = $_GET['tID'];

//define the receiver of the email
$to = $user_email;
//define the subject of the email
$subject = 'WoW Challenge Modes Order Confirmation'; 
//define the message to be sent. Each line should be separated with \n
$message = "Thank you for your recent purchase with us.\n\nYour transaction number is: $trID\n\nYou can use this Transaction ID to login to the client area via our website for some nifty tools to help make your experience a lot smoother.\n\nRegards,\n\n-WoW Challenge Modes"; 
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: orders-noreply@wowchallengemodes.com\r\nReply-To: orders-noreply@wowchallengemodes.com";
//send the email
//$mail_sent = 
@mail( $to, $subject, $message, $headers );
header("Location: ../thanks?tID=$tID&mail=sent");
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
//echo $mail_sent ? "Mail sent" : "Mail failed";

?>