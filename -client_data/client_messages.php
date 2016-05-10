<?php $tID = $_SESSION['transID']; ?>							
							<div class="row">
								<div class="col-md-12">
									<h2>Message Center</h2>
								</div>
							</div>
							
							<div class="row">
						<div class="col-md-12">
						<?php if (@$_GET['msg_id'] == NULL) { ?>
						<a href="client?page=new_message"><button type="button" class="btn btn-success btn-sm">Create New Message</button></a>
	<hr />
							<table class="table table-striped">
								<thead>
									<tr>
										<th width="30%">
											Message Preview
										</th>
										<th width="10%">
											Submitted
										</th>
										<th width="10%">
											Updated
										</th>
										<th width="25%">
											Last Response By
										</th>
										<th width="10%">
											Status
										</th>
									</tr>
								</thead>
								<tbody>
								<?php $get_messages = mysql_query("SELECT * FROM messages WHERE transID = '$tID' ORDER BY submitted DESC"); ?>
								<?php if (mysql_num_rows($get_messages) == 0) { ?><tr><td colspan="5"><center>There are no messages to display.</center></td></tr><?php } ?>
									<?php while ($messages = mysql_fetch_array($get_messages)) { ?>
									<tr>
										<td>
											<?php if (strlen($messages['message']) > 30) { echo substr($messages['message'], 0, 30); echo "..."; } else { echo $messages['message']; } ?>
										</td>
										<td>
											<?php echo date("M jS", $messages['submitted']); ?>
										</td>
										<td>
											<?php $get_latest_response = mysql_query("SELECT response_time FROM msg_response WHERE msg_id = '$messages[id]' ORDER BY response_time DESC LIMIT 1"); if (mysql_num_rows($get_latest_response) == 0) { echo "<i>pending...</i>"; } else { $lat_response = mysql_result($get_latest_response,0); echo date("M jS", $lat_response); }  ?>
										</td>
										<td>
											<?php $get_staff_response = mysql_query("SELECT author FROM msg_response WHERE msg_id = '$messages[id]' ORDER BY response_time DESC LIMIT 1"); if (mysql_num_rows($get_staff_response) == 0) { echo "---"; } else { echo mysql_result($get_staff_response,0); }  ?>
										</td>
										<td>
											<b><?php $get_msg_status = mysql_query("SELECT status FROM messages WHERE id = '$messages[id]'"); if (mysql_result($get_msg_status,0) == "open") { echo "<font color='#00D447'>Open</font>";  } if (mysql_result($get_msg_status,0) == "closed") { echo "<font color='#FF0000'>Closed</font>";  } ?></b> (<a href="client?page=messages&msg_id=<?php echo $messages['id']; ?>">View</a>)
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php } ?>
							
							<?php if (@!$_GET['msg_id'] == NULL) { ?>
							
							<?php
							// Verify user.
							$mess_id = $_GET['msg_id'];
							$verify_message_reader = mysql_query("SELECT * FROM messages WHERE transID = '$tID' AND id = '$mess_id'");
							
							if (mysql_num_rows($verify_message_reader) == 1) {
							?>
							
							<?php $get_og_msg = mysql_query("SELECT * FROM messages WHERE id = '$_GET[msg_id]'");
								while ($og_msg = mysql_fetch_array($get_og_msg)) { ?>
							<div>
									<blockquote class="testimonial">
										<p><?php echo nl2br($og_msg['message']); ?></p>
									</blockquote>
									<div class="testimonial-arrow-down"></div>
									<div class="testimonial-author">
										<p><strong>You</strong><span><?php echo date("M jS", $og_msg['submitted']); ?></span></p>
									</div>
								</div>
								<hr />
								<?php } ?>
								
							<?php $get_reply_msg = mysql_query("SELECT * FROM msg_response WHERE msg_id = '$_GET[msg_id]' ORDER BY response_time ASC");
								while ($reply_msg = mysql_fetch_array($get_reply_msg)) { ?>
							<div>
									<blockquote class="testimonial" <?php if (@$reply_msg['author'] !== "You") { ?>style="background-color:#FFCFCF;"<?php } ?>>
										<p><?php echo nl2br($reply_msg['message']); ?></p>
									</blockquote>
									<div class="testimonial-arrow-down"></div>
									<div class="testimonial-author">
										<p><strong><?php echo $reply_msg['author']; ?></strong><span><?php echo date("M jS", $reply_msg['response_time']); ?></span></p>
									</div>
								</div>
								<hr />
								<?php } ?>
								
								<?php $get_msg_status = mysql_query("SELECT status FROM messages WHERE id = '$_GET[msg_id]'"); if (mysql_result($get_msg_status,0) == "open") { ?>
								<form action="_actions/reply_message.php" method="POST">
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<textarea rows="10" class="form-control" name="msgcontent" style="height: 138px;" required></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="hidden" value="<?php echo $_GET['msg_id']; ?>" name="msgid">
										<input type="submit" value="Reply" class="btn btn-primary" data-loading-text="Loading...">
									</div>
								</div>
							</form>
							<?php } ?>

							
							<?php } else { ?>
							
							<div class="alert alert-danger">
								<strong>Good try!</strong> But you can't do that... :(
							</div>

							
							<?php } ?>
							<?php } ?>
							
						</div>
						</div>