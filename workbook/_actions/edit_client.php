<?php

include('../_sql/connect.php');

$client_id = $_GET['id'];

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

mysql_query("UPDATE buyerlist SET 
	buyer_name = '$client_name',
	character_name = '$character_name',
	character_spec = '$primary_talents',
	alternative_spec = '$secondary_talents',
	second_alternative_spec = '$tertiary_talents',
	character_class = '$character_class',
	character_realm = '$character_realm',
	geography = '$character_region',
	faction = '$character_faction',
	phone = '$character_phone',
	skype_username = '$character_skype_username',
	skype_display_name = '$character_skype_display',
	email = '$email',
	playtype = '$package',
	payment_amount = '$payment_amount',
	rafcode = '$raf_code',
	here_how = '$here_how' WHERE id='$_GET[id]'");



header("Location: ../content.php?page=active_clients");

?>