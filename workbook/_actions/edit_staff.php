<?php

include('../_sql/connect.php');

$staff_id = $_GET['id'];

$staff_name = $_POST['name'];
$staff_phone = $_POST['phone'];
$staff_email = $_POST['email'];
$staff_password = $_POST['password'];

mysql_query("UPDATE staff SET 
	name = '$staff_name',
	phone = '$staff_phone',
	email = '$staff_email', 
	password = '$staff_password' WHERE id='$_GET[id]'");



header("Location: ../content.php?page=staff");

?>