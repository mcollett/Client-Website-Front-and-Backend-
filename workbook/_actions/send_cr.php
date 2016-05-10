<?php
$client_id = $_POST['client_id'];

$to = $_POST['client_email'];
$subject = "Your WoW Challenge Modes Run - Schedule Confirmation Request";
$txt = $_POST['message'];
$headers = "From: noreply@wowchallengemodes.com";

mail($to,$subject,$txt,$headers);
header("Location: ../content.php?page=client_reach&client_id=$client_id&alert=sent");

?>