<?php 
include('../_sql/sqlcon.php');
session_start();

$message = mysql_real_escape_string(htmlspecialchars(($_POST['comment'])));
$timestamp = strtotime("now");
$transID = $_SESSION['transID'];
$rating = $_POST['rating'];
$package = $_POST['package'];
$cclass = $_POST['class'];
$cspec = $_POST['spec'];

mysql_query("INSERT INTO reviews (transID, rating, char_class, char_spec, comments, package, approval) VALUES ('$transID', '$rating', '$cclass', '$cspec', '$message', '$package', 'unapproved')");

header("Location: ../client?page=review&msg=thanks");

?>