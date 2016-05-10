<?php if ($_GET['id']==NULL) {
	echo "You need a run to view, bro.";
} else {
	
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past

	function classColor($var) {
    if ($var == "Death Knight") { echo "#C41F3B"; }
    if ($var == "Druid") { echo "#FF7D0A"; }
    if ($var == "Hunter") { echo "#ABD473"; }
    if ($var == "Mage") { echo "#69CCF0"; }
    if ($var == "Monk") { echo "#67EBA7"; }
    if ($var == "Paladin") { echo "#F58CBA"; }
    if ($var == "Priest") { echo "#000000"; }
    if ($var == "Rogue") { echo "#CBC51B"; }
    if ($var == "Shaman") { echo "#0070DE"; }
    if ($var == "Warlock") { echo "#9482C9"; }
    if ($var == "Warrior") { echo "#C79C6E"; }
	}

	function getStaffName($var) {
		$result = mysql_query("SELECT name FROM staff WHERE id='$var'");
		if (mysql_result($result,0) == NULL) { echo "<i>Account Owner</i>"; } else { echo mysql_result($result,0); }
	}

	function getStaffDues($var) {
		$result = mysql_query("SELECT payout FROM staff WHERE id='$var'");
		echo mysql_result($result,0);
	}

	function getStaffRank($var) {
		$result = mysql_query("SELECT position FROM staff WHERE id='$var'");
		return mysql_result($result,0);
	}
	
	function getClientPackage($var) {
		$result = mysql_query("SELECT playtype FROM buyerlist WHERE id='$var'");
		$play_type = mysql_result($result,0);
		if ($play_type == "pilot") { echo "Pilot"; }
		if ($play_type == "selfplay") { echo "<b>Self</b>"; }
		if ($play_type == NULL) { echo "<i>Staff</i>"; }
	}

	function getClientName($var) {
		$result = mysql_query("SELECT character_name FROM buyerlist WHERE id='$var'");
		if (mysql_result($result,0) == NULL) { echo "<i>Staff Account</i>"; } else { echo mysql_result($result,0); }
	}

	function getClientClass($var) {
		$result = mysql_query("SELECT character_class FROM buyerlist WHERE id='$var'");
		if (mysql_result($result,0) == NULL) {  } else { return mysql_result($result,0); }
	}

	function getClientSpec($var) {
		$result = mysql_query("SELECT character_spec FROM buyerlist WHERE id='$var'");
		if (mysql_result($result,0) == NULL) { echo "N/A"; } else { echo mysql_result($result,0); }
	}

	function getClientPayment($var) {
		$result = mysql_query("SELECT payment_amount FROM buyerlist WHERE id='$var'");
		if (mysql_result($result,0) == NULL) { echo "--"; } else { echo mysql_result($result,0); }
	}

    function getClientRealm($var) {
        $result = mysql_query("SELECT character_realm FROM buyerlist WHERE id='$var'");
        if (mysql_result($result,0) == NULL) { echo ""; } else { echo strtolower(mysql_result($result,0)); }
    }

    function getClientRegion($var) {
        $result = mysql_query("SELECT geography FROM buyerlist WHERE id='$var'");
        if (mysql_result($result,0) == NULL) { echo ""; } else { echo strtolower(mysql_result($result,0)); }
    }

    function getClientArmory($var) {
        $get_armory_data = mysql_query("SELECT geography, character_realm, character_name FROM buyerlist WHERE id='$var'");
        if (mysql_num_rows($get_armory_data) == 0) { echo ""; } else { 
            while ($armory_data = mysql_fetch_array($get_armory_data)) {
            echo "<a href='http://" . strtolower($armory_data['geography']) . ".battle.net/wow/en/character/" . strtolower($armory_data['character_realm']) . "/" . $armory_data['character_name'] . "/advanced' target='_blank'><img width='16px' height='16px' src='img/wow.png'></a>";
             }
        }
    }

    function getClientSkype($var) {
        $get_skype_data = mysql_query("SELECT skype_username, skype_display_name FROM buyerlist WHERE id ='$var'");
        if (mysql_num_rows($get_skype_data) == 0) { echo ""; } else {
            while ($skype_data = mysql_fetch_array($get_skype_data)) {
            echo '<a href="skype:'.$skype_data['skype_username'].'?chat" data-toggle="tooltip" data-placement="top" title="'.$skype_data['skype_display_name'].' ('.$skype_data['skype_username'].')"><i class="icon-skype"></i></a>';
            }
        }   
    }
	
	function getScheduleStatus($var) {
		$result = mysql_query("SELECT schedule_status FROM buyerlist WHERE id='$var'");
		if (mysql_result($result,0) == NULL) { echo '<i class="glyphicon-thumbs_down" style="color:#FF0000;"></i>'; } else { echo '<i class="glyphicon-thumbs_up" style="color:#259237;"></i>'; }
	}

}

