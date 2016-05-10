<?php include('../_sql/connect.php'); ?>
<?php

	$total_payment_raised = 0;
	$raf_compensation = 0; // Change this value to adjust compensation rate.
	$total_rafs = 0;
	
	if ($_GET['start_month']==NULL) { $target_start = strtotime(date("F Y")); } else { $target_start = $_GET['start_month']; }
	if ($_GET['end_month']==NULL) { $target_end = strtotime("next month"); } else { $target_end = $_GET['end_month']; }

	$raf_month = date("F");
	
	?>

<h4 class="page-header">Referal Program Enrollment <small><?php echo date("F Y", $target_start); ?></small></h4>


                <div class="block-section">                	
                    <table id="example-datatables" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th colspan="13">Timeframe Selection</th>
                        </thead>
                        <tbody>
                            <tr>
                            	<td align="center"><b>2013</b></td>
                            	<td colspan="9"></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("October 1st 2013"); ?>&end_month=<?php echo strtotime("October 31st 2013"); ?>">Oct</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("November 1st 2013"); ?>&end_month=<?php echo strtotime("November 30th 2013"); ?>">Nov</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("December 1st 2013"); ?>&end_month=<?php echo strtotime("December 31st 2013"); ?>">Dec</a></td>
                            </tr>
                            <tr>
                            	<td align="center"><b>2014</b></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("January 1st 2014"); ?>&end_month=<?php echo strtotime("January 31st 2014"); ?>">Jan</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("February 1st 2014"); ?>&end_month=<?php echo strtotime("February 28th 2014"); ?>">Feb</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("March 1st 2014"); ?>&end_month=<?php echo strtotime("March 31st 2014"); ?>">Mar</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("April 1st 2014"); ?>&end_month=<?php echo strtotime("April 30th 2014"); ?>">Apr</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("May 1st 2014"); ?>&end_month=<?php echo strtotime("May 31st 2014"); ?>">May</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("June 1st 2014"); ?>&end_month=<?php echo strtotime("June 30th 2014"); ?>">Jun</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("July 1st 2014"); ?>&end_month=<?php echo strtotime("July 31st 2014"); ?>">Jul</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("August 1st 2014"); ?>&end_month=<?php echo strtotime("August 31st 2014"); ?>">Aug</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("September 1st 2014"); ?>&end_month=<?php echo strtotime("September 30th 2014"); ?>">Sep</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("October 1st 2014"); ?>&end_month=<?php echo strtotime("October 31st 2014"); ?>">Oct</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("November 1st 2014"); ?>&end_month=<?php echo strtotime("November 30th 2014"); ?>">Nov</a></td>
                            	<td align="center"><a href="?page=referral_program&start_month=<?php echo strtotime("December 1st 2014"); ?>&end_month=<?php echo strtotime("December 31st 2014"); ?>">Dec</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
	
	 <h4 class="sub-header">Current RAF compensation rate: $<?php echo $raf_compensation; ?> per referral.</h4>
	
	<div class="block-section">                	
    <table id="example-datatables" class="table table-bordered table-hover">
	<tr>
		<thead>
		<th align="center">ID</th>
		<th align="center">Name</th>
		<th align="center">Username</th>
		<th align="center">Contact E-Mail</th>
		<th align="center">PayPal E-Mail</th>
		<th align="center">RAF Code</th>
		<th align="center"># of RAFs</th>
		<th align="center">Earned</th>
	</thead>
	<tbody>
	</tr>
	
	<?php
	
	$result = mysql_query("SELECT * FROM raf_users");
	while ($raf_users = mysql_fetch_array($result)) {

	?>
	
	<tr>
		<td align="center"><?php echo $raf_users['id']; ?></td>
		<td align="left"><?php echo $raf_users['name']; ?></td>
		<td align="left"><?php echo $raf_users['username']; ?></td>
		<td align="left"><?php echo $raf_users['contact_email']; ?></td>
		<td align="left"><?php echo $raf_users['paypal_email']; ?></td>
		<td align="center"><?php echo $raf_users['rafcode']; ?></td>
		<td align="center"><a href="?page=referral_program_data&raf_user=<?php echo $raf_users['id']; ?>&raf_code=<?php echo $raf_users['rafcode']; ?>&target_start=<?php echo $target_start; ?>&target_end=<?php echo $target_end; ?>">
		
		<?php
		
		$this_month = strtotime("October 2013");
		$next_month = strtotime("November 2013");
		
		$result2 = mysql_query("SELECT * FROM buyerlist WHERE rafcode = '$raf_users[rafcode]' AND (date_added BETWEEN $target_start AND $target_end)");
		$num_rafs = mysql_num_rows($result2);
		while ($tpr = mysql_fetch_array($result2)) {
		$tpr_month = date("F", $tpr['date_added']);
		
		$total_payment_raised += $tpr['payment_amount'];
		$total_rafs++;
		}
		
		echo $num_rafs;
		
		
		?></a>
		
		</td>
		<td align="center">$<?php echo $num_rafs * $raf_compensation; ?></td>
	</tbody>
	</tr>
	
	<?php }

	if (mysql_num_rows($result) == 0) {
	
	echo '<tr><td colspan="7" align="center">No users enrolled in RAF program.</td></tr>';
	
	}

	?>
	
	</table>
</div>
	
	<h6 class="sub-header">Referral program has earned a net amount of <b>$<?php echo (round($total_payment_raised, 2) - ($total_rafs * $raf_compensation)); ?> USD</b> in total. ($<?php echo $total_rafs * $raf_compensation; ?> to be paid as compensation.)</h6>