<?php

include('../_sql/connect.php');

$run_id = $_GET['runid'];

$target = $_GET['target'];
$staff_id = $_GET['staff_id'];

if ($target == "tank") {

mysql_query("UPDATE schedule SET 
	staff_tank_id = '$staff_id' WHERE id='$run_id'");
	
$get_phone = mysql_query("SELECT phone, textdest FROM staff WHERE textdest != '' AND phone != '' AND id = '$staff_id'");
if (mysql_num_rows($get_phone) == 0) { } else {
	while ($phone_data = mysql_fetch_array($get_phone)) { $phone_number = $phone_data['phone']; $carrier_data = $phone_data['textdest']; }
}

$to = $phone_number."".$carrier_data;
$subject = "WCM Alert";
$msg = "You have been added to a run you have recently signed up for. Visit the staff portal for more information.";
mail($to,$subject,$msg,"From: WCM Staff Portal");

header("Location: ../content.php?page=view_run&id=$run_id");

}

if ($target == "healer") {

mysql_query("UPDATE schedule SET 
	staff_healer_id = '$staff_id' WHERE id='$run_id'");
	
$get_phone = mysql_query("SELECT phone, textdest FROM staff WHERE textdest != '' AND phone != '' AND id = '$staff_id'");
if (mysql_num_rows($get_phone) == 0) { } else {
	while ($phone_data = mysql_fetch_array($get_phone)) { $phone_number = $phone_data['phone']; $carrier_data = $phone_data['textdest']; }
}

$to = $phone_number."".$carrier_data;
$subject = "WCM Alert";
$msg = "You have been added to a run you have recently signed up for. Visit the staff portal for more information.";
mail($to,$subject,$msg,"From: WCM Staff Portal");

header("Location: ../content.php?page=view_run&id=$run_id");

}

if ($target == "dps1") {

mysql_query("UPDATE schedule SET 
	staff_dps1_id = '$staff_id' WHERE id='$run_id'");
	
$get_phone = mysql_query("SELECT phone, textdest FROM staff WHERE textdest != '' AND phone != '' AND id = '$staff_id'");
if (mysql_num_rows($get_phone) == 0) { } else {
	while ($phone_data = mysql_fetch_array($get_phone)) { $phone_number = $phone_data['phone']; $carrier_data = $phone_data['textdest']; }
}

$to = $phone_number."".$carrier_data;
$subject = "WCM Alert";
$msg = "You have been added to a run you have recently signed up for. Visit the staff portal for more information.";
mail($to,$subject,$msg,"From: WCM Staff Portal");

header("Location: ../content.php?page=view_run&id=$run_id");

}

if ($target == "dps2") {

mysql_query("UPDATE schedule SET 
	staff_dps2_id = '$staff_id' WHERE id='$run_id'");
	
$get_phone = mysql_query("SELECT phone, textdest FROM staff WHERE textdest != '' AND phone != '' AND id = '$staff_id'");
if (mysql_num_rows($get_phone) == 0) { } else {
	while ($phone_data = mysql_fetch_array($get_phone)) { $phone_number = $phone_data['phone']; $carrier_data = $phone_data['textdest']; }
}

$to = $phone_number."".$carrier_data;
$subject = "WCM Alert";
$msg = "You have been added to a run you have recently signed up for. Visit the staff portal for more information.";
mail($to,$subject,$msg,"From: WCM Staff Portal");

header("Location: ../content.php?page=view_run&id=$run_id");

}

if ($target == "dps3") {

mysql_query("UPDATE schedule SET 
	staff_dps3_id = '$staff_id' WHERE id='$run_id'");
	
$get_phone = mysql_query("SELECT phone, textdest FROM staff WHERE textdest != '' AND phone != '' AND id = '$staff_id'");
if (mysql_num_rows($get_phone) == 0) { } else {
	while ($phone_data = mysql_fetch_array($get_phone)) { $phone_number = $phone_data['phone']; $carrier_data = $phone_data['textdest']; }
}

$to = $phone_number."".$carrier_data;
$subject = "WCM Alert";
$msg = "You have been added to a run you have recently signed up for. Visit the staff portal for more information.";
mail($to,$subject,$msg,"From: WCM Staff Portal");

header("Location: ../content.php?page=view_run&id=$run_id");

}

?>