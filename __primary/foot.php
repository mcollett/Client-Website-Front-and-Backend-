			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<p>WoW Challenge Modes was unoffically started in mid November 2012 and became an officially registered LLC in early January of 2013. <a href="aboutus" class="btn-flat btn-xs">View More <i class="icon icon-arrow-right"></i></a></p>
							<div class="contact-details">
								<ul class="contact">
									<li><p><i class="icon icon-phone"></i> <strong>Phone:</strong> +1 (865) 766-4258</p></li>
									<li><p><i class="icon icon-skype"></i> <strong>Skype:</strong> <a>wowchallengemodes</a></p></li>
									<li><p><i class="icon icon-envelope-o"></i> <strong>Email:</strong> <a>contact@wowchallengemodes.com</a></p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<h4>Recent Posts</h4>
							<ul class="nav nav-list primary">
							<?php $get_blog_posts = mysql_query("SELECT * FROM blog ORDER BY id DESC LIMIT 0, 5");
										while ($blog_posts = mysql_fetch_array($get_blog_posts)) { ?>
								<li><a href="post?story=<?php echo $blog_posts['id']; ?>" title="<?php if (strlen($blog_posts['title']) > 30) { echo substr($blog_posts['title'], 0, 30); echo "..."; } else { echo $blog_posts['title']; } ?>"><?php if (strlen($blog_posts['title']) > 30) { echo substr($blog_posts['title'], 0, 30); echo "..."; } else { echo $blog_posts['title']; } ?></a></li>
								<?php } ?>
							</ul>

							<a href="blog" class="btn-flat pull-right btn-xs view-more-recent-work">View Blog <i class="icon icon-arrow-right"></i></a>

						</div>
						<div class="col-md-3">
							<h4>Recent Tweets</h4>
							<div id="tweet" class="twitter" data-account-id="wowcmodes">
								<p>Please wait...</p>
							</div>
						</div>
						<div class="col-md-3">
							<h4>Random CM Set</h4>
							<?php $cmsets = array("dk", "druid", "hunter", "mage", "monk", "paladin", "priest", "rogue", "shaman", "warlock", "warrior"); $set = $cmsets[array_rand($cmsets)]; ?>
							<img class="img-rounded img-responsive" src="img/products/<?php echo $set; ?>.png" width="100%" height="100%">

							<a href="buy" class="btn-flat pull-right btn-xs view-more-recent-work">Buy Now <i class="icon icon-arrow-right"></i></a>

						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<p>Copyright © 2014. All Rights Reserved.</p>
							</div>
							<div class="col-md-6">
								<ul class="social-icons">
									<li><a href="http://www.twitter.com/wowcmodes" target="_blank" rel="tooltip" title="Twitter"><i class="icon icon-twitter"></i></a></li>
									<li><a href="http://www.facebook.com/wowcmodes" target="_blank" rel="tooltip" title="Facebook"><i class="icon icon-facebook"></i></a></li>
									<li><a href="http://www.instagram.com/wowcmodes" target="_blank" rel="tooltip" title="Instagram"><i class="icon icon-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Libs -->
		<script src="vendor/jquery.js"></script>
		<script src="js/plugins.js"></script>
		<script src="vendor/jquery.easing.js"></script>
		<script src="vendor/jquery.appear.js"></script>
		<script src="vendor/jquery.cookie.js"></script>
		
		<script src="vendor/bootstrap.js"></script>
		<script src="vendor/masonry.js"></script>
		<script src="vendor/twitterjs/twitter.js"></script>
		<script src="vendor/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
		<script src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="vendor/owl-carousel/owl.carousel.js"></script>
		<script src="vendor/magnific-popup/magnific-popup.js"></script>
		<script src="vendor/jquery.knob.js"></script>
		<script src="vendor/jquery.stellar.js"></script>
		<script src="vendor/jquery.validate.js"></script>
		<script src="vendor/isotope/jquery.isotope.js"></script>

		<!-- Current Page Scripts -->
		<script src="js/views/view.home.js"></script>

		<!-- Theme Initializer -->
		<script src="js/theme.js"></script>

		<!-- Custom JS -->
		<script src="js/custom.js"></script>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-44832405-1', 'wowchallengemodes.com');
		  ga('send', 'pageview');

		</script>
		
		<script type='text/javascript'>(function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://widget.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({ c: '9f3ec4a9-649f-454e-928c-be009be7b32f', f: true }); done = true; } }; })();</script>