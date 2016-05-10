<?php

include('_sql/connect.php');

$stamp_sum = mysql_query("SELECT AVG(date_added) FROM buyerlist WHERE run_status != 'complete' AND date_added != '' ORDER BY date_added ASC");
$stamp_data = mysql_query("SELECT * FROM buyerlist WHERE run_status != 'complete' AND date_added != '' ORDER BY date_added ASC");
$stamp_total = mysql_num_rows($stamp_data);

//get timestamps
$get_timestamps = mysql_query("SELECT date_added FROM buyerlist WHERE run_status != 'complete' AND date_added != ''");

$sum = mysql_fetch_array($stamp_sum);

$now = strtotime("now");
$average = ($now - $sum[0]);
$days = ($average / 86400);

echo "We currently have <u>". $stamp_total ."</u> active clients across all regions.<br><br> "; 
echo "The current <i>average</i> wait time is: <b>"; echo round($days,2); echo " days</b>.<br>";
echo "<font style='font-size:12px;'>This approximation is dynamic and accurate, but is likely inflated due to requests from clients for a later time that does not conflict with their raiding or PvP schedules.</font>";

?>

<br><br>
<b>Ways to reduce your wait time.</b>
<ul>
	<li><b>Complete all of your heroic dungeons!</b>
</ul>
This is the #1 delay in completing your order. While the Timeless Isle (and other means) have rendered heroic dungeons virtually useless. These are still requirements to enter a dungeon on challenge mode difficulty. It's also important to note that these achievements ARE NOT SHARED and are CHARACTER SPECIFIC. If you have yet to complete a heroic on your desired character, you will need to complete it ON THAT SPECIFIC CHARACTER.
<ul>
	<li>Get in contact with us ASAP after payment.</li>
</ul>
We currently have a three-man customer support staff which usually means all hours of the day are covered. However, there are times where we are busy. If you don't hear from us, be proactive and message us. The best way to reach us is via Skype @ wowchallengemodes -- e-mails may require a few days to be responded to.