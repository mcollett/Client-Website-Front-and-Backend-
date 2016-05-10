<?php include('../_sql/connect.php'); ?>
<?php

function characterClass($classType) {
	if ($classType == "Death Knight") { return "#C41F3B"; }
	if ($classType == "Druid") { return "#FF7D0A"; }
	if ($classType == "Hunter") { return "#ABD473"; }
	if ($classType == "Mage") { return "#69CCF0"; }
	if ($classType == "Monk") { return "#67EBA7"; }
	if ($classType == "Paladin") { return "F58CBA"; }
	if ($classType == "Priest") { return "black"; }
	if ($classType == "Rogue") { return "#CBC51B"; }
	if ($classType == "Shaman") { return "#0070DE"; }
	if ($classType == "Warlock") { return "#9482C9"; }
	if ($classType == "Warrior") { return "#C79C6E"; }
}

if (isset($_POST['tank']) === true && empty($_POST['tank']) === false) {

	$query = mysql_query("SELECT id, character_name, character_class FROM buyerlist WHERE id='" . $_POST['tank'] . "'");
	while ($get_user = mysql_fetch_array($query)) {
		echo $get_user['character_name'];
	}

}

if (isset($_POST['healer']) === true && empty($_POST['healer']) === false) {

	$query = mysql_query("SELECT id, character_name, character_class FROM buyerlist WHERE id='" . $_POST['healer'] . "'");
	while ($get_user = mysql_fetch_array($query)) {
		echo $get_user['character_name'];
	}
	
}

if (isset($_POST['dps1']) === true && empty($_POST['dps1']) === false) {

	$query = mysql_query("SELECT id, character_name, character_class FROM buyerlist WHERE id='" . $_POST['dps1'] . "'");
	while ($get_user = mysql_fetch_array($query)) {
		echo $get_user['character_name'];
	}
	
}

if (isset($_POST['dps2']) === true && empty($_POST['dps2']) === false) {

	$query = mysql_query("SELECT id, character_name, character_class FROM buyerlist WHERE id='" . $_POST['dps2'] . "'");
	while ($get_user = mysql_fetch_array($query)) {
		echo $get_user['character_name'];
	}
	
}

if (isset($_POST['dps3']) === true && empty($_POST['dps3']) === false) {

	$query = mysql_query("SELECT id, character_name, character_class FROM buyerlist WHERE id='" . $_POST['dps3'] . "'");
	while ($get_user = mysql_fetch_array($query)) {
		echo $get_user['character_name'];
	}
	
}

?>