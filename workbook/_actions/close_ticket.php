<?php

include('../_sql/connect.php');

$msg_id = $_GET['msgid'];

mysql_query("UPDATE messages SET 
	status = 'closed' WHERE id='$msg_id'");

header("Location: ../content.php?page=tickets&status=closed");

?>