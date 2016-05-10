<?php

include('../_sql/connect.php');

$run_id = $_GET['id'];

mysql_query("DELETE FROM schedule WHERE id = '$run_id'");

$get_run_timestamp = mysql_query("SELECT timestamp FROM schedule WHERE id = '$run_id'");

while ($run_timestamp_array = mysql_fetch_array($get_run_timestamp)) {
	$run_timestamp = $run_timestamp_array['timestamp'];
}

	// MMS Alert
	
	// Matt
	//$phone_number = "4232375258";
	//$carrier = "@txt.att.net";
	//$to = $phone_number.$carrier;
	//$subject = "Schedule Alert";
	//$message = "The run for ".date("l, F jS - h:i A", $run_timestamp)." PST has been cancelled or modified.";
	//$from = "WoW Challenge Modes";
	//$headers = "From:" . $from;
	//mail($to,$subject,$message,$headers);
	
	// Stephen
	//$phone_number = "7143134307";
	//$carrier = "@vtext.com";
	//$to = $phone_number.$carrier;
	//$subject = "Schedule Alert";
	//$message = "The run for ".date("l, F jS - h:i A", $run_timestamp)." PST has been cancelled or modified.";
	//$from = "WoW Challenge Modes";
	//$headers = "From:" . $from;
	//mail($to,$subject,$message,$headers);
	
	// James
	//$phone_number = "7144235430";
	//$carrier = "@txt.att.net";
	//$to = $phone_number.$carrier;
	//$subject = "Schedule Alert";
	//$message = "The run for ".date("l, F jS - h:i A", $run_timestamp)." PST has been cancelled or modified.";
	//$from = "WoW Challenge Modes";
	//$headers = "From:" . $from;
	//mail($to,$subject,$message,$headers);

header("Location: ../content.php?page=dashboard");

?>