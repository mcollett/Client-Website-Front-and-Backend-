<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php include('__primary/head.php'); session_start(); ?>
<?php if ($_GET['id']=="pilot") { $item = "Challenge Mode Gold Package: Pilot"; $price = "105.00"; $_SESSION['Product'] = "Pilot"; $db_qname = "pilot"; } ?>
<?php if ($_GET['id']=="self") { $item = "Challenge Mode Gold Package: Self-Play"; $price = "175.00"; $_SESSION['Product'] = "Self Play"; $db_qname = "selfplay"; } ?>
<?php if ($_GET['id']=="greenfire") { $item = "Warlock Green Fire"; $price = "40.00"; $_SESSION['Product'] = "Green Fire"; $db_qname = "greenfire"; } ?>
<?php if ($_GET['id']=="realmfirst") { $item = "Challenge Mode Realm First Title"; $price = "200.00"; $_SESSION['Product'] = "Realm First"; $db_qname = "realmfirst"; } 

if ($_GET['id']=="pilot") { $num_reviews = mysql_num_rows(mysql_query("SELECT id FROM reviews WHERE package = '$db_qname' AND approval = 'approved'")); $get_avg = mysql_query("SELECT AVG(rating) FROM reviews WHERE package = '$db_qname' AND approval = 'approved'"); $avg_rev = mysql_result($get_avg,0); $avg_rev = round($avg_rev, 0); }
if ($_GET['id']=="self") { $num_reviews = mysql_num_rows(mysql_query("SELECT id FROM reviews WHERE package = '$db_qname' AND approval = 'approved'")); $get_avg = mysql_query("SELECT AVG(rating) FROM reviews WHERE package = '$db_qname' AND approval = 'approved'"); $avg_rev = mysql_result($get_avg,0); $avg_rev = round($avg_rev, 0); }
if ($_GET['id']=="greenfire") { $num_reviews = mysql_num_rows(mysql_query("SELECT id FROM reviews WHERE package = '$db_qname' AND approval = 'approved'")); $get_avg = mysql_query("SELECT AVG(rating) FROM reviews WHERE package = '$db_qname' AND approval = 'approved'"); $avg_rev = mysql_result($get_avg,0); $avg_rev = round($avg_rev, 0); }
if ($_GET['id']=="realmfirst") { $num_reviews = mysql_num_rows(mysql_query("SELECT id FROM reviews WHERE package = '$db_qname' AND approval = 'approved'")); $get_avg = mysql_query("SELECT AVG(rating) FROM reviews WHERE package = '$db_qname' AND approval = 'approved'"); $avg_rev = mysql_result($get_avg,0); $avg_rev = round($avg_rev, 0); }

