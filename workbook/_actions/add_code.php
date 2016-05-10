<?php

include('../_sql/connect.php');

$code_name = $_POST['name'];
$code_amount = $_POST['amount'];

mysql_query("INSERT INTO coupons 
	(code,
		discount
	 ) 
	VALUES 
	('$code_name',
		'$code_amount'
	 )");

header("Location: ../content.php?page=discounts");

?>