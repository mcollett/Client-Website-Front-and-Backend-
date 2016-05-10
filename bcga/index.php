<title>WCM Blizzcon Giveaway</title>
<style>
table { margin: 1em; border-collapse: collapse; }
td, th { padding: .3em; border: 1px #ccc solid; }
thead { background: #fc9; }
</style>
<?php 
include('../_sql/sqlcon.php');

$result = mysql_query("SELECT * FROM blizzcon_giveaway");


?>
<table width="75%" border="1">
	<tr style="background-color:#6BB0E6;">
		<td>Name</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Age</td>
		<td>City</td>
		<td>State</td>
		<td>ZIP</td>
		<td>Airport</td>
		<td>Why?</td>
	</tr>
<?php if (mysql_num_rows($result) == 0) { echo "<tr><td colspan='9'>No entries.</td></tr>"; } else { while ($ent = mysql_fetch_array($result)) { ?>
	<tr>
		<td><?php echo $ent['name']; ?></td>
		<td><?php echo $ent['email']; ?></td>
		<td><?php echo $ent['phone']; ?></td>
		<td><?php echo $ent['age']; ?></td>
		<td><?php echo $ent['city']; ?></td>
		<td><?php echo $ent['state']; ?></td>
		<td><?php echo $ent['zip']; ?></td>
		<td><?php echo $ent['airport']; ?></td>
		<td><?php echo $ent['why']; ?></td>
	</tr>
	<?php } } ?>
</table>