?>
	<body>

		<div class="body">
			<?php include('__primary/nav.php'); ?>

			<div role="main" class="main shop">

				<div class="container">

					<div class="row">
						<div class="col-md-6">
							<?php if ((@$_GET['id'] == "pilot")||(@$_GET['id'] == "self")) { ?>
							<div class="owl-carousel" data-plugin-options='{"items": 1, "transitionStyle": "fadeUp", "autoHeight": true, "autoPlay": true}'>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-1.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-2.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-3.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-4.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-5.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-6.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-7.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-8.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-9.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-10.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-11.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-12.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-13.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-14.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-15.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-16.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-17.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/wep-18.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/mount-wod.jpg">
								</div>
							</div>
							<?php } ?>
							<?php if ((@$_GET['id'] == "greenfire")) { ?>
							<div class="owl-carousel" data-plugin-options='{"items": 1, "transitionStyle": "fadeUp", "autoHeight": true, "autoPlay": true}'>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/greenfire.jpg">
								</div>
								<div>
									<img alt="" class="img-responsive img-rounded" src="img/products/greenfire2.jpg">
								</div>
							</div>
							<?php } ?>
						</div>

						<div class="col-md-6">

							<div class="summary entry-summary">

								<h2 class="shorter"><strong><?php echo $item; ?></strong></h2>

								<div class="review_num">
									<span class="count" itemprop="ratingCount"><?php echo $num_reviews; ?></span> reviews
								</div>

								<div class="star-rating" title="<?php echo $avg_rev; ?> out of 5 stars">
									<?php $blank_stars = (5 - $avg_rev); ?>
									<?php echo str_repeat('<i style="color:#e36159;" class="icon icon icon-star"></i>', $avg_rev); ?><?php echo str_repeat('<i style="color:#E0DADF;" class="icon icon icon-star"></i>', $blank_stars); ?>
								</div>

								<?php if (@$_POST['code']) {
									$codetry = mysql_real_escape_string($_POST['code']);
									$get_code = mysql_query("SELECT * FROM coupons WHERE code = '$codetry'");
										while ($get_code_value = mysql_fetch_array($get_code)) {
											$code_value = $get_code_value['discount'];
										}
									if (mysql_num_rows($get_code) == 1) { $price = ($price - $code_value); $code_result = "yes"; } else { $code_result = "no"; }
								}
								?>
								<form action="product?id=<?php echo @$_GET['id']; ?>" method="post">
								<div id="discount">
									<div class="quantity">
									<input class="input-text discount text" pattern=".{3,}" required title="3 characters minimum" type="text" name="code">
									</div>
									<button href="#" type="submit" class="btn btn-info btn-icon">Apply Discount Code</button>
									<?php if (@$code_result=="yes") { ?>
									<p>
										<div class="alert alert-success">
											<strong>Discount applied!</strong> You just saved $<?php echo @$code_value; ?>.
										</div>
									</p>
									<?php $discount_code = $_POST['code']; } ?>
									<?php if ((@$code_result=="no")) { ?>
									<p>
										<div class="alert alert-danger">
											<strong>Uh oh.</strong> Discount code not found.
										</div>
									</p>
									<?php $_SESSION['Referral_Code'] = ""; } ?>
									</form>
								</div>
																
								<hr />
								
								
								<p class="price">
									<span class="amount">$<?php $price = round($price, 2); echo $price; ?></span><br>
									<?php if (@$_GET['id'] !== "greenfire") { ?><button id="discount" class="btn btn-info btn-xs">Have Discount Code?</button><?php } ?>
								</p>
								
								<p class="taller">
								<?php if ($_GET['id'] == "pilot") { ?> Checkout now using PayPal, credit, or debit card. <?php } ?>
								<?php if ($_GET['id'] == "self") { ?> Checkout now using PayPal, credit, or debit card. <?php } ?>
								<?php if ($_GET['id'] == "greenfire") { ?> Hey there, this is James from wowchallengemodes.com, it looks like you're interested in purchasing a green fire run! I have done the green fire boss on many characters and I can assure you, you are in good hands. Please read the description and requirements. When you are ready please purchase using the link below. Do not hesitate to ask us any questions or concerns you might have on Skype or the website live chat. <?php } ?>
								<?php if ($_GET['id'] == "realmfirst") { ?> Checkout now using PayPal, credit, or debit card. <?php } ?>
								</p>

								
									<div class="quantity">
										<input type="number" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1" disabled>
									</div>
									
									<?php $temp_tID = substr(rand(), 0, 7); ?>
																	
									<form action="_actions/start_transaction.php?t=<?php echo $temp_tID; ?>" method="post">
										<input type="hidden" name="ident" value="<?php echo $temp_tID; ?>">
										<input type="hidden" name="price" value="<?php echo $price; ?>">
										<input type="hidden" name="product" value="<?php echo $item; ?>">
										<input type="hidden" name="discountcode" value="<?php echo $discount_code; ?>">
									<button type="submit" id="submit" class="btn btn-primary btn-icon">Buy Now</button>
									</form>								
									
										
									
								

							</div>


						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="tabs tabs-product">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#productDescription" data-toggle="tab">Description</a></li>
									<li><a href="#productReq" data-toggle="tab">Requirements</a></li>
									<li><a href="#productReviews" data-toggle="tab">Reviews (<?php echo $num_reviews; ?>)</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="productDescription">
										<?php if ($_GET['id'] == "pilot") { ?> <p>Looking to obtain the rewards with the least amount of hassle? The piloted package is for you! Sit back, relax, and enjoy the private stream as one of our highly skilled staff members plays your character through the challenge modes.  After checkout make sure you fill out the character form or you won’t be in our planner. If you are not redirected please contact us as soon as possible via Skype, live chat, e-mail, or phone and we will provide you with a link. Common questions about the piloted package are answered on the FAQ page.</p> <?php } ?>
										<?php if ($_GET['id'] == "self") { ?> <p>Looking to obtain the rewards and experience the content for yourself? The self-play package is for you! Group up with our team as they smash through the challenge modes in less than two hours.  After checkout make sure you fill out the character form or you won’t be in our planner. If you are not redirected please contact us as soon as possible via Skype, live chat, e-mail, or phone and we will provide you with a link. Common questions about the piloted package are answered on the FAQ page.</p> <?php } ?>
										<?php if ($_GET['id'] == "greenfire") { ?> <p>This is the page to order James's green fire service. After purchasing I will immediately contact you through Skype or you preferred method of contact and check in no matter what I am currently doing. Due to this being a solo encounter I am available to do it instantly with no wait time unless I am currently tanking a challenge mode run in which case I will get to it right after or whenever is convenient for you. I will be privately live streaming the entire process for you and you alone, from login until the boss's death. After purchasing you will be redirected to fill out a short form so I have your contact details and character information but NOT account login information. I will get this from you right before doing your green fire run. Thanks for reading, and if you have any questions at all please message me on Skype or the website live chat.</p> <?php } ?>
										<?php if ($_GET['id'] == "realmfirst") { ?> <p>stuff</p> <?php } ?>
									</div>
									<div class="tab-pane" id="productReq">
										<table class="table table-striped push-top">
											<tbody>
												<?php if ($_GET['id'] == "greenfire") { ?> 
												<tr>
													<th>
														Gear:
													</th>
													<td>
														500+ iLvL (PvE or PvP gear); if lower it mostly likely can still be done just contact us first to check.
													</td>
												</tr>
												<tr>
													<th>
														Flasks:
													</th>
													<td>
														1 Flask of the Warm Sun
													</td>
												</tr>
												<tr>
													<th>
														Quest Progression:
													</th>
													<td>
														 Must be on last part of quest chain, which is fighting Kanrethad (the large green demon) on the roof of Black Temple. 
													</td>
												</tr>
												<tr>
													<th>
														Authenticator:
													</th>
													<td>
														If applicable: You <b>DO NOT</b> need to remove your authenticator for this service.
													</td>
												</tr>
												<?php } ?>
												<?php if (($_GET['id'] == "pilot")||($_GET['id'] == "self")||($_GET['id'] == "realmfirst")) { ?>
												<tr>
													<th>
														Gear:
													</th>
													<td>
														630+ iLvL Item <u>In Every Slot</u>
													</td>
												</tr>
												<tr>
													<th>
														Potions:
													</th>
													<td>
														10 Invisibility Potions
													</td>
												</tr>
												<tr>
													<th>
														Flasks:
													</th>
													<td>
														3 Flasks
													</td>
												</tr>
												<tr>
													<th>
														Heroic Dungeons:
													</th>
													<td>
														Heroic dungeons are no longer a requirement to enter challenge modes! Yay!
													</td>
												</tr>
												<tr>
													<th>
														Authenticator:
													</th>
													<td>
														If applicable: You <b>DO NOT</b> need to remove your authenticator for this service.
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
									<div class="tab-pane" id="productReviews">
										<ul class="comments">
											<?php if ($_GET['id']=="pilot") { $pkgtype = "pilot"; } if ($_GET['id']=="self") { $pkgtype = "selfplay"; } if ($_GET['id']=="greenfire") { $pkgtype = "greenfire"; }
											$rcheck = mysql_num_rows(mysql_query("SELECT id FROM reviews WHERE package = '$pkgtype' AND approval = 'approved'")); ?>
											<?php if ($rcheck == 0) { ?>
											<div class="alert alert-danger">
												<strong>No reviews have been left yet.</strong> Be the first! Purchase today and tell us how we did afterwards.
											</div>
											<?php } ?>
											<?php 
											$get_reviews = mysql_query("SELECT * FROM reviews WHERE package = '$pkgtype' AND approval = 'approved' ORDER BY id DESC LIMIT 20");
											while ($review_data = mysql_fetch_array($get_reviews))
											{ ?>
											<li>
												<div class="comment">
													<div class="img-thumbnail">
														<img class="avatar" alt="" src="img/icons/<?php echo $review_data['char_class']; ?>.png">
													</div>
													<div class="comment-block">
														<div class="comment-arrow"></div>
														<span class="comment-by">
															<strong><?php echo $review_data['char_spec']; ?> <?php echo $review_data['char_class']; ?></strong>
															<span class="pull-right">
																<?php // fuck me here ?>
																<div class="star-rating" title="<?php echo $review_data['rating']; ?> out of 5 stars">
																	<?php $blank_stars = (5 - $review_data['rating']); ?>
																	<?php echo str_repeat('<i style="color:#e36159;" class="icon icon icon-star"></i>', $review_data['rating']); ?><?php echo str_repeat('<i style="color:#E0DADF;" class="icon icon icon-star"></i>', $blank_stars); ?>
																</div>
															</span>
														</span>
														<p><?php echo nl2br($review_data['comments']); ?></p>
													</div>
												</div>
											</li>
											<?php } ?>
										</ul>
										
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>

<?php include('__primary/foot.php'); ?>

<?php if (@$_POST['code']==NULL) { ?>
<script>
$("div#discount").hide();
</script>
<?php } ?>
<script>
$(document).ready(function(){
  $("button#discount").click(function(){
    $("div#discount").toggle();
  });
});
</script>
<script>
$("#products").owlCarousel({

// Most important owl features

//Autoplay
autoPlay : 5000,
stopOnHover : false
}) 
</script>
	</body>
</html>
