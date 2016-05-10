<?php include('../_sql/connect.php'); ?>
<h1>RAF User Data</h1>

<?php

	$total_payment = 0;

	if ($_GET['month']==NULL) { $raf_month = date("F"); } else { $raf_month = $_GET['month']; }
	
	?>
	
	<?php 
	
	$get_raf_user = mysql_query("SELECT * FROM raf_users WHERE id = '$_GET[raf_user]'");
	while ($raf_user = mysql_fetch_array($get_raf_user)) {
	
	$raf_user_name = $raf_user['name'];
	
	echo "<h2>Buyers referred by $raf_user_name using code <u>$raf_user[rafcode]</u>.</h2>";
	
	}
	
	?>
	
<table width="80%" align="center">
	<tr>
		<th align="center">ID</th>
		<th align="center">GeoFac</th>
		<th>Name</th>
		<th>Character Name</th>
		<th align="center">Payment</th>
		<th align="center">?</th>
		<th align="center">Type</th>
		<th>Realm</th>
		<th>Skype Username (Display Name)</th>
		<th>Phone</th>
		<th>E-Mail</th>
	</tr>
	
	<?php
	
	$get_raf_results = mysql_query("SELECT * FROM buyerlist WHERE rafcode = '$_GET[raf_code]' AND (date_added BETWEEN $_GET[target_start] AND $_GET[target_end]) ORDER BY id DESC");
	$num_rafresults = mysql_num_rows($get_raf_results);
	while ($raf_results = mysql_fetch_array($get_raf_results)) {
	
	
	
	?>
	<?php if ($raf_results['character_class'] == "Death Knight") { $class_color = "#C41F3B"; } ?>
	<?php if ($raf_results['character_class'] == "Druid") { $class_color = "#FF7D0A"; } ?>
	<?php if ($raf_results['character_class'] == "Hunter") { $class_color = "#ABD473"; } ?>
	<?php if ($raf_results['character_class'] == "Mage") { $class_color = "#69CCF0"; } ?>
	<?php if ($raf_results['character_class'] == "Monk") { $class_color = "#67EBA7"; } ?>
	<?php if ($raf_results['character_class'] == "Paladin") { $class_color = "#F58CBA"; } ?>
	<?php if ($raf_results['character_class'] == "Priest") { $class_color = "black"; } ?>
	<?php if ($raf_results['character_class'] == "Rogue") { $class_color = "#CBC51B"; } ?>
	<?php if ($raf_results['character_class'] == "Shaman") { $class_color = "#0070DE"; } ?>
	<?php if ($raf_results['character_class'] == "Warlock") { $class_color = "#9482C9"; } ?>
	<?php if ($raf_results['character_class'] == "Warrior") { $class_color = "#C79C6E"; } ?>
	
	<tr>
		<td align="center"><?php echo $raf_results['id']; ?></td>
		<td align="center" style="background-color:<?php if ($raf_results['faction']=="Alliance") { echo "#C0F2EF"; } if ($raf_results['faction']=="Horde") { echo "#FFE4E4"; } ?>;"><?php echo $raf_results['geography']; ?></td>
		<td><?php echo $raf_results['buyer_name']; ?></td>
		<td><font color="<?php echo $class_color; ?>"><?php echo $raf_results['character_name']; ?></font> (<?php echo $raf_results['character_spec']; ?>)</td>
		<td><?php echo $raf_results['payment_amount']; ?> <?php echo $raf_results['payment_type']; ?></td>
		<td><?php if ($raf_results['payment_status']=="paid") { echo "<img src='http://www.wowchallengemodes.com/wbk2/images/accept.png'>"; } if ($raf_results['payment_status']=="unpaid") { echo "<img src='http://www.wowchallengemodes.com/wbk2/images/exclamation.png'>"; } if ($raf_results['payment_status']=="unsure") { echo "<img src='http://www.wowchallengemodes.com/wbk2/images/help.png'>"; } ?></td>
		<td><?php if ($raf_results['playtype']=="selfplay") { echo "Self"; } if ($raf_results['playtype']=="pilot") { echo "Pilot"; } ?></td>
		<td><?php echo $raf_results['character_realm']; ?></td>
		<td><?php echo $raf_results['skype_username']; ?> (<?php echo $raf_results['skype_display_name']; ?>)</td>
		<td><?php echo $raf_results['phone']; ?></td>
		<td><?php echo $raf_results['email']; ?></td>
	</tr>
	
	<?php
	$total_payment += $raf_results['payment_amount'];
	}
	
	?>
	
</table><br><br>

<b><?php echo $raf_user_name; ?></b> has given us <u>$<?php echo number_format($total_payment, 2); ?> USD</u> worth of sales.