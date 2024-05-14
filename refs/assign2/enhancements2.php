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
			  <h1 class="headline" id="home">Enhancements 2</h1>
			  <p>Mastery of PHP</p>
			</div>
		</section>
	
	<section id="enhancements">
		<div class="container">
		  <article class="main-col">
			<h2 class="article-title">PHP Enhancements</h1>
			<p>
			  We've shown our ability to use PHP at a high level for server-side and back-end design.
			</p>
			<h3 class="article-sub">Architecting RDBMS tables with MySQL</h1>
			<p>
			    The team created three tables linked with primary and foreign keys for more powerful queries and joins. In this way, we have
                created a flexible and intuitive system that uses the relational nature of MySQL to its fullest. 
			</p>
			<p>
				We created one table for customers, and another reference table for our products, each joined to the orders database with a unique 
                primary key. This is visible in the Relations tab of the phpMyAdmin GUI of our Feenix database.
			</p>
            <h3 class="article-sub">Complex Joins</h1>
			<p>
			    The team used plenty of complex SQL queries in an attempt to improve the inner workings and back-end of the website. We took full advantage
                of our use of multiple tables to streamline the codebase.
			</p>
		  </article>
          
  
		  <aside class="sidebar">
			<div class="dark">
			  <h3>Slim Features</h3>
			  <p>
				We were running out of time near the end of the unit, and a few of us contracted COVID around the same time, so we did the best with what we 
                had to deal with. Where tasks were more time-consuming, we chose to slim it down and demonstrate the more important features.
			  </p>
		  </aside>
		</div>
	  </section>
	
	  <?php include "includes/footer.inc" ?>
</body>
</html>