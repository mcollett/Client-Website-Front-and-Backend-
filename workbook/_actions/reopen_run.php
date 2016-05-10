<?php

include('../_sql/connect.php');

$run_id = $_GET['id'];

mysql_query("UPDATE schedule SET finalized = '' WHERE id = '$run_id'");
if ($_POST['tank_id']!=="") { mysql_query("UPDATE buyerlist SET run_status = 'incomplete' WHERE id = '$_POST[tank_id]'"); }
if ($_POST['healer_id']!=="") { mysql_query("UPDATE buyerlist SET run_status = 'incomplete' WHERE id = '$_POST[healer_id]'"); }
if ($_POST['dps1_id']!=="") { mysql_query("UPDATE buyerlist SET run_status = 'incomplete' WHERE id = '$_POST[dps1_id]'"); }
if ($_POST['dps2_id']!=="") { mysql_query("UPDATE buyerlist SET run_status = 'incomplete' WHERE id = '$_POST[dps2_id]'"); }
if ($_POST['dps3_id']!=="") { mysql_query("UPDATE buyerlist SET run_status = 'incomplete' WHERE id = '$_POST[dps3_id]'"); }

header("Location: ../content.php?page=view_run&id=".$run_id);

?>