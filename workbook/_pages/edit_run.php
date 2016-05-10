<?php
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
function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;
 
    if ($etime < 1)
    {
        return '0 seconds';
    }
 
    $a = array( 12 * 30 * 24 * 60 * 60  =>  'yr',
                30 * 24 * 60 * 60       =>  'mnth',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hr',
                60                      =>  'min',
                1                       =>  'sec'
                );
 
    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . '';
        }
    }
}
setlocale(LC_MONETARY, 'en_US');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<?php if ($_GET['action'] == "add_client") { ?>
<?php
if ($_GET['target'] == "tank") { $welcome_message = "You're adding the tank client position."; $specs = array('Blood', 'Brewmaster', 'Feral (Tank)', 'Protection'); }
if ($_GET['target'] == "healer") { $welcome_message = "You're adding the healer client position."; $specs = array('Restoration', 'Mistweaver', 'Holy', 'Discipline'); }
if ($_GET['target'] == "dps1") { $welcome_message = "You're adding the DPS (1) client position."; $specs = array('Frost', 'Unholy', 'Balance', 'Feral (DPS)', 'Beast Mastery', 'Marksmanship', 'Survival', 'Arcane', 'Fire', 'Windwalker', 'Retribution', 'Shadow', 'Assassination', 'Combat', 'Subtlety', 'Elemental', 'Enhancement', 'Affliction', 'Demonology', 'Destruction', 'Arms', 'Fury'); }
if ($_GET['target'] == "dps2") { $welcome_message = "You're adding the DPS (2) client position."; $specs = array('Frost', 'Unholy', 'Balance', 'Feral (DPS)', 'Beast Mastery', 'Marksmanship', 'Survival', 'Arcane', 'Fire', 'Windwalker', 'Retribution', 'Shadow', 'Assassination', 'Combat', 'Subtlety', 'Elemental', 'Enhancement', 'Affliction', 'Demonology', 'Destruction', 'Arms', 'Fury'); }
if ($_GET['target'] == "dps3") { $welcome_message = "You're adding the DPS (3) client position."; $specs = array('Frost', 'Unholy', 'Balance', 'Feral (DPS)', 'Beast Mastery', 'Marksmanship', 'Survival', 'Arcane', 'Fire', 'Windwalker', 'Retribution', 'Shadow', 'Assassination', 'Combat', 'Subtlety', 'Elemental', 'Enhancement', 'Affliction', 'Demonology', 'Destruction', 'Arms', 'Fury'); }
?>

<h2><?php echo $welcome_message; ?></h2>
<hr>

<?php $get_run_region = mysql_query("SELECT region FROM schedule WHERE id = $_GET[runid]"); $run_region = mysql_result($get_run_region,0); ?>
<?php $get_run_faction = mysql_query("SELECT faction FROM schedule WHERE id = $_GET[runid]"); $run_faction = mysql_result($get_run_faction,0); ?>

<h4>Primary Talent Specialization</h4>
<table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
							<tr>
								<th width="16px"></th>
								<th width="75px;">Wait Time</th>
								<th width="55px">Package</th>
								<th>Character Name</th>
                            </tr>
                        </thead>
                        <tbody>

<?php $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE character_spec IN('".implode("', '", $specs)."') AND payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND geography='$run_region' AND faction='$run_faction' ORDER BY id ASC");
           while ($buyerlist = mysql_fetch_array($get_buyers)) { ?>
		   
			<?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$buyerlist['id']."%' OR healer_id LIKE '%".$buyerlist['id']."%' OR dps1_id LIKE '%".$buyerlist['id']."%' OR dps2_id LIKE '%".$buyerlist['id']."%' OR dps3_id LIKE '%".$buyerlist['id']."%'"); if (mysql_num_rows($sql) > 0) { ?><?php } else { ?>
						<tr>
							<td><a href="_actions/edit_run_client.php?runid=<?php echo $_GET['runid']; ?>&target=<?php echo $_GET['target']; ?>&client_id=<?php echo $buyerlist['id']; ?>" class="btn btn-mini btn-success"><i class="glyphicon-plus"></i></a></td>
							<td><center><?php echo time_elapsed_string($buyerlist['date_added']); ?></center></td>
							<td><?php if ($buyerlist['playtype'] == "pilot") { echo "Pilot"; } if ($buyerlist['playtype'] == "selfplay") { echo "Self"; } ?></td>
							<td><a href="http://<?php echo strtolower($buyerlist['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($buyerlist['character_realm']); ?>/<?php echo strtolower($buyerlist['character_name']); ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a> <font color="<?php classColor($buyerlist['character_class']); ?>"><?php echo htmlspecialchars_decode(ucfirst($buyerlist['character_name'])); ?></font> (<?php echo $buyerlist['character_spec']; ?>)</td>							
						</tr>
						<?php } ?>
						
						<?php } ?>
						<?php if (mysql_num_rows($get_buyers) == 0) { ?>
						<tr>
							<td colspan="4"><center>No available clients to fill this position.</center></td>
						</tr>
						<?php } ?>
						
						<tr>
							<td colspan="4"><center>If nothing <b>else</b> appears in this list other than this message, everyone is scheduled that can be!</center></td>
						</tr>
						
						</tbody>
						</table>
						
