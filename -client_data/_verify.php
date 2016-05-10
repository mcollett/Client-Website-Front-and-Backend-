<?php include('../_sql/sqlcon.php'); session_start();
$connectkey = $_POST['transID'];
?>
<?php $get_data = mysql_query("SELECT connectkey FROM buyerlist WHERE connectkey = '$connectkey'"); 

if (mysql_num_rows($get_data) > 0) { $_SESSION['transID'] = mysql_result($get_data,0); header('Location: ../client'); }
if (mysql_num_rows($get_data) == 0) { header('Location: ../client'); }

?>