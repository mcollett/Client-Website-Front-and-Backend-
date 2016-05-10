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
									<li class="active">Order Confirmation</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>Order Confirmation</h2>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<h2><strong>Confirm</strong> Your Order</h2>

					<div class="row">
						<div class="col-md-12">
							<h4>You are about to be redirected to PayPal for payment. Please take a moment to review your order and acknowledge important details.</h4>
							<?php include('_sql/sqlcon.php'); $temp_tID = $_GET['t']; ?>
							<?php $get_td = mysql_query("SELECT * FROM transactions WHERE ident = '$temp_tID'"); while ($td = mysql_fetch_array($get_td)) { $price = $td['price']; $item = $td['product']; } ?>
							
							<blockquote>
								<p><b>Product</b>: <?php echo $item; ?></p>
								<p><b>Price</b>: $<?php echo ($price + 5); ?> USD <font style="font-size:10px;">($<?php echo $price; ?> +$5 PayPal Fee)</font></p>
							</blockquote>

							<p><span class="alternative-font">You do <u>not</u> need a PayPal account to order. Choose checkout as guest or pay with a debit or credit card if you do not have a PayPal account.</span></p>
							
							<p>Your order (run) does not begin immediately. Please allow us time to process and contact you to schedule a date and time.</p>
							
							<?php if ($item == "Warlock Green Fire") { ?>
							
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<pre><input type="checkbox" name="confirmed" value="Yes" required> I acknowledge that after payment I must wait to be redirected back to wowchallengemodes.com to enter my contact information.</pre>
								<input type="hidden" name="cmd" value="_xclick" />
								<input type="hidden" name="business" value="jwoodbury11@gmail.com" />
								<input type="hidden" name="item_name" value="<?php echo $item; ?>" />
								<input type="hidden" name="amount" value="<?php echo ($price + 5); ?>" />
								<input type="hidden" name="no_shipping" value="1" />
								<input type="hidden" name="cn" value="Comments" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="lc" value="US" />
								<input type="hidden" name="return" value="http://www.wowchallengemodes.com/finalize?t=<?php echo $temp_tID; ?>" />
								<p><br><button type="submit" id="submit" class="btn btn-primary btn-icon">Proceed to Payment</button></p>
						</form>
							
							<?php } else { ?>
							
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<pre><input type="checkbox" name="confirmed" value="Yes" required> I acknowledge that after payment I must wait to be redirected back to wowchallengemodes.com to enter my contact information.</pre>
								<input type="hidden" name="cmd" value="_xclick" />
								<input type="hidden" name="business" value="payment@wowchallengemodes.com" />
								<input type="hidden" name="item_name" value="<?php echo $item; ?>" />
								<input type="hidden" name="amount" value="<?php echo ($price + 5); ?>" />
								<input type="hidden" name="no_shipping" value="1" />
								<input type="hidden" name="cn" value="Comments" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="lc" value="US" />
								<input type="hidden" name="return" value="http://www.wowchallengemodes.com/finalize?t=<?php echo $temp_tID; ?>" />
								<p><br><button type="submit" id="submit" class="btn btn-primary btn-icon">Proceed to Payment</button></p>
						</form>
						
						<?php } ?>
							
						</div>
					</div>

				</div>

			</div>

<?php include('__primary/foot.php'); ?>

	</body>
</html>