?>

<?php

$get_test = mysql_query("SELECT tank_id, healer_id, dps1_id, dps2_id, dps3_id FROM schedule WHERE id='$_GET[id]'");
while ($test = mysql_fetch_array($get_test)) {
	$money_test = $test;
}

$get_staff_array = mysql_query("SELECT staff_tank_id, staff_healer_id, staff_dps1_id, staff_dps2_id, staff_dps3_id FROM schedule WHERE id='$_GET[id]'");
while ($staff_array = mysql_fetch_array($get_staff_array)) {
	$staff_list = $staff_array;
}

$founder_staff = mysql_num_rows(mysql_query("SELECT id FROM staff WHERE position = 'Founder' AND id IN('".implode("', '", $staff_list)."')"));
$contractor_staff = mysql_num_rows(mysql_query("SELECT id FROM staff WHERE position = 'Contractor' AND id IN('".implode("', '", $staff_list)."')"));

$get_money = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE id IN('".implode("', '", $money_test)."')");

	$run_value = mysql_result($get_money, 0);


?>

<?php $get_run_time = mysql_query("SELECT timestamp FROM schedule WHERE id='$_GET[id]'");
$check_finalized = mysql_query("SELECT finalized FROM schedule WHERE id='$_GET[id]'");
$is_finalized = mysql_result($check_finalized,0);
$run_time = mysql_result($get_run_time,0); $time_now = strtotime("now");

$get_deets = mysql_query("SELECT region, faction FROM schedule WHERE id='$_GET[id]'");
while ($deets = mysql_fetch_array($get_deets)) { $deet_region = $deets['region']; $deet_faction = $deets['faction']; } ?>

