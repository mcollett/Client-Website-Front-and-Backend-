<?php

include('../_sql/connect.php');

$buyerid = $_GET['buyerid'];
$runid = $_GET['runid'];

$get_data = mysql_query("SELECT id, schedule_status FROM buyerlist WHERE id = '$buyerid'");
while ($data = mysql_fetch_array($get_data)) {

	if ($data['schedule_status'] == "") {
	// change to 'confirmed'
	mysql_query("UPDATE buyerlist SET 
	schedule_status = 'confirmed' WHERE id='$buyerid'");
	}
	
	if ($data['schedule_status'] == "confirmed") {
	// change to ''
	mysql_query("UPDATE buyerlist SET 
	schedule_status = '' WHERE id='$buyerid'");
	}

}

header("Location: http://www.wowchallengemodes.com/workbook/content.php?page=view_run&id=".$runid);

?>