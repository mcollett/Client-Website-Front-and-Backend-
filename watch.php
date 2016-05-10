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
									<li class="active">Watch</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>Watch</h2>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<h2>Your Challenge Mode Run <strong>Live</strong></h2>

					<div class="row">
						<div class="col-md-12">
							
							<object type="application/x-shockwave-flash" 
									height="675" 
									width="1200" 
									id="live_embed_player_flash" 
									data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=jessiesgurl" 
									bgcolor="#000000">
							  <param  name="allowFullScreen" 
									  value="true" />
							  <param  name="allowScriptAccess" 
									  value="always" />
							  <param  name="allowNetworking" 
									  value="all" />
							  <param  name="movie" 
									  value="http://www.twitch.tv/widgets/live_embed_player.swf" />
							  <param  name="flashvars" 
									  value="hostname=www.twitch.tv&channel=jessiesgurl&auto_play=true&start_volume=10" />
							</object>
							
						</div>
					</div>

				</div>

			</div>

<?php include('__primary/foot.php'); ?>

	</body>
</html>
