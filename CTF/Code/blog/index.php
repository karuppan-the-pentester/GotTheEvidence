<?php

session_start();
include '../database.php';
$user_id = $_SESSION['userid'];
if ($user_id == NULL) {
  header("Location: ../login/");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="assets/img/favicon.ico">
	<title>TypeMe</title>
	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Fonts -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="assets/css/mediumish.css" rel="stylesheet">
</head>

<body>

	<!-- Begin Nav
================================================== -->
	<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
			data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container">
			<!-- Begin Logo -->
			<a class="navbar-brand" href="index.html">
				<img src="assets/img/logo.png" alt="logo">
			</a>
			<!-- End Logo -->
			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<!-- Begin Menu -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.html">Stories <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://github.com/karuppan-the-pentester">Post</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="author.html">Author</a>
					</li>
				</ul>
				<!-- End Menu -->
			</div>
		</div>
	</nav>
	<!-- End Nav
================================================== -->

	<!-- Begin Site Title
================================================== -->
	<div class="container">
		<div class="mainheading">
			<h1 class="sitetitle">TypeMe</h1>
			<p class="lead">
				Umbrella Blog Site
			</p>
		</div>
		<!-- End Site Title
================================================== -->

		<!-- Begin Featured
	================================================== -->
		<section class="featured-posts">
			<div class="section-title">
				<h2><span>Featured</span></h2>
			</div>
			<div class="card-columns listfeaturedtag">

				<!-- begin post -->
				<div class="card">
					<div class="row">
						<div class="col-md-5 wrapthumbnail">
							<a href="./post.php">
								<div class="thumbnail" style="background-image:url(assets/img/demopic/1.jpg);">
								</div>
							</a>
						</div>
						<div class="col-md-7">
							<div class="card-block">

							<a href="./post.php"><h2 class="card-title">The Dark Secrets of Bio-Weapons Research</h2></a>
								<h4 class="card-text">Discover the sinister experiments, ethical violations, and monstrous creations that defined this notorious entity in the Resident Evil series.</h4>
								<div class="metafooter">
									<div class="wrapfooter">
										<span class="meta-footer-thumb">
											<a href="author.html"><img class="author-thumb"
													src="./assets/img/author.png"
													alt="Sal"></a>
										</span>
										<span class="author-meta">
											<span class="post-name"><a href="author.html">David Grey</a></span><br />
											<span class="post-date">22 July 2024</span><span class="dot"></span><span
												class="post-read">6 min read</span>
										</span>
										<span class="post-read-more"><a href="https://github.com/karuppan-the-pentester" title="Read Story"><svg
													class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
													<path
														d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"
														fill-rule="evenodd"></path>
												</svg></a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end post -->

				<!-- begin post -->
				<div class="card">
					<div class="row">
						<div class="col-md-5 wrapthumbnail">
							<a href="./post.php">
								<div class="thumbnail" style="background-image:url(assets/img/demopic/2.jpg);">
								</div>
							</a>
						</div>
						<div class="col-md-7">
							<div class="card-block">
								<a href="./post.php"><h2 class="card-title">A Legacy of Fear and Corruption</a></a>
								</h2>
								<h4 class="card-text">Explore the tumultuous history of Umbrella Corporation, the infamous pharmaceutical company from the Resident Evil series.</h4>
								<div class="metafooter">
									<div class="wrapfooter">
										<span class="meta-footer-thumb">
											<a href="author.html"><img class="author-thumb"
													src="./assets/img/author.png"
													alt="Sal"></a>
										</span>
										<span class="author-meta">
											<span class="post-name"><a href="author.html">David Grey</a></span><br />
											<span class="post-date">22 July 2017</span><span class="dot"></span><span
												class="post-read">6 min read</span>
										</span>
										<span class="post-read-more"><a href="https://github.com/karuppan-the-pentester" title="Read Story"><svg
													class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
													<path
														d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"
														fill-rule="evenodd"></path>
												</svg></a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end post -->

				

			</div>
		</section>
		<!-- End Featured
	================================================== -->

		

		<!-- Begin Footer
	================================================== -->
		<div class="footer">
			<p class="pull-left">
				Copyright &copy; 2024
			</p>
			<p class="pull-right">
				Developed by <a target="_blank" href="https://www.github.com/Destro-Sec">Destro-Sec</a>
			</p>
			<div class="clearfix">
			</div>
		</div>
		<!-- End Footer
	================================================== -->

	</div>
	<!-- /.container -->

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
		integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
		crossorigin="anonymous"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>