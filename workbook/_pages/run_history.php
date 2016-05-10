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
                        <h4>Completed Runs <small>Tab to view older model.</small></h4>
                    </div>
                    <!-- END Left Aligned Tabs Title -->

                    <!-- Left Aligned Tabs Content -->
                    <div class="block-content">
                        <div class="tabs-left clearfix">
                            <ul class="nav nav-tabs" data-toggle="tabs">
                                <li class="active"><a href="#new">Detailed</a></li>
                                <li><a href="#archived">Archived</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="new">

                                	<!-- Dynamic Tables Section -->
<?php $run_count_new = mysql_num_rows(mysql_query("SELECT id FROM schedule WHERE finalized!=''"));
	  $run_count_old = mysql_num_rows(mysql_query("SELECT id FROM run_list"));
	  $run_count = ($run_count_new + $run_count_old);

?>

 <h4 class="page-header">Total <small><?php echo $run_count; ?></small></h4>


                <div class="block-section">                	
                    <table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Region</th>
                                <th>Faction</th>
                                <th>Scheduled Date</th>
                                <th>Completed Date</th>
                                <th>Founders</th>
                                <th>Contractors</th>
                                <th>Self Plays</th>
                                <th>Run Value</td>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$get_completed_runs = mysql_query("SELECT * FROM schedule WHERE finalized!='' ORDER BY finalized DESC");
                        		while ($completed_runs = mysql_fetch_array($get_completed_runs)) {

                        			$get_staff_array = mysql_query("SELECT staff_tank_id, staff_healer_id, staff_dps1_id, staff_dps2_id, staff_dps3_id FROM schedule WHERE id='$completed_runs[id]'");
									while ($staff_array = mysql_fetch_array($get_staff_array)) {
										$staff_list = $staff_array;
									}

									$founder_staff = mysql_num_rows(mysql_query("SELECT id FROM staff WHERE position = 'Founder' AND id IN('".implode("', '", $staff_list)."')"));
									$contractor_staff = mysql_num_rows(mysql_query("SELECT id FROM staff WHERE position = 'Contractor' AND id IN('".implode("', '", $staff_list)."')"));

									$sp1 = mysql_num_rows(mysql_query("SELECT staff_tank_id FROM schedule WHERE staff_tank_id = 'self' AND id='$completed_runs[id]'"));
									$sp2 = mysql_num_rows(mysql_query("SELECT staff_healer_id FROM schedule WHERE staff_healer_id = 'self' AND id='$completed_runs[id]'"));
									$sp3 = mysql_num_rows(mysql_query("SELECT staff_dps1_id FROM schedule WHERE staff_dps1_id = 'self' AND id='$completed_runs[id]'"));
									$sp4 = mysql_num_rows(mysql_query("SELECT staff_dps2_id FROM schedule WHERE staff_dps2_id = 'self' AND id='$completed_runs[id]'"));
									$sp5 = mysql_num_rows(mysql_query("SELECT staff_dps3_id FROM schedule WHERE staff_dps3_id = 'self' AND id='$completed_runs[id]'"));

									$sp_count = ($sp1 + $sp2 + $sp3 + $sp4 + $sp5);

									$get_test = mysql_query("SELECT tank_id, healer_id, dps1_id, dps2_id, dps3_id FROM schedule WHERE id='$completed_runs[id]'");
									while ($test = mysql_fetch_array($get_test)) {
										$money_test = $test;
									}
									$get_money = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE id IN('".implode("', '", $money_test)."')");
									$run_value = mysql_result($get_money, 0);

                        	?>
                            <tr>
                            	<td><?php echo $completed_runs['id']; ?></td>
                            	<td><?php echo $completed_runs['region']; ?></td>
                            	<td><?php echo $completed_runs['faction']; ?></td>
                            	<td><?php echo date("l, F jS - h:i A", $completed_runs['timestamp']); ?> PST</td>
                            	<td><?php echo date("l, F jS - h:i A", $completed_runs['finalized']); ?> PST</td>
                            	<td><?php echo $founder_staff; ?> <small>($<?php echo round((($run_value - ($contractor_staff * 50)) / $founder_staff),2); ?>/each)</small></td>
                            	<td><?php echo $contractor_staff; ?> <small>($<?php echo ($contractor_staff * 50); ?>/each)</small></td>
                            	<td><?php echo $sp_count; ?></td>
                            	<td>$<?php echo round($run_value,2); ?></td>
                            	<td><a href="?page=view_run&id=<?php echo $completed_runs['id']; ?>">View</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END Dynamic Tables Section -->

                                </div>
                                <div class="tab-pane" id="archived">

                                	<!-- Dynamic Tables Section -->
<?php $num_archived_runs = mysql_num_rows(mysql_query("SELECT id FROM run_list"));
?>

 <h4 class="page-header">Total <small><?php echo $num_archived_runs; ?></small></h4>


                <div class="block-section">                	
                    <table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
								<th>Run ID</th>
								<th>Date and Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$result = mysql_query("SELECT * FROM run_list");
								while ($run_list = mysql_fetch_array($result)) {
								
								$unixtime_to_date = date('F d Y @ g:i A (T)', $run_list['timestamp']);
                        	?>
                            <tr>
                                <td><?php echo $run_list['runkey']; ?></td>
								<td><?php echo $unixtime_to_date; ?></td>
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

