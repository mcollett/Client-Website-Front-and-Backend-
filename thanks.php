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
									<li class="active">Thanks</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>Order Complete</h2>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<h2><strong>Thank You</strong> Your order is complete.</h2>

					<div class="row">
						<div class="col-md-12">
							<?php if (@$_GET['mail'] == "sent") { ?>
							<div class="alert alert-success">
								<strong>E-mail sent!</strong> Be sure to check out the client area!
							</div>
							<?php } ?>
						
							<form action="_actions/sendemail.php?tID=<?php echo $_GET['tID']; ?>" method="POST">
							<input type="hidden" name="transid" value="<?php echo $_GET['tID']; ?>">
							<button href="#" type="submit" class="btn btn-info btn-icon">Click Here to Receieve Your Order Confirmation via E-mail</button>
							</form>
							<hr />
							
							<?php if (@$_GET['tID']) { ?>
							<blockquote>
							Your Transaction ID is: <font color="#000000"><?php echo $_GET['tID']; ?></font>
								<cite>Write this number down. Or make sure to e-mail yourself your receipt.</cite></p>
							</blockquote>
							<?php } ?>

							<h4>Last Minute Checklist</h4>
							<ul class="list icons list-unstyled">
								<li><i class="icon icon-check"></i> <b>Check out the client area. Many resources are there to make your experience much more smooth. Use your transaction ID to login.</b></li>
								<li><i class="icon icon-check"></i> Ensure you have all heroic dungeons completed. <i>This is a requirement to enter the instance on challenge mode difficulty.</i></li>
								<li><i class="icon icon-check"></i> Ensure you have all required consumables listed on the product page.</li>
								<li><i class="icon icon-check"></i> Try to maximize your characters gear the best you can. You don't have to do this, but doing so can significantly cut down on wait time and the run time.</li>
								<li><i class="icon icon-check"></i> Add us on Skype: wowchallengemodes (We should add you, but it's always best to be proactive.)</li>
							</ul>
							
							<hr />

						<p>Thanks again for choosing us to help you avoid the headache of a bad experience. We take great pride in giving you a great customer experience. If you have any questions, comments, or suggestions along the way please let us know. We want you to feel secure and stress free in our hands as the thousands before you have done.</p>
				
						</div>
					</div>

				</div>

			</div>

<?php include('__primary/foot.php'); ?>

	</body>
</html>
