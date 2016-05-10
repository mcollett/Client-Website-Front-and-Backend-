<?php

include('../_sql/connect.php');

$staff_name = $_POST['name'];
$staff_position = $_POST['position'];
$staff_phone = $_POST['phone'];
$staff_carrier = $_POST['carrier'];
$staff_email = $_POST['email'];

mysql_query("INSERT INTO staff 
	(name,
		position,
		payout,
		phone,
		textdest,
		email
	 ) 
	VALUES 
	('$staff_name',
		'$staff_position',
		'50',
		'$staff_phone',
		'$staff_carrier',
		'$staff_email'
	 )");

header("Location: ../content.php?page=staff");

?>