<?php

include('../_sql/connect.php');

$get_last_entry = mysql_query("SELECT id FROM schedule ORDER BY id DESC LIMIT 1");
$last_entry = mysql_result($get_last_entry,0);
$page_target = $last_entry + 1;

// Buyer playing Tank
$client_tank = $_POST['tank-userID'];
// Buyer playing Healer
$client_healer = $_POST['healer-userID'];
// Buyer playing DPS
$client_dps1 = $_POST['dps-userID'][0];
// Buyer playing DPS
$client_dps2 = $_POST['dps-userID'][1];
// Buyer playing DPS
$client_dps3 = $_POST['dps-userID'][2];
// Raw Time
$time = $_POST['input-timepicker'];
// Raw Date
$date = $_POST['input-datepicker'];
// Run Timestamp
$run_timestamp = strtotime("$date $time");

// Staff playing Tank
$staff_tank = $_POST['tank-staff-spot'];
// Staff playing Healer
$staff_healer = $_POST['healer-staff-spot'];
// Staff playing DPS
$staff_dps1 = $_POST['dps1-staff-spot'];
// Staff playing DPS
$staff_dps2 = $_POST['dps2-staff-spot'];
// Staff playing DPS
$staff_dps3 = $_POST['dps3-staff-spot'];

// Region
$region = $_POST['region'];
// Faction
$faction = $_POST['faction'];

mysql_query("INSERT INTO schedule 
	(timestamp,
	 region,
	 faction,
	 tank_id,
	 healer_id,
	 dps1_id,
	 dps2_id,
	 dps3_id,
	 staff_tank_id,
	 staff_healer_id,
	 staff_dps1_id,
	 staff_dps2_id,
	 staff_dps3_id
	 ) 
	VALUES 
	('$run_timestamp',
	 '$region',
	 '$faction',
	 '$client_tank',
	 '$client_healer',
	 '$client_dps1',
	 '$client_dps2',
	 '$client_dps3',
	 '$staff_tank',
	 '$staff_healer',
	 '$staff_dps1',
	 '$staff_dps2',
	 '$staff_dps3'
	 )");
	 
	 // Send MMS Alert
	 
	// Matt
	//$phone_number = "4232375258";
	//$carrier = "@txt.att.net";
	//$to = $phone_number.$carrier;
	//$subject = "Schedule Alert";
	//$message = "A run has been scheduled for ".date("l, F jS - h:i A", $run_timestamp)." PST";
	//$from = "WoW Challenge Modes";
	//$headers = "From:" . $from;
	//mail($to,$subject,$message,$headers);
	
	// Stephen
	//$phone_number = "7143134307";
	//$carrier = "@vtext.com";
	//$to = $phone_number.$carrier;
	//$subject = "Schedule Alert";
	//$message = "A run has been scheduled for ".date("l, F jS - h:i A", $run_timestamp)." PST";
	//$from = "WoW Challenge Modes";
	//$headers = "From:" . $from;
	//mail($to,$subject,$message,$headers);
	
	// James
	//$phone_number = "7144235430";
	//$carrier = "@txt.att.net";
	//$to = $phone_number.$carrier;
	//$subject = "Schedule Alert";
	//$message = "A run has been scheduled for ".date("l, F jS - h:i A", $run_timestamp)." PST";
	//$from = "WoW Challenge Modes";
	//$headers = "From:" . $from;
	//mail($to,$subject,$message,$headers);

header("Location: ../content.php?page=dashboard");
?>