<?php if ($is_finalized == "") { ?>
<?php if ($run_time > $time_now) { ?>
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Scheduled for: <strong><?php echo date("l, F jS - h:i A", $run_time); ?> PST</strong></h4> This run has been scheduled, but has yet to be completed. Finalize this run when complete and payments sent.
</div>
<?php } ?>
<?php if ($run_time < $time_now) { ?>
<div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Run time passed! For <strong><?php echo date("l, F jS - h:i A", $run_time); ?> PST</strong></h4> Ignore this message if the run has been delayed. If not, make sure to finalize!
</div>
<?php } ?>
<?php } ?>
<h3 class="sub-header"><?php echo date("l, F jS - h:i A", $run_time); ?> PST <a href="content.php?page=edit_run&action=edit_time&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini"><i class="icon-pencil"></i></a></h3>
<!-- With Borders Style -->
<h4 class="page-header"><?php echo $deet_region; ?>-<?php echo $deet_faction; ?><br> <small>Run Information and Group Composition</small></h4>

                <!-- With Borders Section -->
                <div class="block-section">
                    <table class="table table-bordered" width="50%">
                        <thead>
                            <tr>
								<th width="16px"></th>
								<th width="16px"></th>
								<th width="16px"></th>
                                <th>Client</th>
                                <th width="75px">Paid</th>
								<th width="75px">Type</th>
								<th width="16px"></th>
                                <th width="225px">Played By</th>

                            </tr>
                        </thead>
                        <tbody>
                        	<?php $get_run_details = mysql_query("SELECT * FROM schedule WHERE id='$_GET[id]'");
							while ($run_details = mysql_fetch_array($get_run_details)) {
							?>
                            <tr><?php $tank_class = getClientClass($run_details['tank_id']); ?>
								<td><?php if ($run_details['tank_id'] !== "") { ?><a href="content.php?page=client_reach&client_id=<?php echo $run_details['tank_id']; ?>" class="btn btn-mini btn-primary"><i class="glyphicon-chat"></i></a><?php } ?></td>
								<td><?php if ($run_details['tank_id'] !== "") { ?><a onclick="return confirm('Are you sure you want to unschedule this client?');" href="_actions/edit_run_client_remove.php?runid=<?php echo $_GET['id']; ?>&target=tank&client_id=<?php echo $run_details['tank_id']; ?>" class="btn btn-mini btn-danger"><i class="glyphicon-remove_2"></i></a><?php } else { ?><a href="content.php?page=edit_run&action=add_client&target=tank&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini btn-success"><i class="glyphicon-plus"></i></a><?php } ?></td>
								<td><?php if ($run_details['tank_id'] !== "") { ?> <a href="_actions/confirm_time.php?buyerid=<?php echo $run_details['tank_id']; ?>&runid=<?php echo $_GET['id']; ?>"><?php getScheduleStatus($run_details['tank_id']); ?></a> <?php } else { echo '<i class="glyphicon-group"></i>'; } ?></td>
                                <td><b>Tank</b>: <?php getClientArmory($run_details['tank_id']); ?> <?php getClientSkype($run_details['tank_id']); ?> <font color="<?php classColor($tank_class); ?>"><?php getClientName($run_details['tank_id']); ?></font> <font size="-3">(<?php getClientSpec($run_details['tank_id']); ?> <?php echo $tank_class; ?>)</font></td>
                                <td>$<?php getClientPayment($run_details['tank_id']); ?></td>
								<td><?php getClientPackage($run_details['tank_id']); ?></td>
								<td><a href="content.php?page=edit_run&action=edit_staff&target=tank&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini"><i class="icon-pencil"></i></a></td>
                                <td><?php if ($run_details['staff_tank_id'] == "") { echo "<b>VACANT</b>"; } else { getStaffName($run_details['staff_tank_id']); } ?></td>
                            </tr>
                            <tr><?php $healer_class = getClientClass($run_details['healer_id']); ?>
								<td><?php if ($run_details['healer_id'] !== "") { ?><a href="content.php?page=client_reach&client_id=<?php echo $run_details['healer_id']; ?>" class="btn btn-mini btn-primary"><i class="glyphicon-chat"></i></a><?php } ?></td>
								<td><?php if ($run_details['healer_id'] !== "") { ?><a onclick="return confirm('Are you sure you want to unschedule this client?');" href="_actions/edit_run_client_remove.php?runid=<?php echo $_GET['id']; ?>&target=healer&client_id=<?php echo $run_details['healer_id']; ?>" class="btn btn-mini btn-danger"><i class="glyphicon-remove_2"></i></a><?php } else { ?><a href="content.php?page=edit_run&action=add_client&target=healer&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini btn-success"><i class="glyphicon-plus"></i></a><?php } ?></td>
                                <td><?php if ($run_details['healer_id'] !== "") { ?> <a href="_actions/confirm_time.php?buyerid=<?php echo $run_details['healer_id']; ?>&runid=<?php echo $_GET['id']; ?>"><?php getScheduleStatus($run_details['healer_id']); ?></a> <?php } else { echo '<i class="glyphicon-group"></i>'; } ?></td>
								<td><b>Healer</b>: <?php getClientArmory($run_details['healer_id']); ?> <?php getClientSkype($run_details['healer_id']); ?> <font color="<?php classColor($healer_class); ?>"><?php getClientName($run_details['healer_id']); ?></font> <font size="-3">(<?php getClientSpec($run_details['healer_id']); ?> <?php echo $healer_class; ?>)</font></td>
                                <td>$<?php getClientPayment($run_details['healer_id']); ?></td>
								<td><?php getClientPackage($run_details['healer_id']); ?></td>
								<td><a href="content.php?page=edit_run&action=edit_staff&target=healer&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini"><i class="icon-pencil"></i></a></td>
                                <td><?php if ($run_details['staff_healer_id'] == "") { echo "<b>VACANT</b>"; } else { getStaffName($run_details['staff_healer_id']); } ?></td>
                            </tr>
                            <tr><?php $dps1_class = getClientClass($run_details['dps1_id']); ?>
								<td><?php if ($run_details['dps1_id'] !== "") { ?><a href="content.php?page=client_reach&client_id=<?php echo $run_details['dps1_id']; ?>" class="btn btn-mini btn-primary"><i class="glyphicon-chat"></i></a><?php } ?></td>
								<td><?php if ($run_details['dps1_id'] !== "") { ?><a onclick="return confirm('Are you sure you want to unschedule this client?');" href="_actions/edit_run_client_remove.php?runid=<?php echo $_GET['id']; ?>&target=dps1&client_id=<?php echo $run_details['dps1_id']; ?>" class="btn btn-mini btn-danger"><i class="glyphicon-remove_2"></i></a><?php } else { ?><a href="content.php?page=edit_run&action=add_client&target=dps1&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini btn-success"><i class="glyphicon-plus"></i></a><?php } ?></td>
                                <td><?php if ($run_details['dps1_id'] !== "") { ?> <a href="_actions/confirm_time.php?buyerid=<?php echo $run_details['dps1_id']; ?>&runid=<?php echo $_GET['id']; ?>"><?php getScheduleStatus($run_details['dps1_id']); ?></a> <?php } else { echo '<i class="glyphicon-group"></i>'; } ?></td>
								<td><b>DPS 1</b>: <?php getClientArmory($run_details['dps1_id']); ?> <?php getClientSkype($run_details['dps1_id']); ?> <font color="<?php classColor($dps1_class); ?>"><?php getClientName($run_details['dps1_id']); ?></font> <font size="-3">(<?php getClientSpec($run_details['dps1_id']); ?> <?php echo $dps1_class; ?>)</font></td>
                                <td>$<?php getClientPayment($run_details['dps1_id']); ?></td>
								<td><?php getClientPackage($run_details['dps1_id']); ?></td>
								<td><a href="content.php?page=edit_run&action=edit_staff&target=dps1&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini"><i class="icon-pencil"></i></a></td>
                                <td><?php if ($run_details['staff_dps1_id'] == "") { echo "<b>VACANT</b>"; } else { getStaffName($run_details['staff_dps1_id']); } ?></td>
                            </tr>
                            <tr><?php $dps2_class = getClientClass($run_details['dps2_id']); ?>
								<td><?php if ($run_details['dps2_id'] !== "") { ?><a href="content.php?page=client_reach&client_id=<?php echo $run_details['dps2_id']; ?>" class="btn btn-mini btn-primary"><i class="glyphicon-chat"></i></a><?php } ?></td>
								<td><?php if ($run_details['dps2_id'] !== "") { ?><a onclick="return confirm('Are you sure you want to unschedule this client?');" href="_actions/edit_run_client_remove.php?runid=<?php echo $_GET['id']; ?>&target=dps2&client_id=<?php echo $run_details['dps2_id']; ?>" class="btn btn-mini btn-danger"><i class="glyphicon-remove_2"></i></a><?php } else { ?><a href="content.php?page=edit_run&action=add_client&target=dps2&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini btn-success"><i class="glyphicon-plus"></i></a><?php } ?></td>
                                <td><?php if ($run_details['dps2_id'] !== "") { ?> <a href="_actions/confirm_time.php?buyerid=<?php echo $run_details['dps2_id']; ?>&runid=<?php echo $_GET['id']; ?>"><?php getScheduleStatus($run_details['dps2_id']); ?></a> <?php } else { echo '<i class="glyphicon-group"></i>'; } ?></td>
								<td><b>DPS 2</b>: <?php getClientArmory($run_details['dps2_id']); ?> <?php getClientSkype($run_details['dps2_id']); ?> <font color="<?php classColor($dps2_class); ?>"><?php getClientName($run_details['dps2_id']); ?></font> <font size="-3">(<?php getClientSpec($run_details['dps2_id']); ?> <?php echo $dps2_class; ?>)</font></td>
                                <td>$<?php getClientPayment($run_details['dps2_id']); ?></td>
								<td><?php getClientPackage($run_details['dps2_id']); ?></td>
								<td><a href="content.php?page=edit_run&action=edit_staff&target=dps2&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini"><i class="icon-pencil"></i></a></td>
                                <td><?php if ($run_details['staff_dps2_id'] == "") { echo "<b>VACANT</b>"; } else { getStaffName($run_details['staff_dps2_id']); } ?></td>
                            </tr>
                            <tr><?php $dps3_class = getClientClass($run_details['dps3_id']); ?>
								<td><?php if ($run_details['dps3_id'] !== "") { ?><a href="content.php?page=client_reach&client_id=<?php echo $run_details['dps3_id']; ?>" class="btn btn-mini btn-primary"><i class="glyphicon-chat"></i></a><?php } ?></td>
								<td><?php if ($run_details['dps3_id'] !== "") { ?><a onclick="return confirm('Are you sure you want to unschedule this client?');" href="_actions/edit_run_client_remove.php?runid=<?php echo $_GET['id']; ?>&target=dps3&client_id=<?php echo $run_details['dps3_id']; ?>" class="btn btn-mini btn-danger"><i class="glyphicon-remove_2"></i></a><?php } else { ?><a href="content.php?page=edit_run&action=add_client&target=dps3&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini btn-success"><i class="glyphicon-plus"></i></a><?php } ?></td>
                                <td><?php if ($run_details['dps3_id'] !== "") { ?> <a href="_actions/confirm_time.php?buyerid=<?php echo $run_details['dps3_id']; ?>&runid=<?php echo $_GET['id']; ?>"><?php getScheduleStatus($run_details['dps3_id']); ?></a> <?php } else { echo '<i class="glyphicon-group"></i>'; } ?></td>
								<td><b>DPS 3</b>: <?php getClientArmory($run_details['dps3_id']); ?> <?php getClientSkype($run_details['dps3_id']); ?> <font color="<?php classColor($dps3_class); ?>"><?php getClientName($run_details['dps3_id']); ?></font> <font size="-3">(<?php getClientSpec($run_details['dps3_id']); ?> <?php echo $dps3_class; ?>)</font></td>
                                <td>$<?php getClientPayment($run_details['dps3_id']); ?></td>
								<td><?php getClientPackage($run_details['dps3_id']); ?></td>
								<td><a href="content.php?page=edit_run&action=edit_staff&target=dps3&runid=<?php echo $_GET['id']; ?>" class="btn btn-mini"><i class="icon-pencil"></i></a></td>
                                <td><?php if ($run_details['staff_dps3_id'] == "") { echo "<b>VACANT</b>"; } else { getStaffName($run_details['staff_dps3_id']); } ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END With Borders Section -->
                <!-- END With Borders Style -->

                <h4 class="page-header">Run Value <small>$<?php echo round($run_value, 2); ?></small></h4>
<?php $founder_net = ($run_value - (50 * $contractor_staff)); $founder_amount = ($founder_net / $founder_staff); ?>
<?php $director_amount = (($run_value - 50 * $contractor_staff) / 3); ?>
<!-- With Borders Section -->
                <div class="block-section">
                    <table class="table table-bordered" width="50%">
                        <thead>
                            <tr>
                                <th style="width:30%;">Directors</th>
                                <th>Earned</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Matt</td>
                                <td><?php echo "$" . round($director_amount, 2); ?></td>
                            </tr>
							<tr>
                                <td>James</td>
                                <td><?php echo "$" . round($director_amount, 2); ?></td>
                            </tr>
							<tr>
                                <td>Stephen</td>
                                <td><?php echo "$" . round($director_amount, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
				<div class="block-section">
                    <table class="table table-bordered" width="50%">
                        <thead>
                            <tr>
                                <th style="width:30%;">Contractors</th>
                                <th>Earned</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $get_staff_from_run = mysql_query("SELECT * FROM staff WHERE position = 'Contractor' AND id IN('".implode("', '", $staff_list)."')");
							while ($staff_from_run = mysql_fetch_array($get_staff_from_run)) {
							?>
                            <tr>
                                <td><?php echo $staff_from_run['name']; ?></td>
                                <td><?php echo "$50"; ?></td>
                            </tr>
                            <?php } ?>
							<?php if (mysql_num_rows($get_staff_from_run) == 0) { ?> <tr><td colspan="2">No contractors present for this run.</td></tr> <?php } ?>
                        </tbody>
                    </table>
                </div>
				<div class="block-section">
                    <table class="table table-bordered" width="50%">
                        <thead>
                            <tr>
                                <th style="width:30%;">Contractor Sign Ups</th>
                                <th>Desired Class(es)</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $get_signups = mysql_query("SELECT * FROM staff_signups WHERE runid = '$_GET[id]'");
							while ($signups = mysql_fetch_array($get_signups)) {
							?>
                            <tr>
                                <td><?php getStaffName($signups['staffid']); ?></td>
                                <td><?php echo $signups['notes']; ?></td>
                            </tr>
                            <?php } ?>
							<?php if (mysql_num_rows($get_signups) == 0) { ?> <tr><td colspan="2">No contractors currently signed up.</td></tr> <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END With Borders Section -->
                <!-- END With Borders Style -->
                <table>
                    <tr>
                <?php if ($is_finalized == "") { ?><td><form name="finalize" action="_actions/finalize_run.php?id=<?php echo $_GET['id']; ?>" method="post">
                <?php
                $get_buyer_ids = mysql_query("SELECT tank_id, healer_id, dps1_id, dps2_id, dps3_id FROM schedule WHERE id='$_GET[id]'");
                while ($buyer_ids = mysql_fetch_array($get_buyer_ids)) {
                    ?> <input type="hidden" name="tank_id" value="<?php echo $buyer_ids['tank_id']; ?>">
                        <input type="hidden" name="healer_id" value="<?php echo $buyer_ids['healer_id']; ?>">
                        <input type="hidden" name="dps1_id" value="<?php echo $buyer_ids['dps1_id']; ?>">
                        <input type="hidden" name="dps2_id" value="<?php echo $buyer_ids['dps2_id']; ?>">
                        <input type="hidden" name="dps3_id" value="<?php echo $buyer_ids['dps3_id']; ?>"> <?php
                }
                ?>
                <button name="finalize" type="submit" class="btn btn-success"><i class="glyphicon-ok_2"></i> Finalize</button>
            </form></td><?php } ?>
                <?php if ($is_finalized !== "") { ?><td><form name="reopen" action="_actions/reopen_run.php?id=<?php echo $_GET['id']; ?>" method="post">
                <?php
                $get_buyer_ids = mysql_query("SELECT tank_id, healer_id, dps1_id, dps2_id, dps3_id FROM schedule WHERE id='$_GET[id]'");
                while ($buyer_ids = mysql_fetch_array($get_buyer_ids)) {
                    ?> <input type="hidden" name="tank_id" value="<?php echo $buyer_ids['tank_id']; ?>">
                        <input type="hidden" name="healer_id" value="<?php echo $buyer_ids['healer_id']; ?>">
                        <input type="hidden" name="dps1_id" value="<?php echo $buyer_ids['dps1_id']; ?>">
                        <input type="hidden" name="dps2_id" value="<?php echo $buyer_ids['dps2_id']; ?>">
                        <input type="hidden" name="dps3_id" value="<?php echo $buyer_ids['dps3_id']; ?>"> <?php
                }
                ?>
                <button name="unfinalize" type="submit" class="btn btn-warning"><i class="glyphicon-unshare"></i> Unfinalize</button></form></td><?php } ?>
                <!--<td><form name="notify" action="_actions/send_run_notification.php?id=<?php echo $_GET['id']; ?>" method="post"><button name="send_notifications" type="submit" class="btn btn-primary"><i class="glyphicon-envelope"></i><i class="glyphicon-iphone"></i> Send Notifications</button></form></td>-->
                <?php if ($is_finalized == "") { ?><td><form name="delete" action="_actions/delete_run.php?id=<?php echo $_GET['id']; ?>" method="post"><button onclick="return confirm('Are you sure you want to remove this run permanently?');" name="delete_run" type="submit" class="btn btn-danger"><i class="glyphicon-remove_2"></i> Delete</button></form></td><?php } ?>
            </tr>
        </table>
            	