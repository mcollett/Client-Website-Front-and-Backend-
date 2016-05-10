<?php include('../_sql/connect.php'); ?>
<?php $run_id = $_GET['run_id']; ?>

<title>Modifying Run</title>
<?php $get_run_details = mysql_query("SELECT * FROM schedule WHERE id='$_GET[run_id]'");
		while ($run_details = mysql_fetch_array($get_run_details)) { ?>
		
Run #<?php echo $run_id; ?> - <?php echo $run_details['region']; ?>-<?php echo $run_details['faction']; ?><br>
Scheduled for: <?php echo date("l, F jS - h:i A", $run_details['timestamp']); ?><br><br>

<?php if ($_GET['action'] == "tank") { ?> Client: <?php echo $run_details['tank_id']; ?><br> <?php } ?>
<?php if ($_GET['action'] == "tank") { ?> Played by: <?php echo $run_details['staff_tank_id']; ?><br><br> <?php } ?>
		
<?php } ?>

Modifying: <?php echo $_GET['action']; ?>