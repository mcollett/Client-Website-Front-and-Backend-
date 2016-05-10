<?php

include('../_sql/connect.php');

$staff_id = $_GET['id'];

mysql_query("DELETE FROM staff WHERE id = '$staff_id'");

header("Location: ../content.php?page=staff");

?>