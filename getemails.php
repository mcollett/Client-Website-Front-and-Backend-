<?php

include('_sql/sqlcon.php');

$query = mysql_query("SELECT DISTINCT email FROM buyerlist WHERE email != ''");
while ($emails = mysql_fetch_array($query)) {

echo $emails['email'];
echo ",<br>";

}

?>