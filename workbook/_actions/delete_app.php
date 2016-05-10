<?php

include('../_sql/connect.php');

$app_id = $_GET['id'];

mysql_query("DELETE FROM applicants WHERE id = '$app_id'");

header("Location: ../content.php?page=applicants");

?>