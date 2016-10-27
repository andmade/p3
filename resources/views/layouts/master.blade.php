<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>@yield("title", "andmade | p3")</title>
		<!--CSS-->
		<link href="https://fonts.googleapis.com/css?family=Cabin:400,700,700i%7CDosis:200,400,700%7CNTR" rel="stylesheet">
		<link rel="stylesheet" href="/css/foundation.min.css" />
		<link rel="stylesheet" href="/css/p3.css">
		
		<!-- Javascript -->
		<script src="https://code.jquery.com/jquery-2.2.3.min.js" type="text/javascript"></script>
		<script src="/js/vendor/foundation.min.js" type="text/javascript"></script>
		@yield("head")
	</head>
	<body>
		<header id="mainHeader">
			<div class="media-object">
				<div class="media-object-section align-self-bottom">
					<a href="/"><img src="/img/aperture_logo.png" alt="Website logo, in the shape of a camera lens"/></a>
				</div>
				<div class="media-object-section main-section">
					<h1>APERTURE</h1>
					<h2 id="subtitle">webdev enrichment center</h2>
					<h2 id="tagline">We get the science done, so you can do the testing</h2>
				</div>
				<nav class="top-bar-right" >
					<ul class="dropdown menu no-js" data-dropdown-menu>
						<li class="is-dropdown-submenu-parent no-js">
							<a href="#">Menu</a>
							<ul class="menu">
								<li><a href="/">Home</a></li>
								<li><a href="/gladosipsum">GLaDOS Ipsum</a></li>
								<li><a href="/usergen">Test Subject Gen</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</header>
		
		@yield("content")
		
		<footer>
			<p>&copy; andmade {{ date('Y') }}</p>
		</footer>
		<script>
		$(document).foundation();
		</script>
		@yield("body")
	</body>
</html>