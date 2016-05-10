<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php include('__primary/head.php'); ?>
<?php 
$total_buyers = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status = 'complete'"));
$old_runs = mysql_num_rows(mysql_query("SELECT id FROM runs"));
$mid_runs = mysql_num_rows(mysql_query("SELECT id FROM run_list"));
$new_runs = mysql_num_rows(mysql_query("SELECT id FROM schedule"));
$run_count = ($old_runs + $mid_runs + $new_runs);

$dks = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Death Knight'"));
$druids = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Druid'"));
$hunters = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Hunter'"));
$mages = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Mage'"));
$monks = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Monk'"));
$paladins = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Paladin'"));
$priests = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Priest'"));
$rogues = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Rogue'"));
$shaman = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Shaman'"));
$warlocks = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Warlock'"));
$warriors = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE character_class = 'Warrior'"));

$pilots = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE playtype = 'pilot'"));
$selfs = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE playtype = 'selfplay'"));

$x_pilots = round((($pilots / $total_buyers ) * 100), 2);
$x_selfs = round((($selfs / $total_buyers ) * 100), 2);

$usa = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE geography = 'US'"));
$eu = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE geography = 'EU'"));

$x_usa = round((($usa / $total_buyers ) * 100), 2);
$x_eu = round((($eu / $total_buyers ) * 100), 2);

$ally = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE faction = 'Alliance'"));
$horde = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE faction = 'Horde'"));

$x_ally = round((($ally / $total_buyers ) * 100), 2);
$x_horde = round((($horde / $total_buyers ) * 100), 2);

$x_dk = round((($dks / $total_buyers ) * 100), 2);
$x_druids = round((($druids / $total_buyers ) * 100), 2);
$x_hunters = round((($hunters / $total_buyers ) * 100), 2);
$x_mages = round((($mages / $total_buyers ) * 100), 2);
$x_monks = round((($monks / $total_buyers ) * 100), 2);
$x_paladins = round((($paladins / $total_buyers ) * 100), 2);
$x_priests = round((($priests / $total_buyers ) * 100), 2);
$x_rogues = round((($rogues / $total_buyers ) * 100), 2);
$x_shaman = round((($shaman / $total_buyers ) * 100), 2);
$x_warlocks = round((($warlocks / $total_buyers ) * 100), 2);
$x_warriors = round((($warriors / $total_buyers ) * 100), 2);

