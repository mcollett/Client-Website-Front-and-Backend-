<?php

include('../_sql/connect.php');

$review_id = $_GET['review_id'];

if ($_GET['status'] == "approve") {

mysql_query("UPDATE reviews SET 
	approval = 'approved' WHERE id='$review_id'");

header("Location: ../content.php?page=reviews");

}

if ($_GET['status'] == "reject") {

mysql_query("UPDATE reviews SET 
	approval = 'rejected' WHERE id='$review_id'");

header("Location: ../content.php?page=reviews");

}


?>