<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php include('__primary/head.php'); ?>
	<body>

		<div class="body">
			<?php include('__primary/nav.php'); ?>

			<div role="main" class="main">

				<section class="page-top">
					<div class="slider-container">
						<div class="slider page-top-slider" data-plugin-options='{"startheight": 280}'>
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
									<li class="active">Blizzcon 2014 Giveaway</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>Blizzcon 2014 Giveaway</h2>
							</div>
						</div>
					</div>
				</section>

				<div class="container">
				
				<?php if ($_GET['msg'] == "thanks") { ?>
				<p>
				<div class="alert alert-success">
					<strong>Success!</strong> You have been entered. <u>Check our Twitter, Facebook, and your e-mail on September 23rd to see if you won, or if the winner claimed it!</u>
				</div>
				</p>
				<?php } ?>

					<center><img src="img/contestover.png"></center><br><br>
				
				
						</div>
					</div>

				</div>

			</div>

<?php include('__primary/foot.php'); ?>

	</body>
	<script>
$("div#enter").hide();
</script>
<script>
$(document).ready(function(){
  $("button#enter").click(function(){
    $("div#enter").toggle();
  });
});
</script>
</html>
