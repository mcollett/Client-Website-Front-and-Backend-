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
?>
<?php $get_open_tickets = mysql_num_rows(mysql_query("SELECT * FROM messages WHERE status = 'open'")); ?>
<?php $get_closed_tickets = mysql_num_rows(mysql_query("SELECT * FROM messages WHERE status = 'closed'")); ?>
<!-- Navbar Content -->

	<!-- Default Navbar -->
	<div class="block-section">
		<h4 class="sub-header">Message Center</h4>
		<!-- Navbar -->
		<div class="navbar">
			<!-- Navbar Inner -->
			<div class="navbar-inner">
				<!-- div.container -->
				<div class="container">
					<!-- Mobile Nav for Tablets and Phones -->
					<ul class="nav pull-right hidden-desktop">
						<li class="divider-vertical"></li>
						<li>
							<a href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-responsive-collapse-1">
								<i class="icon-reorder"></i>
							</a>
						</li>
					</ul>
					<!-- END Mobile Nav for Tablets and Phones -->

					<!-- Links, Dropdowns and Search -->
					<div class="nav-collapse collapse navbar-responsive-collapse-1">
						<ul class="nav">
							<li <?php if ($_GET['status'] == "open") { echo 'class="active"'; } ?>><a href="content.php?page=tickets&status=open">Open (<?php echo $get_open_tickets; ?>)</a></li>
							<li <?php if ($_GET['status'] == "closed") { echo 'class="active"'; } ?>><a href="content.php?page=tickets&status=closed">Closed (<?php echo $get_closed_tickets; ?>)</a></li>
						</ul>
					</div>
					<!-- END Links, Dropdowns and Search -->
				</div>
				<!-- END div.container -->
			</div>
			<!-- END Navbar Inner -->
		</div>
		<!-- END Navbar -->
	</div>
	<!-- END Default Navbar -->

	<?php if ($_GET['status'] == "open") { ?>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th class="text-center" width="5%">Ticket #</th>
				<th class="text-center" width="5%">Opened</th>
				<th class="text-center" width="10%">Action Needed</th>
				<th>Initial Message</th>
				<th width="5%" class="span1 text-center"><i class="icon-bolt"></i></th>
			</tr>
		</thead>
		<tbody>
		<?php $get_tikdata = mysql_query("SELECT * FROM messages WHERE status = 'open' ORDER BY submitted DESC"); while ($tikdata = mysql_fetch_array($get_tikdata)) { ?>
			<tr>
				<td><?php echo $tikdata['id']; ?></td>
				<td><?php echo date("M jS", $tikdata['submitted']); ?></td>
				<?php $get_rstatus = mysql_query("SELECT author FROM msg_response WHERE msg_id = '$tikdata[id]' ORDER BY response_time DESC LIMIT 1"); $last_responder = mysql_result($get_rstatus,0); ?>
				<td><center><?php if (($last_responder == "You")||($last_responder == NULL)) { echo "<b><font color='#FF0000'>NEEDS RESPONSE</font></b>"; } else { echo "<i><font color='#51AF75'>waiting for client</font></i>"; } ?></center></td>
				<td><?php if (strlen($tikdata['message']) > 60) { echo substr($tikdata['message'], 0, 60); echo "..."; } else { echo $tikdata['message']; } ?></td>
				<td class="span1 text-center">
					<div class="btn-group">
						<a href="content.php?page=tickets&viewmsg=<?php echo $tikdata['id']; ?>" data-toggle="tooltip" title="View" class="btn btn-mini btn-success"><i class="icon-search"></i></a>
						<a href="_actions/close_ticket.php?msgid=<?php echo $tikdata['id']; ?>" data-toggle="tooltip" title="Close" class="btn btn-mini btn-danger"><i class="icon-lock"></i></a>
					</div>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	
	<?php } ?>
	
	<?php if ($_GET['status'] == "closed") { ?>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th class="text-center" width="5%">Ticket #</th>
				<th class="text-center" width="5%">Opened</th>
				<th class="text-center" width="10%">Action Needed</th>
				<th>Initial Message</th>
				<th width="5%" class="span1 text-center"><i class="icon-bolt"></i></th>
			</tr>
		</thead>
		<tbody>
		<?php $get_tikdata = mysql_query("SELECT * FROM messages WHERE status = 'closed' ORDER BY submitted DESC"); while ($tikdata = mysql_fetch_array($get_tikdata)) { ?>
			<tr>
				<td><?php echo $tikdata['id']; ?></td>
				<td><?php echo date("M jS", $tikdata['submitted']); ?></td>
				<td><center><b>Ticket Closed</b></center></td>
				<td><?php if (strlen($tikdata['message']) > 60) { echo substr($tikdata['message'], 0, 60); echo "..."; } else { echo $tikdata['message']; } ?></td>
				<td class="span1 text-center">
					<div class="btn-group">
						<a href="content.php?page=tickets&viewmsg=<?php echo $tikdata['id']; ?>" data-toggle="tooltip" title="View" class="btn btn-mini btn-success"><i class="icon-search"></i></a>
					</div>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	
	<?php } ?>
	
	<?php if ($_GET['viewmsg']) { ?>
	
	<h4 class="sub-header">Client Information</h4>
	<table id="example-datatables" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>From</th>
				<th>Name</th>
				<th>Wait</th>
				<th class="span1 text-center" style="width:16px;"><i class="icon-time"></i></th>
				<th>Character Name (Talents)</th>
				<th>Alt Specs</th>
				<th>Realm</th>
				<th>Package</th>
				<th>Payment (Type)</th>
				<th>Contact</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$get_msg_user = mysql_query("SELECT transID FROM messages WHERE id = '$_GET[viewmsg]'"); $msg_user = mysql_result($get_msg_user,0);
				$get_past_buyers = mysql_query("SELECT * FROM buyerlist WHERE connectkey='$msg_user'");
				while ($past_buyers = mysql_fetch_array($get_past_buyers)) { $msgname = $past_buyers['buyer_name'];
			?>
			<tr>
				<td><?php echo $past_buyers['geography']; ?>-<?php echo substr($past_buyers['faction'], 0, 1); ?></td>
				<td><?php echo $past_buyers['buyer_name']; ?></td>
				<td><?php echo time_elapsed_string($past_buyers['date_added']); ?></td>
				<td><?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$past_buyers['id']."%' OR healer_id LIKE '%".$past_buyers['id']."%' OR dps1_id LIKE '%".$past_buyers['id']."%' OR dps2_id LIKE '%".$past_buyers['id']."%' OR dps3_id LIKE '%".$past_buyers['id']."%'"); if (mysql_num_rows($sql) > 0) { ?><img title="Scheduled" width="16px" height="16px" src="img/checkmark.png"><?php } ?></td>
				<td><a href="http://<?php echo strtolower($past_buyers['geography']); ?>.battle.net/wow/en/character/<?php echo strtolower($past_buyers['character_realm']); ?>/<?php echo strtolower($past_buyers['character_name']); ?>/advanced" target="_blank"><img width="16px" height="16px" src="img/wow.png"></a> <font color="<?php classColor($past_buyers['character_class']); ?>"><?php echo htmlspecialchars_decode($past_buyers['character_name']); ?></font> (<?php echo $past_buyers['character_spec']; ?>)</td>
				<td><?php if ($past_buyers['alternative_spec'] !== "NA") { ?><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['alternative_spec']; ?>"><i class="icon-tag"></i></a> <?php } ?> <?php if ($past_buyers['second_alternative_spec'] !== "NA") { ?> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['second_alternative_spec']; ?>"><i class="icon-tags"></i></a> <?php } ?> <?php if (($past_buyers['alternative_spec'] == "NA")&&($past_buyers['second_alternative_spec'] == "NA")) { ?> <i>None</i> <?php } ?></td>
				<td><?php echo $past_buyers['character_realm']; ?></td>
				<td><?php if ($past_buyers['playtype'] == "pilot") { echo "Pilot"; } if ($past_buyers['playtype'] == "selfplay") { echo "Self"; } ?></td>
				<td>$<?php echo $past_buyers['payment_amount']; ?> (<?php echo $past_buyers['payment_method']; ?>)</td>
				<td><a href="skype:<?php echo $past_buyers['skype_username']; ?>?chat" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['skype_display_name']; ?> (<?php echo $past_buyers['skype_username']; ?>)"><i class="icon-skype"></i></a>
					 <?php if ($past_buyers['email'] !== "") { ?><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['email']; ?>"><i class="halfling-envelope"></i></a><?php } ?>
					 <?php if ($past_buyers['phone'] !== "") { ?><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['phone']; ?>"><i class="glyphicon-iphone"></i></a><?php } ?>
					 <?php if ($past_buyers['here_how'] !== "") { ?> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['here_how']; ?>"><i class="halfling-question-sign"></i></a><?php } ?>
				 <?php if ($past_buyers['rafcode'] !== "") { ?> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['rafcode']; ?>"><i class="glyphicon-disk_import"></i></a><?php } ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
	
	<!-- Well Paragraph -->
	<div>
		<h4 class="sub-header">Initial Message</h4>
		<?php $get_msg_ini = mysql_query("SELECT * FROM messages WHERE id = '$_GET[viewmsg]'"); while ($msg_ini = mysql_fetch_array($get_msg_ini)) { ?>
		<p class="well"><strong><?php echo $msgname; ?> (<?php echo time_elapsed_string($msg_ini['submitted']); ?> ago)</strong><br> <?php echo nl2br($msg_ini['message']); ?></p>
		<?php } ?>
	</div>
	
	<div >
		<h4 class="sub-header">Responses</h4>
	
	</div>
	
	<div>
	<?php $get_msg = mysql_query("SELECT * FROM msg_response WHERE msg_id = '$_GET[viewmsg]' ORDER BY response_time DESC"); while ($msg = mysql_fetch_array($get_msg)) { ?>
		<p class="well" <?php if ($msg['author'] !== "You") { ?> style="background-color:#FFD190;" <?php } ?>><?php if ($msg['author'] == "You") { ?><b><?php echo $msgname; ?></b><?php } else { echo $msg['author']; } ?> <strong>(<?php echo time_elapsed_string($msg['response_time']); ?> ago)</strong><br> <?php echo nl2br($msg['message']); ?></p>
		<?php } ?>
	</div>
	<!-- END Well Paragraph -->
	
	<div>
	<h4 class="sub-header">Respond</h4>
		<form action="_actions/respond_message.php?msgid=<?php echo $_GET['viewmsg']; ?>" method="POST">
			Who are you?<br>
			<select name="staffresponder" required>
			  <option value=""></option>
			  <option value="James">James</option>
			  <option value="Matt">Matt</option>
			  <option value="Stephen">Stephen</option>
			</select><br><br>
			<textarea rows="6" cols="75" name="message" required></textarea><br><br>
			<button type="submit" class="btn btn-success">Reply</button>
		</form>
	</div>
	<?php } ?>
	
