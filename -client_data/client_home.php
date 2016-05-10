<script src="http://www.thetimezoneconverter.com/js/ttzc.js"></script>

<?php
date_default_timezone_set('US/Central');
 $ckey = $_SESSION['transID']; $get_client_data = mysql_query("SELECT * FROM buyerlist WHERE connectkey = '$ckey'");
while ($client_data = mysql_fetch_array($get_client_data)) {
	$clientID = $client_data['id'];
	$fuckyou = $client_data['id'];
	$name = $client_data['buyer_name'];
	$char_name = $client_data['character_name'];
	$char_spec = $client_data['character_spec'];
	$char_2spec = $client_data['alternative_spec'];
	$char_3spec = $client_data['second_alternative_spec'];
	$char_class = $client_data['character_class'];
	$char_realm = $client_data['character_realm'];
	$char_geo = $client_data['geography'];
	$char_fact = $client_data['faction'];
	$phone = $client_data['phone'];
	$skype_u = $client_data['skype_username'];
	$skype_d = $client_data['skype_display_name'];
	$email = $client_data['email'];
	$package = $client_data['playtype'];
	$price = $client_data['payment_amount'];
	$run_status = $client_data['run_status'];
	$purchase_date = $client_data['date_added'];
	$rafcode = $client_data['rafcode'];
	$how = $client_data['here_how'];
}
 ?>
 <h2><strong>Client</strong> Area</h2>

							<div class="row">
								<div class="col-md-12">
									<p class="lead">
										Details regarding your purchase are here. Additionally, there are many tools to contact us and make your overall experience much more smooth. Take a look around!
									</p>
								</div>
							</div>

							<hr />

							<div class="row">
								<div class="col-md-12">
									<h4 class="spaced">Your Run Information</h4>

								<?php $sql_find = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$clientID."%' OR healer_id LIKE '%".$clientID."%' OR dps1_id LIKE '%".$clientID."%' OR dps2_id LIKE '%".$clientID."%' OR dps3_id LIKE '%".$clientID."%'");  ?>
								<?php while ($get_run_time = mysql_fetch_array($sql_find)) { $is_final = $get_run_time['finalized']; $run_time = $get_run_time['timestamp']; $new_run_time = strtotime('+2 hours', $run_time); } ?>
								<div class="row">
											<div class="col-md-12">
											<?php if ((mysql_num_rows($sql_find) > 0)&&($is_final == "")) { ?>
												<div class="alert alert-success">
													<strong>Order Status:</strong> Your run has been scheduled for <u><?php echo date("l, F jS", $run_time); ?> at 
													<script> 
new TTZC.Widget({ 
  version:'inline', 
  t:'<?php echo date("g:i A", $run_time); ?>', 
  tz:'Los Angeles' 
}).display(); 
</script></u> based on your computer's local time.
												</div>
											<?php } if ((mysql_num_rows($sql_find) == 0)) { ?>
												<div class="alert alert-info">
													<strong>Order Status:</strong> We have received your information and are in the process of scheduling you.
												</div>												
												<?php } if ((mysql_num_rows($sql_find) > 0)&&($is_final !== "")) {  ?>
												<div class="alert alert-info">
													<strong>Order Status:</strong> Your order has been completed. <a href="client?page=review">You many now fill out a review.</a>
												</div>												
												<?php } ?>
											</div>
											</div>
									
									<h4 class="spaced">Your Personal Information</h4>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th width="200px">
											*
										</th>
										<th>
											Information
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											Transaction ID
										</td>
										<td>
											<?php echo $_SESSION['transID']; ?>
										</td>
									</tr>
									<tr>
										<td>
											Name
										</td>
										<td>
											<?php echo $name; ?>
										</td>
									</tr>
									<tr>
										<td>
											Character Name
										</td>
										<td>
											<?php echo $char_name; ?>
										</td>
									</tr>
									<tr>
										<td>
											Character Class
										</td>
										<td>
											<?php echo $char_class; ?>
										</td>
									</tr>
									<tr>
										<td>
											Primary Talents
										</td>
										<td>
											<?php echo $char_spec; ?>
										</td>
									</tr>
									<tr>
										<td>
											Secondary Talents
										</td>
										<td>
											<?php echo $char_2spec; ?>
										</td>
									</tr>
									<tr>
										<td>
											Tertiary Talents
										</td>
										<td>
											<?php echo $char_3spec; ?>
										</td>
									</tr>
									<tr>
										<td>
											Region
										</td>
										<td>
											<?php echo $char_geo; ?>
										</td>
									</tr>
									<tr>
										<td>
											Faction
										</td>
										<td>
											<?php echo $char_fact; ?>
										</td>
									</tr>
									<tr>
										<td>
											Phone Number
										</td>
										<td>
											<?php echo $phone; ?>
										</td>
									</tr>
									<tr>
										<td>
											Skype Username
										</td>
										<td>
											<?php echo $skype_u; ?>
										</td>
									</tr>
									<tr>
										<td>
											Skype Display Name
										</td>
										<td>
											<?php echo $skype_d; ?>
										</td>
									</tr>
									<tr>
										<td>
											E-Mail
										</td>
										<td>
											<?php echo $email; ?>
										</td>
									</tr>
									<tr>
										<td>
											Package
										</td>
										<td>
											<?php echo ucfirst($package); ?>
										</td>
									</tr>
									<tr>
										<td>
											Payment Amount
										</td>
										<td>
											<?php echo $price; ?>
										</td>
									</tr>
									<tr>
										<td>
											Referral Code
										</td>
										<td>
											<?php echo $rafcode; ?>
										</td>
									</tr>
									<tr>
										<td>
											How did you hear about us?
										</td>
										<td>
											<?php echo $how; ?>
										</td>
									</tr>
								</tbody>
							</table>

								</div>
							</div>