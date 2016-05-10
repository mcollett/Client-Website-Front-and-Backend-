							<div class="row">
								<div class="col-md-12">
									<h2>Refund Request</h2>
								</div>
							</div>
							
							<div class="row">
						<div class="col-md-12">
						<?php if (@$_GET['msg'] == "requested") { ?>
						<div class="alert alert-warning">
							<strong><i class="icon icon-frown-o"></i></strong> We're sorry to hear you are requesting a refund. If there's <u>anything</u> we can do to help change your mind. Please contact us.
						</div>
						<?php } ?>
						<?php $check_done = mysql_query("SELECT transID FROM refundreq WHERE transID = '$_SESSION[transID]'"); if (mysql_num_rows($check_done) == 0) { ?>
							<form action="_actions/submit_refreq.php" method="POST">
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Reason:</label>
											<textarea maxlength="5000" rows="10" class="form-control" name="comment" id="comment" style="height: 138px;"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" value="Request Refund" class="btn btn-primary" data-loading-text="Loading...">
									</div>
								</div>
							</form>
							<?php } else { ?>
							<?php if (@!$_GET['msg'] == "requested") { ?>
							<div class="alert alert-warning">
								<strong>You have already requested a refund.</strong> We are currently processing your request.
							</div>
							<?php } ?>
							<?php } ?>
						</div>
						
						<hr class="tall" />
