<?php

include('../_sql/connect.php');

$client_id = $_GET['id'];

mysql_query("DELETE FROM buyerlist WHERE id = '$client_id'");

header("Location: ../content.php?page=active_clients");

?>