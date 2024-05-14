<!DOCTYPE html>
<html lang="en">
<head>
	<title>Foo Motor Corporation | Enhancements</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="keywords" content="HTML, CSS, car, sales" />
	<meta name="description" content="How the content, presentation and functionality of the website has enhanced." />
	<meta name="author" content="WebsiteWizard&trade;" />
	<link href="styles/style.css" rel="stylesheet" />
</head>
<body>
	<main>
	<?php include "includes/navbar.inc" ?>

	<section class="hero-section small">
			<div class="hero-container">
			  <h1 class="headline" id="home">Enhancements</h1>
			  <p>How We Changed The Game</p>
			</div>
		</section>
	
	<section id="enhancements">
		<div class="container">
		  <article class="main-col">
			<h2 class="article-title">Enhancements</h1>
			<p>
			  We've created a beautiful, modern website that goes above and beyond the standard of this unit.
			</p>
			<h3 class="article-sub">Responsive Design</h1>
			<p>
			  The entire site is painstakingly designed to be accessible from all devices. Specific breakpoints have been used
			  to cater to specific screen sizes at 1200px, 1024px, and 500px, and the design of the website flows attractively
			  as windows are resized. A specific example of this is on the <a href="about.html">About</a> page, where if you
			  resize the window down, the table switches into a side-scrollable mode while the Meet The Team cards flex from a
			  horizontal to vertical configuration.
			</p>
			<p>
				In addition to this, the entire navigation bar changes as the site is resized down, the logo moving over to the
				right hand side to make way for our next enhancement, a responsive burger menu.
			</p>
			<h3 class="article-sub">Animated Navigation Bar and CSS Animations</h1>
			  <p>
				We've created a burger menu, adapted from Alvaro Trigo's 
				(<a href="https://github.com/alvarotrigo">https://github.com/alvarotrigo</a>)
				work. As the website crosses the 1024px threshold, common at tablet screen sizes, the navbar at the top right
				disappears and is replaced by a burger menu, that, when clicked or tapped, utilizes a checkbox's pseudoclass
				to trigger an animation without JS.
			  </p>
			  <p>
				We've also hidden CSS animations all over the place to make the website feel alive, like the responsive buttons on
				the <a href="product.php">Product</a> page's feature cards and the sliding animation on page load on the 
				<a href="index.php">Index</a> page.
			  </p>
		  </article>
  
		  <aside class="sidebar">
			<div class="dark">
			  <h3>Why one timetable?</h3>
			  <p>
				Not every student timetable is in the About page. We wanted to make a 
				beautiful timetable that accurately used Swinburne's timeslots, and felt
				that a single large table demonstrated our capacity enough.
			  </p>
		  </aside>
		  <aside class="sidebar">
			<div class="dark">
			  <h3>Read the comments!</h3>
			  <p>
				The comments in the code have insight into both sources of some of the inspiration
				used and why we did what we did. For example, in the <a href="enquire.html">Enquire</a> 
				page, there's a comment about what we could have done with Javascript if it was allowed. 
			  </p>
		  </aside>
		</div>
	  </section>
	
	  <?php include "includes/footer.inc" ?>
</body>
</html>