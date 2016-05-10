							<div class="row">
								<div class="col-md-12">
									<h2>Leave a Review</h2>
								</div>
							</div>
							
							<div class="row">
						<div class="col-md-12">
						<?php $tID = $_SESSION['transID']; ?>
						<?php $get_run_status = mysql_query("SELECT run_status FROM buyerlist WHERE connectkey = '$tID'"); $run_status = mysql_result($get_run_status,0); ?>
						
						<?php if ($run_status == "incomplete") { ?>
						<div class="alert alert-warning">
								<strong>Your run is not complete.</strong> You may leave a review once your run has been completed.
							</div>

						<?php } ?>
						
						<?php if ($run_status == "complete") { ?>
						
						<div class="row">
						<div class="col-md-12">
						<?php if (@$_GET['msg'] == "thanks") { ?>
						<div class="alert alert-success">
							<strong>Thanks</strong> Your review helps us better our service. We appreciate you taking the time to leave your feedback.
						</div>
						<?php } ?>
						
						<?php $check_done = mysql_query("SELECT transID FROM reviews WHERE transID = '$_SESSION[transID]'"); if (mysql_num_rows($check_done) == 0) { ?>
							<p><a><strong>We value honesty.</strong><br>Ratings are anonymous for both us and what will be on public display. Only your class and talent specialization will be shown.</a></p>

							<form action="_actions/submit_review.php" method="POST">
								<div class="row">
									<div class="form-group">
										<div class="col-md-6">
											<label>Your rating:</label><br>
											<select name="rating" required>
											  <option value="5">5</option>
											  <option value="4">4</option>
											  <option value="3">3</option>
											  <option value="2">2</option>
											  <option value="1">1</option>
											  <option value="0">0</option>
											</select>
										</div>
										
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Comments:</label><br>
											<label><i>This field is optional, but very valuable to both us and prospective buyers.</i></label>
											<textarea rows="10" class="form-control" name="comment" style="height: 138px;"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<?php $get_package = mysql_query("SELECT playtype FROM buyerlist WHERE connectkey = '$_SESSION[transID]'"); $package_data = mysql_result($get_package,0); ?>
										<?php $get_class = mysql_query("SELECT character_class FROM buyerlist WHERE connectkey = '$_SESSION[transID]'"); $class_data = mysql_result($get_class,0); ?>
										<?php $get_spec = mysql_query("SELECT character_spec FROM buyerlist WHERE connectkey = '$_SESSION[transID]'"); $spec_data = mysql_result($get_spec,0); ?>
										<input type="hidden" value="<?php echo $package_data; ?>" name="package">
										<input type="hidden" value="<?php echo $class_data; ?>" name="class">
										<input type="hidden" value="<?php echo $spec_data; ?>" name="spec">
										<input type="submit" value="Leave Review" class="btn btn-primary" data-loading-text="Loading...">
									</div>
								</div>
							</form>
							
							<?php } else { ?>
							<?php if (@!$_GET['msg'] == "thanks") { ?>
							<div class="alert alert-info">
								<strong>You have already left a review.</strong> Thanks for your input!
							</div>
							<?php } ?>
							<?php } ?>
						</div>

						
						<hr class="tall" />

						
						<?php } ?>
						
						</div>
						</div>