<h4>Secondary Talent Specialization</h4>
<table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
							<tr>
								<th width="16px"></th>
								<th width="75px;">Wait Time</th>
								<th width="55px">Package</th>
								<th>Character Name</th>
                            </tr>
                        </thead>
                        <tbody>

<?php $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE alternative_spec IN('".implode("', '", $specs)."') AND payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND geography='$run_region' AND faction='$run_faction' ORDER BY id ASC");
           while ($buyerlist = mysql_fetch_array($get_buyers)) { ?>
		   
			<?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$buyerlist['id']."%' OR healer_id LIKE '%".$buyerlist['id']."%' OR dps1_id LIKE '%".$buyerlist['id']."%' OR dps2_id LIKE '%".$buyerlist['id']."%' OR dps3_id LIKE '%".$buyerlist['id']."%'"); if (mysql_num_rows($sql) > 0) { ?><?php } else { ?>
						<tr>
							<td><a href="_actions/edit_run_client.php?runid=<?php echo $_GET['runid']; ?>&target=<?php echo $_GET['target']; ?>&client_id=<?php echo $buyerlist['id']; ?>" class="btn btn-mini btn-success"><i class="glyphicon-plus"></i></a></td>
							<td><center><?php echo time_elapsed_string($buyerlist['date_added']); ?></center></td>
							<td><?php if ($buyerlist['playtype'] == "pilot") { echo "Pilot"; } if ($buyerlist['playtype'] == "selfplay") { echo "Self"; } ?></td>
							<td><a href="http://<?php echo strtolower($buyerlist['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($buyerlist['character_realm']); ?>/<?php echo strtolower($buyerlist['character_name']); ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a> <font color="<?php classColor($buyerlist['character_class']); ?>"><?php echo htmlspecialchars_decode(ucfirst($buyerlist['character_name'])); ?></font> (<?php echo $buyerlist['character_spec']; ?>)</td>							
						</tr>
						<?php } ?>
						
						<?php } ?>
						<?php if (mysql_num_rows($get_buyers) == 0) { ?>
						<tr>
							<td colspan="4"><center>No available clients to fill this position.</center></td>
						</tr>
						<?php } ?>
						
						<tr>
							<td colspan="4"><center>If nothing <b>else</b> appears in this list other than this message, everyone is scheduled that can be!</center></td>
						</tr>
						
						</tbody>
						</table>
						
<h4>Tertiary Talent Specialization</h4>
<table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
							<tr>
								<th width="16px"></th>
								<th width="75px;">Wait Time</th>
								<th width="55px">Package</th>
								<th>Character Name</th>
                            </tr>
                        </thead>
                        <tbody>

