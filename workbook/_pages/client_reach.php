<?php

$get_user_info = mysql_query("SELECT * FROM buyerlist WHERE id = '$_GET[client_id]'");
while ($user_info = mysql_fetch_array($get_user_info)) {

?>
<?php if ($_GET['alert']=="sent") { ?>

<div class="alert alert-success">
	<i class="icon-ok"></i> Your e-mail was sent!
</div>

<?php } ?>

<h4>Basic Client Info</h4>
<b>Name</b>: <?php echo $user_info['buyer_name']; ?><br>
<b>Class</b>: <?php echo $user_info['character_class']; ?><br><br>

<?php $first_name = explode(' ',trim($user_info['buyer_name'])); ?>
<?php $sql = mysql_query("SELECT * FROM schedule WHERE tank_id LIKE '%".$user_info['id']."%' OR healer_id LIKE '%".$user_info['id']."%' OR dps1_id LIKE '%".$user_info['id']."%' OR dps2_id LIKE '%".$user_info['id']."%' OR dps3_id LIKE '%".$user_info['id']."%'");

while ($getrun_id = mysql_fetch_array($sql)) { $run_id = $getrun_id['id']; $run_timestamp = $getrun_id['timestamp']; }

 ?>
 
<b>Run Scheduled For:</b><br>
<?php echo date("l, F jS - h:i A", $run_timestamp); ?> PST<br><br>
 
 <b>Skype-friendly Text:</b><br>
 <textarea name="message1" style="min-height:150px;min-width:600px;">Hey there <?php echo $first_name[0]; ?>. We have scheduled your <?php echo $user_info['character_class']; ?>'s run for <?php echo date("l, F jS @ h:i A", $run_timestamp); ?> PST. If you do not live in the Pacific time zone (Los Angeles) you can easily convert the time by using this website: http://www.thetimezoneconverter.com/. Please confirm back with us as soon as possible that this time works for you. Thanks!</textarea><br><br>
 
 <b>Reminder Text:</b><br>
 <textarea name="message2" style="min-height:150px;min-width:600px;">Hey there <?php echo $first_name[0]; ?>. This is just a friendly reminder that we have scheduled your <?php echo $user_info['character_class']; ?>'s run for tomorrow (<?php echo date("l, F jS @ h:i A", $run_timestamp); ?> PST). If you do not live in the Pacific time zone (Los Angeles) you can easily convert the time by using this website: http://www.thetimezoneconverter.com/. Please confirm back with us as soon as possible that this time works for you. Thanks!</textarea><br><br>
 
<b>E-mail Version</b>:<br>
* <i>You can modify the text box to send any other information you want.</i><br>
<form action="_actions/send_cr.php" method="POST">
<textarea name="message" style="min-height:300px;min-width:600px;">Hey there <?php echo $first_name[0]; ?>. This message is to inform you that we have scheduled your <?php echo $user_info['character_class']; ?>'s run for <?php echo date("l, F jS @ h:i A", $run_timestamp); ?> PST. If you do not live in the Pacific time zone (Los Angeles) you can easily convert the time by using this website: http://www.thetimezoneconverter.com/. Please confirm back with us as soon as possible that this time works for you via Skype. Thanks!</textarea><br><br>

<?php if ($user_info['email'] == "") { ?><b><font color="red">This user does not have an e-mail address on file.</font></b><?php } ?>
<?php if ($user_info['email'] !== "") { ?>This user has the following e-mail address on file: <b><?php echo $user_info['email']; ?></b>.<br><br>
<input type="hidden" name="client_id" value="<?php echo $_GET['client_id']; ?>">
<input type="hidden" name="client_email" value="<?php echo $user_info['email']; ?>">
<input type="submit" value="Send E-mail"><br>
<?php } ?>
</form>


<?php } ?>