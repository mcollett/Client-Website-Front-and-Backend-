<?php

include('../_sql/connect.php');

$app_id = $_GET['id'];

mysql_query("DELETE FROM gf_buyerlist WHERE id = '$app_id'");

header("Location: ../content.php?page=greenfire");

?>