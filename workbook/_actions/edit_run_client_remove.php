<?php

include('../_sql/connect.php');

$run_id = $_GET['runid'];

$target = $_GET['target'];
$client_id = $_GET['client_id'];

if ($target == "tank") {

mysql_query("UPDATE schedule SET 
	tank_id = '' WHERE id='$run_id'");
	
mysql_query("UPDATE buyerlist SET schedule_status = '' WHERE id = '$client_id'");

header("Location: ../content.php?page=view_run&id=$run_id");

}

if ($target == "healer") {

mysql_query("UPDATE schedule SET 
	healer_id = '' WHERE id='$run_id'");
	
mysql_query("UPDATE buyerlist SET schedule_status = '' WHERE id = '$client_id'");

header("Location: ../content.php?page=view_run&id=$run_id");

}

if ($target == "dps1") {

mysql_query("UPDATE schedule SET 
	dps1_id = '' WHERE id='$run_id'");
	
mysql_query("UPDATE buyerlist SET schedule_status = '' WHERE id = '$client_id'");

header("Location: ../content.php?page=view_run&id=$run_id");

}

if ($target == "dps2") {

mysql_query("UPDATE schedule SET 
	dps2_id = '' WHERE id='$run_id'");
	
mysql_query("UPDATE buyerlist SET schedule_status = '' WHERE id = '$client_id'");

header("Location: ../content.php?page=view_run&id=$run_id");

}

if ($target == "dps3") {

mysql_query("UPDATE schedule SET 
	dps3_id = '' WHERE id='$run_id'");
	
mysql_query("UPDATE buyerlist SET schedule_status = '' WHERE id = '$client_id'");

header("Location: ../content.php?page=view_run&id=$run_id");

}

?>