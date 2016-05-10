<?php 
include('../_sql/sqlcon.php');

$name = mysql_real_escape_string(htmlspecialchars(($_POST['name'])));
$email = mysql_real_escape_string(htmlspecialchars(($_POST['email'])));
$phone = mysql_real_escape_string(htmlspecialchars(($_POST['phone'])));
$age = mysql_real_escape_string(htmlspecialchars(($_POST['age'])));
$city = mysql_real_escape_string(htmlspecialchars(($_POST['city'])));
$state = mysql_real_escape_string(htmlspecialchars(($_POST['state'])));
$zip = mysql_real_escape_string(htmlspecialchars(($_POST['zip'])));
$airport = mysql_real_escape_string(htmlspecialchars(($_POST['airport'])));
$why = mysql_real_escape_string(htmlspecialchars(($_POST['reason'])));

mysql_query("INSERT INTO blizzcon_giveaway (name, email, phone, age, city, state, zip, airport, why) VALUES ('$name', '$email', '$phone', '$age', '$city', '$state', '$zip', '$airport', '$why')");

header("Location: ../blizzcon?msg=thanks");

?>