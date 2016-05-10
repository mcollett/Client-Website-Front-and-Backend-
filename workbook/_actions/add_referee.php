<?php

include('../_sql/connect.php');

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$contact_email = $_POST['contact-email'];
$paypal_email = $_POST['paypal-email'];
$rafcode = $_POST['raf-code'];

mysql_query("INSERT INTO raf_users 
	(name,
		username,
		password,
		contact_email,
		paypal_email,
		rafcode
	 ) 
	VALUES 
	('$name',
		'$username',
		'$password',
		'$contact_email',
		'$paypal_email',
		'$rafcode'
	 )");

header("Location: ../content.php?page=referral_program");

?>