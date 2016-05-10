<?php 
include('../_sql/sqlcon.php');
session_start();

$message = mysql_real_escape_string(htmlspecialchars(($_POST['comment'])));
$timestamp = strtotime("now");
$transID = $_SESSION['transID'];

mysql_query("INSERT INTO refundreq (transID, reason, requestdate) VALUES ('$transID', '$message', '$timestamp')");

header("Location: ../client?page=refund&msg=requested");

?>