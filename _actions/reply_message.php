<?php 
include('../_sql/sqlcon.php');
session_start();

$message = htmlspecialchars($_POST['msgcontent']);
$timestamp = strtotime("now");
$transID = $_SESSION['transID'];
$msgID = $_POST['msgid'];

mysql_query("INSERT INTO msg_response (msg_id, author, response_time, message) VALUES ('$msgID', 'You', '$timestamp', '$message')");

header("Location: ../client?page=messages&msg_id=$msgID");

?>