<?php $get_staff_data = mysql_query("SELECT * FROM staff WHERE status = '' ORDER BY id ASC"); ?>
<?php
$jan_2013 = strtotime("January 1st 2013");
$dec_2013 = strtotime("December 31st 2013");
$jan_2014 = strtotime("January 1st 2014");
$dec_2014 = strtotime("December 31st 2014");
$jan_2015 = strtotime("January 1st 2015");
$dec_2015 = strtotime("December 31st 2015");

$total_2013 = mysql_num_rows(mysql_query("SELECT id FROM schedule WHERE finalized <= '1388469600' AND finalized != ''"));
$total_2014 = mysql_num_rows(mysql_query("SELECT id FROM schedule WHERE finalized >= '1388556000' AND finalized <= '1420005600' AND finalized != ''"));
function getStaffAtt2013($var) {
		$result = mysql_num_rows(mysql_query("SELECT id FROM schedule WHERE (staff_tank_id LIKE '%".$var."%' OR staff_healer_id LIKE '%".$var."%' OR staff_dps1_id LIKE '%".$var."%' OR staff_dps2_id LIKE '%".$var."%' OR staff_dps3_id LIKE '%".$var."%') AND finalized <= '1388469600' AND finalized != ''"));
		echo $result;
	}
?>
<!-- Dynamic Tables in the Grid -->
                <h4 class="page-header">Staff Attendance <small>By year</small></h4>

                <!-- Dynamic Tables in the Grid Content -->
				<div class="row-fluid row-items">
					<div class="span6">
					
						<div class="alert alert-info">
                            <h4>2013</h4> <?php echo $total_2013; ?> runs recorded. (Since tracking began -- November 8th.)
                        </div>
				
					</div>
					<div class="span6">
					
						<div class="alert alert-success">
                            <h4>2014</h4> <?php echo $total_2014; ?> runs recorded. (YTD)
                        </div>
					
					</div>

				</div>
                <!-- div.row-fluid -->
                <div class="row-fluid row-items">
                    <!-- Datatables Example 1 -->
                    <div class="span6">
                        <table id="example-datatables2" class="table table-striped table-bordered table-hover">
                            <thead>
							    <tr>
                                    <th><i class="icon-user"></i> Staff Member</th>
                                    <th width="75px">Attended</th>
									<th width="75px">Percentage</th>
									<th width="75px">Earnings</th>
                                </tr>
							</thead>
                            <tbody>
							<?php while ($staff_data = mysql_fetch_array($get_staff_data)) { ?>
                                <tr>
                                    <td><?php echo $staff_data['name']; ?></td>
                                    <td><?php $staff_run_count = mysql_num_rows(mysql_query("SELECT id FROM schedule WHERE (staff_tank_id LIKE '%".$staff_data['id']."%' OR staff_healer_id LIKE '%".$staff_data['id']."%' OR staff_dps1_id LIKE '%".$staff_data['id']."%' OR staff_dps2_id LIKE '%".$staff_data['id']."%' OR staff_dps3_id LIKE '%".$staff_data['id']."%') AND finalized <= '1388469600' AND finalized != ''")); echo $staff_run_count; ?></td>
									<td><?php echo number_format((($staff_run_count / $total_2013) * 100),2); ?>%</td>
									<td><?php if (($staff_data['id']=="1")||($staff_data['id']=="2")||($staff_data['id']=="3")) { echo "--"; } else { echo "$"; $s_dollars = ($staff_run_count * 50); echo number_format(($s_dollars),2); } ?></td>
                                </tr>
							<?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END Datatables Example 1 -->

                    <!-- Datatables Example 2 -->
                    <div class="span6">
                        <table id="example-datatables2" class="table table-striped table-bordered table-hover">
							<thead>
                                <tr>
                                    <th><i class="icon-user"></i> Staff Member</th>
                                    <th width="20px">Attended</th>
									<th width="20px">Percentage</th>
									<th width="75px">Earnings</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $get_total_earned = mysql_query("SELECT SUM(payment_amount) FROM buyerlist WHERE date_added >= '1388556000' AND date_added <= '1420005600'"); 
                                    while ($get_earned = mysql_fetch_array($get_total_earned)) {
                                        $earned = $get_earned['SUM(payment_amount)'];
                                    }
                                    ?>
								<?php $get_staff_data33 = mysql_query("SELECT * FROM staff WHERE status = '' ORDER BY id ASC"); while ($staff_data2 = mysql_fetch_array($get_staff_data33)) { ?>
								<?php $staff_run_count69 = mysql_num_rows(mysql_query("SELECT id FROM schedule WHERE (staff_tank_id LIKE '%".$staff_data2['id']."%' OR staff_healer_id LIKE '%".$staff_data2['id']."%' OR staff_dps1_id LIKE '%".$staff_data2['id']."%' OR staff_dps2_id LIKE '%".$staff_data2['id']."%' OR staff_dps3_id LIKE '%".$staff_data2['id']."%') AND finalized >= '1388556000' AND finalized <= '1420005600' AND finalized != ''")); ?>
								<?php if (($staff_data69['id']=="1")||($staff_data69['id']=="2")||($staff_data69['id']=="3")) { } else { $staff_dollars = ($staff_run_count69 * 50);  $staff_sum += $staff_dollars; } ?>
								<?php $total_deduct = number_format((($earned-$staff_sum)/3),2); } ?>
								
								<?php $get_staff_data2 = mysql_query("SELECT * FROM staff WHERE status = '' ORDER BY id ASC"); while ($staff_data2 = mysql_fetch_array($get_staff_data2)) { ?>
								<?php $staff_run_count69 = mysql_num_rows(mysql_query("SELECT id FROM schedule WHERE (staff_tank_id LIKE '%".$staff_data2['id']."%' OR staff_healer_id LIKE '%".$staff_data2['id']."%' OR staff_dps1_id LIKE '%".$staff_data2['id']."%' OR staff_dps2_id LIKE '%".$staff_data2['id']."%' OR staff_dps3_id LIKE '%".$staff_data2['id']."%') AND finalized >= '1388556000' AND finalized <= '1420005600' AND finalized != ''")); ?>

                                <tr>
                                    <td><?php echo $staff_data2['name']; ?></td>
                                    <td><?php $staff_run_count2 = mysql_num_rows(mysql_query("SELECT id FROM schedule WHERE (staff_tank_id LIKE '%".$staff_data2['id']."%' OR staff_healer_id LIKE '%".$staff_data2['id']."%' OR staff_dps1_id LIKE '%".$staff_data2['id']."%' OR staff_dps2_id LIKE '%".$staff_data2['id']."%' OR staff_dps3_id LIKE '%".$staff_data2['id']."%') AND finalized >= '1388556000' AND finalized <= '1420005600' AND finalized != ''")); echo $staff_run_count2; ?></td>
									<td><?php echo number_format((($staff_run_count2 / $total_2014) * 100),2); ?>%</td>
									<td><?php if (($staff_data2['id']=="1")||($staff_data2['id']=="2")||($staff_data2['id']=="3")) { echo "$"; echo $total_deduct; } else { echo "$"; $staff_dollars = ($staff_run_count2 * 50); echo number_format(($staff_dollars),2); } ?></td>
                                </tr>
							<?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END Datatables Example 1 -->
                </div>
                <!-- END div.row-fluid -->
                <!-- END Dynamic Tables in the Grid -->