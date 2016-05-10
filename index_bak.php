<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php include('__primary/head.php'); 
$total_buyers = mysql_num_rows(mysql_query("SELECT id FROM buyerlist WHERE run_status = 'complete'"));
$old_runs = mysql_num_rows(mysql_query("SELECT id FROM runs"));
$mid_runs = mysql_num_rows(mysql_query("SELECT id FROM run_list"));
$new_runs = mysql_num_rows(mysql_query("SELECT id FROM schedule"));
$run_count = ($old_runs + $mid_runs + $new_runs);

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
			<section class="home-top-clean">
				<div class="slider-container">
					<div class="slider" id="topRevolutionSlider" data-plugin-options='{"startheight": 570}'>
						<ul>
									<li data-transition="fade" data-slotamount="13" data-masterspeed="300" >

										<img src="img/header-default-bg.jpg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat" alt="No video playback capabilities" />

										<div class="tp-caption fullscreenvideo"
											data-x="0"
											data-y="0"
											data-speed="0"
											data-start="0"
											data-easing="easeOutExpo"
											data-autoplay="true"
											data-nextslideatend="true">

											<video class="video-js vjs-default-skin" autoplay loop  width="100%" height="100%">
												<source src="http://player.vimeo.com/external/101382072.hd.mp4?s=13b219905bab8d2fbb3f3a1f5b7c8c7b"  type='video/mp4;  codecs="avc1.42E01E, mp4a.40.2"'>
												<source src="http://www.mcollett.com/wcm.ogv"  type='video/ogg;  codecs="theora, vorbis"'>
											</video>

										</div>
									</li>
						</ul>
					</div>
				</div>
			
					<div class="container">
					<section class="call-to-action secundary featured footer">
						<div class="row">
							<div class="center">
								<h3>The clock is <strong>ticking</strong>. Get your rewards <strong>today</strong>! <a href="buy" class="btn btn-lg btn-primary">Buy Now!</a> <a href="howitworks" class="btn btn-lg btn-success">How It Works</a></h3>
							</div>
						</div>
					</section>
					</div>
			</section>
			
			<div class="container">
			<div class="row featured-boxes">
						<div class="col-md-3">
							<div class="featured-box featured-box-primary">
								<div class="box-content">
									<i class="icon-featured icon icon-trophy"></i>
									<h4>The Best, No Exceptions</h4>
									<p>Yeah we know, everyone says this. The difference is we can prove it. Our website shows 100% honest and accurate statistics and reviews from all of our customers. It also helps that we have been in business since November 2012.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="featured-box featured-box-primary">
								<div class="box-content">
									<i class="icon-featured icon icon-plane"></i>
									<h4>America? Europe? Done.</h4>
									<p>Australia? Horde? Alliance? Also done. We service both American (including Oceanic) and European realms; Horde and Alliance. All of our services can be performed cross-realm. So stop bashing your face into a wall and join us for a run. You wont regret it.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="featured-box featured-box-primary">
								<div class="box-content">
									<i class="icon-featured icon icon-search"></i>
									<h4>Transparency</h4>
									<p>Unlike anyone else, we are completely transparent. (Except when it comes to disclosing sensitive information -- that's locked away and secure.) You have your own private client area with many features, and can watch your boost via a private live stream.<br><br></p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="featured-box featured-box-primary">
								<div class="box-content">
									<i class="icon-featured icon icon-clock-o"></i>
									<h4>24 Hour Promise</h4>
									<p>We have a plethora of ways to be contacted, even by phone! Simply pick the method you find most convenient and we’ll contact you ASAP. If we fail to give you a response in 24 hours after you have attempted all methods you'll be compensated. Rest assured we'll never have to pay up.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

					<hr class="invisible" />

			
			<div class="container">

					<div class="row">
						<div class="col-md-6">
							<h2>Preparing for the future in <strong>Draenor</strong>.</h2>
							<div class="video-container youtube">
								<iframe frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/bi19NSsmSz4?showinfo=0&amp;wmode=opaque"></iframe>
							</div>

						</div>
						<div class="col-md-6">
							<div class="recent-posts">
								<h2>Recent <strong>Blog</strong> Posts</h2>
								<div class="row">
									<div class="owl-carousel" data-plugin-options='{"items": 1}'>
										<div>
											<div class="col-md-12">
											<?php $get_blog_posts = mysql_query("SELECT * FROM blog ORDER BY id DESC LIMIT 3");
											while ($blog_posts = mysql_fetch_array($get_blog_posts)) { ?>
												<article>
													<div class="date">
														<span class="day"><?php echo date("d", $blog_posts['date']); ?></span>
														<span class="month"><?php echo date("M", $blog_posts['date']); ?></span>
													</div>
													<h4><a href="post?story=<?php echo $blog_posts['id']; ?>"><?php if (strlen($blog_posts['title']) > 40) { echo substr($blog_posts['title'], 0, 40); echo "..."; } else { echo $blog_posts['title']; } ?></a></h4>
													<p><?php if (strlen($blog_posts['story']) > 200) { echo substr($blog_posts['story'], 0, 200); echo "..."; } else { echo $blog_posts['story']; } ?> <a href="post?story=<?php echo $blog_posts['id']; ?>" class="read-more">read more <i class="icon icon-angle-right"></i></a></p>
												</article>
											<?php } ?>
											</div>
									</div>
								</div>
							</div>
						</div>
						</div>

					</div>

				</div>
				
				<hr class="tall invisible" />
			
			<section class="featured highlight footer">
					<div class="container">
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
					</div>
				</section>

			</div>
<?php include('__primary/foot.php'); ?>

	</body>
</html>
