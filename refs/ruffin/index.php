<!DOCTYPE html>
<html lang="en">
<head>
	<title>Foo Motor Corporation | Index</title>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width" />
	<meta name="description" content="Foo Motor Corporation | Home Page" />
	<meta name="keywords" content="html, css, car, corporation, home, index" />
	<meta name="author" content="WebsiteWizard&trade;" />
	<link href="styles/style.css" rel="stylesheet" />
</head>
<body>
	<main>
		<?php include "includes/navbar.inc" ?>

    	<?php include "includes/header.inc" ?>

		<!--General article-style section-->
		<section id="frontpage-info">
			<div class="info-wrapper container">
				<div class="frontpage-text">
					<h2>The Future of Combustion</h2>
					<p>
						We've brought combustion into the 21st century with 
						hyper-efficient engines that work smart, not hard. <br>
						Foo Motors aims to drive a sustainable future which
						enthusiasts and environmentalists alike can enjoy.
					</p>
					<a href="about.php" class="btn btn-primary">About Us</a>
				</div>
				<div class="frontpage-info-img">
					<img src="images/engine.jpeg" alt="engine" />
					<!-- Taken by Mike B | Used under CC0 license-->
				</div>
			</div>
		  </section>

		<section id="video">
			<div class="video-container container">
				<h2>Team Video</h2>
				<iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
				title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; 
				clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<!-- RICKROLL -->
			</div>
		</section>
    	
		
  	</main>
	<?php include "includes/footer.inc" ?>
</body>
</html>