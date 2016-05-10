<?php

include('../_sql/connect.php');

$message = htmlspecialchars($_POST['message']);
$timestamp = strtotime("now");
$staff = $_POST['staffresponder'];
$msgID = $_GET['msgid'];

mysql_query("INSERT INTO msg_response (msg_id, author, response_time, message) VALUES ('$msgID', '$staff', '$timestamp', '$message')");

header("Location: ../content.php?page=tickets&viewmsg=$msgID");

?>