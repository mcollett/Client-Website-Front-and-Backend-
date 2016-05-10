<?php

include('../_sql/connect.php');

$query = mysql_query("SELECT * FROM buyerlist");
while ($data = mysql_fetch_array($query)) {

if ($data['date_added'] !== "0") {

echo array_count_values($data['date_added'], "December 2013");

//echo date("F Y", $data['date_added']) . "<br>";

}

}

?>