<?php

include('../_sql/connect.php');

$run_id = $_GET['id'];

$time_now = strtotime("now");

mysql_query("UPDATE schedule SET finalized = '$time_now' WHERE id = '$run_id'");
if ($_POST['tank_id']!=="") { mysql_query("UPDATE buyerlist SET run_status = 'complete' WHERE id = '$_POST[tank_id]'"); }
if ($_POST['healer_id']!=="") { mysql_query("UPDATE buyerlist SET run_status = 'complete' WHERE id = '$_POST[healer_id]'"); }
if ($_POST['dps1_id']!=="") { mysql_query("UPDATE buyerlist SET run_status = 'complete' WHERE id = '$_POST[dps1_id]'"); }
if ($_POST['dps2_id']!=="") { mysql_query("UPDATE buyerlist SET run_status = 'complete' WHERE id = '$_POST[dps2_id]'"); }
if ($_POST['dps3_id']!=="") { mysql_query("UPDATE buyerlist SET run_status = 'complete' WHERE id = '$_POST[dps3_id]'"); }

header("Location: ../content.php?page=view_run&id=".$run_id);

//bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )
//mail("4232375258@txt.att.net", "", "Run has been scheduled for *date*, your cut: $192.", "From: WoW Challenge Modes <no-reply@wowchallengemodes.com>\r\n");

?>