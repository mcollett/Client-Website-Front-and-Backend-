<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php include('__primary/head.php'); ?>
	<body>

		<div class="body">
			<?php include('__primary/nav.php'); ?>

			<div role="main" class="main">

				<div class="container">

					<div class="row">
						<div class="col-md-9">
							<div class="blog-posts">

								<?php $get_blog_posts = mysql_query("SELECT * FROM blog ORDER BY id DESC LIMIT 0, 10");
										while ($blog_posts = mysql_fetch_array($get_blog_posts)) { ?>
								<article class="post post-medium">
									<div class="row">

										<div class="col-md-5">
											<div class="post-image single">
												<img class="img-thumbnail" src="<?php echo $blog_posts['image']; ?>" alt="">
											</div>
										</div>
										<div class="col-md-7">
											<div class="post-content">

												<h2><a href="post?story=<?php echo $blog_posts['id']; ?>"><?php if (strlen($blog_posts['title']) > 30) { echo substr($blog_posts['title'], 0, 30); echo "..."; } else { echo $blog_posts['title']; } ?></a></h2>
												<?php if (strlen($blog_posts['story']) > 400) { echo substr($blog_posts['story'], 0, 400); echo "..."; } else { echo $blog_posts['story']; } ?>

											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="post-meta">
												<span><i class="icon icon-calendar"></i> <?php echo date("F jS Y", $blog_posts['date']); ?> </span>
												<span><i class="icon icon-user"></i> By <a><?php echo $blog_posts['author']; ?></a> </span>
												<a href="post?story=<?php echo $blog_posts['id']; ?>" class="btn btn-xs btn-primary pull-right">Read more...</a>
											</div>
										</div>
									</div>
								</article>
									<?php } ?>

								

							</div>
						</div>

						<div class="col-md-3">
							<aside class="sidebar">

								<div class="tabs">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#recentPosts" data-toggle="tab">Older</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="recentPosts">
											<ul class="simple-post-list">
											<?php $get_blog_posts = mysql_query("SELECT id, title, date FROM blog ORDER BY id DESC LIMIT 11, 20");
											while ($blog_posts = mysql_fetch_array($get_blog_posts)) { ?>
												<li>
													<div class="post-info">
														<a href="post?story=<?php echo $blog_posts['id']; ?>"><?php if (strlen($blog_posts['title']) > 30) { echo substr($blog_posts['title'], 0, 30); echo "..."; } else { echo $blog_posts['title']; } ?></a>
														<div class="post-meta">
															 <?php echo date("F jS Y", $blog_posts['date']); ?>
														</div>
													</div>
												</li>
												<?php } ?>
												<?php if (mysql_num_rows($get_blog_posts) == 0) { echo "No older stories, yet..."; } ?>
											</ul>
										</div>
										
									</div>
								</div>
								
							</aside>
						</div>
					</div>

				</div>

			</div>

<?php include('__primary/foot.php'); ?>

	</body>
</html>
