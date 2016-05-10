<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php include('__primary/head.php'); session_start(); ?>
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
									<li class="active">Client</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>Client Area</h2>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-3">
							<aside class="sidebar">
							
								<?php if (@!$_SESSION['transID']) { ?>

								<h5>Tools</h5>
								<ul class="nav nav-list primary push-bottom">
									<li><a style="opacity:0.3;">Home</a></li>
									<li><a style="opacity:0.3;">Message Center</a></li>
									<li><a style="opacity:0.3;">Check Heroics</a></li>
									<li><a style="opacity:0.3;">Request a Refund</a></li>
									<li><a style="opacity:0.3;">Leave a Review</a></li>
								</ul>
								
								<?php } else { ?>
								
								<h5>Tools</h5>
								<ul class="nav nav-list primary push-bottom">
									<li><a href="client">Home</a></li>
									<li><a href="?page=messages">Message Center</a></li>
									<li><a href="?page=heroics">Check Heroics</a></li>
									<li><a href="?page=refund">Request a Refund</a></li>
									<li><a href="?page=review">Leave a Review</a></li>
								</ul>
								
								<?php } ?>
								
								<?php if (@$_GET['page']==NULL) { ?>
								<hr />
								
								<h5>Notice</h5>
								<p>If any data is missing or incorrect, please send us a message via the message center.</p>
								
								<?php } ?>

							</aside>
						</div>
						<div class="col-md-9">
						
						<?php if (@!$_SESSION['transID']) { ?>
						<h2><strong>Client</strong> Area</h2>

							<div class="row">
								<div class="col-md-12">
									<p class="lead">
										Details regarding your purchase are here. Additionally, there are many tools to contact us and make your overall experience much more smooth. Take a look around!
									</p>
								</div>
							</div>
							
							<hr />
							
							<div class="alert alert-danger">
								You must be logged in with your transaction ID to view the client area. Please enter it below.
							</div>
							
							<form action="-client_data/_verify.php" method="post">
								<div class="row">
									<div class="form-group">
										<div class="col-md-8">
											<label>Transaction ID:</label>
											<input type="text" value="" maxlength="100" class="form-control" name="transID" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<input type="submit" value="Enter Client Area" class="btn btn-primary" data-loading-text="Loading...">
									</div>
								</div>
							</form>
							
							<hr class="tall" />
							
							Your transaction number is (or will be) provided in a confirmation e-mail upon completing your purchase. If you did not receieve a confirmation e-mail please check your spam folder or contact us.
							<?php } ?>

							<?php if ((@$_GET['page']==NULL)&&(@$_SESSION['transID'])) { include('-client_data/client_home.php'); } ?>
							<?php if (@$_GET['page']=="messages") { include('-client_data/client_messages.php'); } ?>
							<?php if (@$_GET['page']=="heroics") { include('-client_data/client_heroics.php'); } ?>
							<?php if (@$_GET['page']=="refund") { include('-client_data/client_refund.php'); } ?>
							<?php if (@$_GET['page']=="review") { include('-client_data/client_review.php'); } ?>
							<?php if (@$_GET['page']=="new_message") { include('-client_data/client_newmsg.php'); } ?>
							<?php if (@$_GET['page']=="view_message") { include('-client_data/client_viewmsg.php'); } ?>

						</div>

					</div>

				</div>

			</div>

<?php include('__primary/foot.php'); ?>

	</body>
</html>