<?php $get_buyers = mysql_query("SELECT * FROM buyerlist WHERE second_alternative_spec IN('".implode("', '", $specs)."') AND payment_method='USD' AND run_status='incomplete' AND payment_status='paid' AND geography='$run_region' AND faction='$run_faction' ORDER BY id ASC");
           while ($buyerlist = mysql_fetch_array($get_buyers)) { ?>
		   
			<?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$buyerlist['id']."%' OR healer_id LIKE '%".$buyerlist['id']."%' OR dps1_id LIKE '%".$buyerlist['id']."%' OR dps2_id LIKE '%".$buyerlist['id']."%' OR dps3_id LIKE '%".$buyerlist['id']."%'"); if (mysql_num_rows($sql) > 0) { ?><?php } else { ?>
						<tr>
							<td><a href="_actions/edit_run_client.php?runid=<?php echo $_GET['runid']; ?>&target=<?php echo $_GET['target']; ?>&client_id=<?php echo $buyerlist['id']; ?>" class="btn btn-mini btn-success"><i class="glyphicon-plus"></i></a></td>
							<td><center><?php echo time_elapsed_string($buyerlist['date_added']); ?></center></td>
							<td><?php if ($buyerlist['playtype'] == "pilot") { echo "Pilot"; } if ($buyerlist['playtype'] == "selfplay") { echo "Self"; } ?></td>
							<td><a href="http://<?php echo strtolower($buyerlist['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($buyerlist['character_realm']); ?>/<?php echo strtolower($buyerlist['character_name']); ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a> <font color="<?php classColor($buyerlist['character_class']); ?>"><?php echo htmlspecialchars_decode(ucfirst($buyerlist['character_name'])); ?></font> (<?php echo $buyerlist['character_spec']; ?>)</td>							
						</tr>
						<?php } ?>
						
						<?php } ?>
						<?php if (mysql_num_rows($get_buyers) == 0) { ?>
						<tr>
							<td colspan="4"><center>No available clients to fill this position.</center></td>
						</tr>
						<?php } ?>
						
						<tr>
							<td colspan="4"><center>If nothing <b>else</b> appears in this list other than this message, everyone is scheduled that can be!</center></td>
						</tr>
						
						</tbody>
						</table>
		   
		   
		 

<?php } ?>

<?php if ($_GET['action'] == "edit_staff") { ?>
<?php
if ($_GET['target'] == "tank") { $welcome_message = "You are editing the staff member for the tank position."; }
if ($_GET['target'] == "healer") { $welcome_message = "You are editing the staff member for the healer position."; }
if ($_GET['target'] == "dps1") { $welcome_message = "You are editing the staff member for the DPS (1) position."; }
if ($_GET['target'] == "dps2") { $welcome_message = "You are editing the staff member for the DPS (2) position."; }
if ($_GET['target'] == "dps3") { $welcome_message = "You are editing the staff member for the DPS (3) position."; }
?>

<h2><?php echo $welcome_message; ?></h2>
<hr>
<table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
							<tr>
								<th width="16px"></th>
								<th>Staff Member</th>
                            </tr>
                        </thead>
                        <tbody>
								<tr>
									<td><a href="_actions/edit_run_staff.php?runid=<?php echo $_GET['runid']; ?>&target=<?php echo $_GET['target']; ?>&staff_id=" class="btn btn-mini"><i class="glyphicon-retweet_2"></i></a></td>
									<td>Set to <b>VACANT</b>.</td>
								</tr>
								<tr>
									<td><a href="_actions/edit_run_staff.php?runid=<?php echo $_GET['runid']; ?>&target=<?php echo $_GET['target']; ?>&staff_id=self" class="btn btn-mini"><i class="glyphicon-retweet_2"></i></a></td>
									<td>Set to <i>Account Owner</i>.</td>
								</tr>
						
						<?php $get_staff_member = mysql_query("SELECT * FROM staff WHERE status != 'inactive' ORDER BY id ASC");
							while ($staff_members = mysql_fetch_array($get_staff_member)) { ?>
							
								<tr>
									<td><a href="_actions/edit_run_staff.php?runid=<?php echo $_GET['runid']; ?>&target=<?php echo $_GET['target']; ?>&staff_id=<?php echo $staff_members['id']; ?>" class="btn btn-mini"><i class="glyphicon-retweet_2"></i></a></td>
									<td><?php echo $staff_members['name']; ?></td>
								</tr>
							
							<?php } ?>	

						</tbody>
						</table>
<?php } ?>


<?php if ($_GET['action'] == "edit_time") { ?>

<h2>You are here to edit the run time!</h2>
<hr>
Soon (tm)
<?php } ?>