function dateDiff($start, $end) {
  $start_ts = strtotime($start);
  $end_ts = strtotime($end);
  $diff = $end_ts - $start_ts;
  return round($diff / 86400);
}

 ?>
	<body>

		<div class="body">
			<?php include('__primary/nav.php'); ?>

			<div role="main" class="main">

				<section class="page-top">
					<div class="slider-container">
						<div class="slider page-top-slider" data-plugin-options='{"startheight": 250}'>
							<ul>
								<li data-transition="fade" data-slotamount="1" data-masterspeed="300">

									<?php include('__primary/bcimage.php'); ?>

								</li>
							</ul>
						</div>
					</div>
					<div class="page-top-info with-slider container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="index">Home</a></li>
									<li class="active">Statistics</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>Statistics</h2>
							</div>
						</div>
					</div>
				</section>

				<div class="container">
				
				<div class="col-md-12">
				<center><h2>Transparency, unparalleled. All data is dynamic and updated in real time.</h2></center>
				</div>
				
				<hr class="tall" />
				
				<div class="col-md-12">
				
				<div class="row center counters">
						<div class="col-md-3">
							<strong data-to="<?php echo $total_buyers + 2000; ?>">0</strong>
							<label>Clients</label>
						</div>
						<div class="col-md-3">
							<strong data-to="<?php echo dateDiff("2012-11-18", date('Y-m-d'));  ?>">0</strong>
							<label>Days in Business</label>
						</div>
						<div class="col-md-3">
							<strong data-to="<?php echo $run_count + 237; ?>">0</strong>
							<label>Runs Complete</label>
						</div>
						<div class="col-md-3">
							<strong data-to="0">0</strong>
							<label>Hassle</label>
						</div>
					</div>
					

					<hr class="tall" />
					
					</div>
					
					<div class="col-md-6">

							<h2>Class Breakdown</h2>
									<div class="progress-bars">
										<div class="progress-label">
											<span>Death Knight (<font color="black"><b><?php echo $x_dk; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-deathknight" data-appear-progress-animation="<?php echo $x_dk; ?>%">
												
											</div>
										</div>
										<div class="progress-label">
											<span>Druid (<font color="black"><b><?php echo $x_druids; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Druid" data-appear-progress-animation="<?php echo $x_druids; ?>%">
												
											</div>
										</div>
										<div class="progress-label">
											<span>Hunter (<font color="black"><b><?php echo $x_hunters; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Hunter" data-appear-progress-animation="<?php echo $x_hunters; ?>%">
												
											</div>
										</div>
										<div class="progress-label">
											<span>Mage (<font color="black"><b><?php echo $x_mages; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Mage" data-appear-progress-animation="<?php echo $x_mages; ?>%">
												
											</div>
										</div>
										<div class="progress-label">
											<span>Monk (<font color="black"><b><?php echo $x_monks; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Monk" data-appear-progress-animation="<?php echo $x_monks; ?>%">
												
											</div>
										</div>
										<div class="progress-label">
											<span>Paladin (<font color="black"><b><?php echo $x_paladins; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Paladin" data-appear-progress-animation="<?php echo $x_paladins; ?>%">
												
											</div>
										</div>
										<div class="progress-label">
											<span>Priest (<font color="black"><b><?php echo $x_priests; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Priest" data-appear-progress-animation="<?php echo $x_priests; ?>%">
												
											</div>
										</div>
										<div class="progress-label">
											<span>Rogue (<font color="black"><b><?php echo $x_rogues; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Rogue" data-appear-progress-animation="<?php echo $x_rogues; ?>%">
												
											</div>
										</div>
										<div class="progress-label">
											<span>Shaman (<font color="black"><b><?php echo $x_shaman; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Shaman" data-appear-progress-animation="<?php echo $x_shaman; ?>%">
												
											</div>
										</div>
										<div class="progress-label">
											<span>Warlock (<font color="black"><b><?php echo $x_warlocks; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Warlock" data-appear-progress-animation="<?php echo $x_warlocks; ?>%">
												
											</div>
										</div>
										<div class="progress-label">
											<span>Warrior (<font color="black"><b><?php echo $x_warriors; ?>%</b></font>)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Warrior" data-appear-progress-animation="<?php echo $x_warriors; ?>%">
												
											</div>
										</div>
								</div>
								
												
				</div>
				
				<div class="col-md-6">
					<h2>Package & Region Breakdown</h2>
				
					<div class="progress-bars">
										<div class="progress-label">
											<span>Pilot</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Pilot" data-appear-progress-animation="<?php echo $x_pilots; ?>%">
												<span class="progress-bar-tooltip"><?php echo $x_pilots; ?>%</span>
											</div>
										</div>
										<div class="progress-label">
											<span>Self-Play</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Self" data-appear-progress-animation="<?php echo $x_selfs; ?>%">
												<span class="progress-bar-tooltip"><?php echo $x_selfs; ?>%</span>
											</div>
										</div>
										<hr />
										<div class="progress-label">
											<span>North America (US + Oceanic)</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-US" data-appear-progress-animation="<?php echo $x_usa; ?>%">
												<span class="progress-bar-tooltip"><?php echo $x_usa; ?>%</span>
											</div>
										</div>
										<div class="progress-label">
											<span>Europe</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-EU" data-appear-progress-animation="<?php echo $x_eu; ?>%">
												<span class="progress-bar-tooltip"><?php echo $x_eu; ?>%</span>
											</div>
										</div>
										<hr />
										<div class="progress-label">
											<span>Alliance</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Alliance" data-appear-progress-animation="<?php echo $x_ally; ?>%">
												<span class="progress-bar-tooltip"><?php echo $x_ally; ?>%</span>
											</div>
										</div>
										<div class="progress-label">
											<span>Horde</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-Horde" data-appear-progress-animation="<?php echo $x_horde; ?>%">
												<span class="progress-bar-tooltip"><?php echo $x_horde; ?>%</span>
											</div>
										</div>
								</div>
				
				</div>
				
				
				
				</div>
				<hr class="tall" />

<?php include('__primary/foot.php'); ?>

	</body>
</html>
