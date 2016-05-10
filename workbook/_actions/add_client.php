<?php

include('../_sql/connect.php');

$client_name = $_POST['clientname'];
$character_name = $_POST['character-name'];
$primary_talents = $_POST['primary-talents'];
$secondary_talents = $_POST['secondary-talents'];
$tertiary_talents = $_POST['tertiary-talents'];
$character_class = $_POST['class'];
$character_realm = mysql_real_escape_string($_POST['realm']);
$character_region = $_POST['region'];
$character_faction = $_POST['faction'];
$character_phone = $_POST['phone'];
$character_skype_username = $_POST['skype-username'];
$character_skype_display = $_POST['skype-display'];
$email = $_POST['email'];
$package = $_POST['package'];
$payment_amount = $_POST['payment-amount'];
$raf_code = $_POST['raf-code'];
$here_how = $_POST['acq'];

$time_now = strtotime("now");

mysql_query("INSERT INTO buyerlist 
	(buyer_name,
		character_name,
		character_spec,
		alternative_spec,
		second_alternative_spec,
		character_class,
		character_realm,
		geography,
		faction,
		phone,
		skype_username,
		skype_display_name,
		email,
		playtype,
		payment_amount,
		payment_method,
		payment_status,
		run_status,
		date_added,
		rafcode,
		here_how
	 ) 
	VALUES 
	('$client_name',
		'$character_name',
		'$primary_talents',
		'$secondary_talents',
		'$tertiary_talents',
		'$character_class',
		'$character_realm',
		'$character_region',
		'$character_faction',
		'$character_phone',
		'$character_skype_username',
		'$character_skype_display',
		'$email',
		'$package',
		'$payment_amount',
		'USD',
		'paid',
		'incomplete',
		'$time_now',
		'$raf_code',
		'$here_how'
	 )");

header("Location: ../content.php?page=active_clients");

?>