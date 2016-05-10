<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php if (@$_GET['story'] == NULL) { header("Location: blog"); } ?>
<?php include('__primary/head.php'); ?>
<?php $storyid = $_GET['story']; $get_story = mysql_query("SELECT * FROM blog WHERE id = '$storyid'");
while ($storycon = mysql_fetch_array($get_story)) { 
	$title = $storycon['title'];
	$image = $storycon['image'];
	$date = $storycon['date'];
	$author = $storycon['author'];
	$content = $storycon['story'];
} ?>
	<body>

		<div class="body">
			<?php include('__primary/nav.php'); ?>

			<div role="main" class="main">

				<section class="page-top-blog">
					<div class="container">
						<div class="row">
							<div class="col-md-9">

								<article class="post post-large blog-single-post">

									<div class="post-content">

										<h2><a><?php echo $title; ?></a></h2>

										<div class="post-meta">
											<span><i class="icon icon-calendar"></i> <?php echo date("F jS Y", $date); ?> </span>
											<span><i class="icon icon-user"></i> By <?php echo $author; ?> </span>
										</div>
									</div>
								</article>

							</div>
							<div class="col-md-3">

								<div class="post-share">
									<h5>Share this post <i class="icon icon-share"></i></h5>

									<ul class="post-share-icons">
										
									</ul>

								</div>

							</div>
						</div>
					</div>
				</section>


				<div class="container">

					<div class="row">
						<div class="col-md-9">
							<div class="blog-posts single-post">

								<article class="post post-large blog-single-post">
									<div class="post-content">

									<?php echo nl2br($content); ?>

										</div>
								</article>

							</div>
						</div>

						<div class="col-md-3">
							<aside class="sidebar">

								<div class="tabs">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#recentPosts" data-toggle="tab">Recent</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="recentPosts">
											<ul class="simple-post-list">
											<?php $get_blog_posts = mysql_query("SELECT id, title, date FROM blog ORDER BY id DESC LIMIT 1, 10");
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
