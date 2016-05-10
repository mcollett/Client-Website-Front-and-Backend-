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