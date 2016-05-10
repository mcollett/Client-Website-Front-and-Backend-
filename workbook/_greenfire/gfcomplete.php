<?php

include('../_sql/connect.php');

mysql_query("UPDATE gf_buyerlist SET 
	run_status = 'complete' WHERE id='$_GET[id]'");

header("Location: ../content.php?page=greenfire");



?>