<?php 
include('../_sql/sqlcon.php');
session_start();

$message = mysql_real_escape_string(htmlspecialchars(($_POST['msgcontent'])));
$timestamp = strtotime("now");
$transID = $_SESSION['transID'];

mysql_query("INSERT INTO messages (submitted, transID, message, status) VALUES ('$timestamp', '$transID', '$message', 'open')");

header("Location: ../client?page=messages");

?>