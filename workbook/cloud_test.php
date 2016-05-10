<?php
$username = "wowchall_wbk2usr";
$password = "wowcmpw1";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");

//select a database to work with
$selected = mysql_select_db("wowchall_wbk2",$dbhandle) 
  or die("Could not select workbook");
?>

<?php //$get_words = mysql_query("SELECT here_how FROM buyerlist WHERE here_how != ''");
//while ($cloud = mysql_fetch_array($get_words)) {
//$words = array_count_values(str_word_count($cloud['here_how'], 1));
//print_r($words);
//}
 ?>
 
 <?php
 
 $get_words = mysql_query("SELECT here_how FROM buyerlist WHERE here_how != ''");
 while ($cloud = mysql_fetch_array($get_words)) {
 $data = $cloud['here_how'];
 }
 
  $google_count = 0;
 $twitch_count = 0;
 
 if (strpos($data,'google') !== false) {
	$google_count++;
 }
 
 echo "Google count: ". $google_count;
 echo "<br>";


?>