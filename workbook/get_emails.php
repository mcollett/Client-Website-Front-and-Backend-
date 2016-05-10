<?php include('_sql/connect.php'); ?>
<?php

$query = mysql_query("SELECT email FROM buyerlist WHERE run_status = 'complete'");
while ($buyer_emails = mysql_fetch_array($query)) {

echo $buyer_emails['email'];
echo "<br>";

}

?>