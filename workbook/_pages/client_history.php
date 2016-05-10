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
setlocale(LC_MONETARY, 'en_US');
?>

<!-- Left Aligned Tabs Block -->
                <div class="block block-themed">
                    <!-- Left Aligned Tabs Title -->
                    <div class="block-title">
                        <h4>Completed Clients <small>Tab to filter results.</small></h4>
                    </div>
                    <!-- END Left Aligned Tabs Title -->

                    <!-- Left Aligned Tabs Content -->
                    <div class="block-content">
                        <div class="tabs-left clearfix">
                            <ul class="nav nav-tabs" data-toggle="tabs">
                                <li class="active"><a href="#all">All</a></li>
                                <li><a href="#ush">NA-Horde</a></li>
                                <li><a href="#usa">NA-Alliance</a></li>
                                <li><a href="#euh">EU-Horde</a></li>
                                <li><a href="#eua">EU-Alliance</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="all">

                                	<!-- Dynamic Tables Section -->
<?php $num_buyers = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND payment_status='paid' ORDER BY id DESC")); ?>
<?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND payment_method='USD'"); 
while ($get_earned = mysql_fetch_array($get_total_earned)) {
	$earned = $get_earned['SUM(payment_amount)'];
}
?>

 <h4 class="page-header">Total <small><?php echo $num_buyers; ?></small> | Earned <small>$<?php echo number_format($earned, 2); ?> USD</small></h4>


                <div class="block-section">                	
                    <table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Character Name (Talents)</th>
								<th>Realm</th>
                                <th>Package</th>
                                <th>Payment (Type)</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$get_past_buyers = mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND payment_status='paid' ORDER BY id DESC");
                        		while ($past_buyers = mysql_fetch_array($get_past_buyers)) {
                        	?>
                            <tr>
                                <td><?php echo $past_buyers['id']; ?></td>
                                <td><?php echo $past_buyers['buyer_name']; ?></td>
                                <td><font color="<?php classColor($past_buyers['character_class']); ?>"><?php echo htmlspecialchars_decode($past_buyers['character_name']); ?></font> (<?php echo $past_buyers['character_spec']; ?>)</td>
                                <td><?php echo $past_buyers['character_realm']; ?></td>
                                <td><?php if ($past_buyers['playtype'] == "pilot") { echo "Pilot"; } if ($past_buyers['playtype'] == "selfplay") { echo "Self"; } ?></td>
                                <td>$<?php echo $past_buyers['payment_amount']; ?> (<?php echo $past_buyers['payment_method']; ?>)</td>
                                <td><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['skype_display_name']; ?> (<?php echo $past_buyers['skype_username']; ?>)"><i class="social-skype"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['email']; ?>"><i class="halfling-envelope"></i></a>
                                	 <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['phone']; ?>"><i class="glyphicon-iphone"></i></a>
                                	</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END Dynamic Tables Section -->

                                </div>
                                <div class="tab-pane" id="ush">

                                	<!-- Dynamic Tables Section -->
<?php $faction = "Horde"; $region = "US"; ?>
<?php $num_buyers = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' ORDER BY id DESC")); ?>
<?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' AND payment_method='USD'"); 
while ($get_earned = mysql_fetch_array($get_total_earned)) {
	$earned = $get_earned['SUM(payment_amount)'];
}
?>

 <h4 class="page-header">Total <small><?php echo $num_buyers; ?></small> | Earned <small>$<?php echo number_format($earned, 2); ?> USD</small></h4>


                <div class="block-section">                	
                    <table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Character Name (Talents)</th>
								<th>Realm</th>
                                <th>Package</th>
                                <th>Payment (Type)</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$get_past_buyers = mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' ORDER BY id DESC");
                        		while ($past_buyers = mysql_fetch_array($get_past_buyers)) {
                        	?>
                            <tr>
                                <td><?php echo $past_buyers['id']; ?></td>
                                <td><?php echo $past_buyers['buyer_name']; ?></td>
                                <td><font color="<?php classColor($past_buyers['character_class']); ?>"><?php echo htmlspecialchars_decode($past_buyers['character_name']); ?></font> (<?php echo $past_buyers['character_spec']; ?>)</td>
                                <td><?php echo $past_buyers['character_realm']; ?></td>
                                <td><?php if ($past_buyers['playtype'] == "pilot") { echo "Pilot"; } if ($past_buyers['playtype'] == "selfplay") { echo "Self"; } ?></td>
                                <td>$<?php echo $past_buyers['payment_amount']; ?> (<?php echo $past_buyers['payment_method']; ?>)</td>
                                <td><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['skype_display_name']; ?> (<?php echo $past_buyers['skype_username']; ?>)"><i class="social-skype"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['email']; ?>"><i class="halfling-envelope"></i></a>
                                	 <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['phone']; ?>"><i class="glyphicon-iphone"></i></a>
                                	</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END Dynamic Tables Section -->

                                </div>
                                <div class="tab-pane" id="usa">

                                	<!-- Dynamic Tables Section -->
<?php $faction = "Alliance"; $region = "US"; ?>
<?php $num_buyers = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' ORDER BY id DESC")); ?>
<?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' AND payment_method='USD'"); 
while ($get_earned = mysql_fetch_array($get_total_earned)) {
	$earned = $get_earned['SUM(payment_amount)'];
}
?>

 <h4 class="page-header">Total <small><?php echo $num_buyers; ?></small> | Earned <small>$<?php echo number_format($earned, 2); ?> USD</small></h4>


                <div class="block-section">                	
                    <table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Character Name (Talents)</th>
								<th>Realm</th>
                                <th>Package</th>
                                <th>Payment (Type)</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$get_past_buyers = mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' ORDER BY id DESC");
                        		while ($past_buyers = mysql_fetch_array($get_past_buyers)) {
                        	?>
                            <tr>
                                <td><?php echo $past_buyers['id']; ?></td>
                                <td><?php echo $past_buyers['buyer_name']; ?></td>
                                <td><font color="<?php classColor($past_buyers['character_class']); ?>"><?php echo htmlspecialchars_decode($past_buyers['character_name']); ?></font> (<?php echo $past_buyers['character_spec']; ?>)</td>
                                <td><?php echo $past_buyers['character_realm']; ?></td>
                                <td><?php if ($past_buyers['playtype'] == "pilot") { echo "Pilot"; } if ($past_buyers['playtype'] == "selfplay") { echo "Self"; } ?></td>
                                <td>$<?php echo $past_buyers['payment_amount']; ?> (<?php echo $past_buyers['payment_method']; ?>)</td>
                                <td><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['skype_display_name']; ?> (<?php echo $past_buyers['skype_username']; ?>)"><i class="social-skype"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['email']; ?>"><i class="halfling-envelope"></i></a>
                                	 <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['phone']; ?>"><i class="glyphicon-iphone"></i></a>
                                	</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END Dynamic Tables Section -->

                                </div>
                                <div class="tab-pane" id="euh">

                                	<!-- Dynamic Tables Section -->
<?php $faction = "Horde"; $region = "EU"; ?>
<?php $num_buyers = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' ORDER BY id DESC")); ?>
<?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' AND payment_method='USD'"); 
while ($get_earned = mysql_fetch_array($get_total_earned)) {
	$earned = $get_earned['SUM(payment_amount)'];
}
?>

 <h4 class="page-header">Total <small><?php echo $num_buyers; ?></small> | Earned <small>$<?php echo number_format($earned, 2); ?> USD</small></h4>


                <div class="block-section">                	
                    <table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Character Name (Talents)</th>
								<th>Realm</th>
                                <th>Package</th>
                                <th>Payment (Type)</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$get_past_buyers = mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' ORDER BY id DESC");
                        		while ($past_buyers = mysql_fetch_array($get_past_buyers)) {
                        	?>
                            <tr>
                                <td><?php echo $past_buyers['id']; ?></td>
                                <td><?php echo $past_buyers['buyer_name']; ?></td>
                                <td><font color="<?php classColor($past_buyers['character_class']); ?>"><?php echo htmlspecialchars_decode($past_buyers['character_name']); ?></font> (<?php echo $past_buyers['character_spec']; ?>)</td>
                                <td><?php echo $past_buyers['character_realm']; ?></td>
                                <td><?php if ($past_buyers['playtype'] == "pilot") { echo "Pilot"; } if ($past_buyers['playtype'] == "selfplay") { echo "Self"; } ?></td>
                                <td>$<?php echo $past_buyers['payment_amount']; ?> (<?php echo $past_buyers['payment_method']; ?>)</td>
                                <td><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['skype_display_name']; ?> (<?php echo $past_buyers['skype_username']; ?>)"><i class="social-skype"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['email']; ?>"><i class="halfling-envelope"></i></a>
                                	 <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['phone']; ?>"><i class="glyphicon-iphone"></i></a>
                                	</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END Dynamic Tables Section -->

                                </div>
                                <div class="tab-pane" id="eua">

                                	<!-- Dynamic Tables Section -->
<?php $faction = "Alliance"; $region = "EU"; ?>
<?php $num_buyers = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' ORDER BY id DESC")); ?>
<?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' AND payment_method='USD'"); 
while ($get_earned = mysql_fetch_array($get_total_earned)) {
	$earned = $get_earned['SUM(payment_amount)'];
}
?>

 <h4 class="page-header">Total <small><?php echo $num_buyers; ?></small> | Earned <small>$<?php echo number_format($earned, 2); ?> USD</small></h4>


                <div class="block-section">                	
                    <table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Character Name (Talents)</th>
								<th>Realm</th>
                                <th>Package</th>
                                <th>Payment (Type)</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$get_past_buyers = mysql_query("SELECT * FROM buyerlist WHERE run_status='complete' AND payment_status='paid' AND geography='$region' AND faction='$faction' ORDER BY id DESC");
                        		while ($past_buyers = mysql_fetch_array($get_past_buyers)) {
                        	?>
                            <tr>
                                <td><?php echo $past_buyers['id']; ?></td>
                                <td><?php echo $past_buyers['buyer_name']; ?></td>
                                <td><font color="<?php classColor($past_buyers['character_class']); ?>"><?php echo htmlspecialchars_decode($past_buyers['character_name']); ?></font> (<?php echo $past_buyers['character_spec']; ?>)</td>
                                <td><?php echo $past_buyers['character_realm']; ?></td>
                                <td><?php if ($past_buyers['playtype'] == "pilot") { echo "Pilot"; } if ($past_buyers['playtype'] == "selfplay") { echo "Self"; } ?></td>
                                <td>$<?php echo $past_buyers['payment_amount']; ?> (<?php echo $past_buyers['payment_method']; ?>)</td>
                                <td><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['skype_display_name']; ?> (<?php echo $past_buyers['skype_username']; ?>)"><i class="social-skype"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['email']; ?>"><i class="halfling-envelope"></i></a>
                                	 <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="<?php echo $past_buyers['phone']; ?>"><i class="glyphicon-iphone"></i></a>
                                	</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END Dynamic Tables Section -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Left Aligned Tabs Content -->
                </div>
                <!-- END Left Aligned Tabs Block -->

