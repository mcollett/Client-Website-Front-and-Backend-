<?php

include('../_sql/connect.php');

$code_id = $_GET['id'];

mysql_query("DELETE FROM coupons WHERE id = '$code_id'");

header("Location: ../content.php?page=discounts");

?>