<!DOCTYPE html>
<html lang="en">
<head>
	<title>Foo Motor Corporation | About Us</title>
    <meta charset="utf-8" />
    <meta name="description" content="About Us" />
	<meta name="author" content="WebsiteWizard&trade;" />
	<meta name="keywords" content="html, css, car, corporation, about, history, team" />
    <link href="styles/style.css" rel="stylesheet" />
</head>
<body>
	<main>
		<?php include "includes/navbar.inc" ?>
	
		<section class="hero-section small">
			<div class="hero-container">
			  <h1 class="headline" id="home">ABOUT US</h1>
			  <p>Meet The Team</p>
			</div>
		</section>

		<section id="team">
    		<div class="team-container container">
				<!--Owen's Profile-->
				<div class="team-member">
					<figure class="team-figure">
						<img class="team-image" src="images/team/owen.jpg" alt="Photo of Owen" />
						<figcaption>Design Lead</figcaption>
					</figure>
					<dl>
						<dt>Name</dt>
						<dd>Owen Bartley</dd>
						<dt>Student ID</dt>
						<dd>104001858</dd>
						<dt>Course</dt>
						<dd>Bachelor of Computer Science</dd>
						<dt>E-mail</dt>
						<dd>104001858@student.swin.edu.au</dd>
					</dl>
					<a class="btn btn-primary" href="mailto:104001858@student.swin.edu.au">Contact</a>
				</div>
				<!--Tamjid's Profile-->
				<div class="team-member">
					<figure class="team-figure">
						<img class="team-image" src="images/team/tamjid.jpeg" alt="Photo of Tamjid" />
						<figcaption>Design Team</figcaption>
					</figure>
					<dl>
						<dt>Name</dt>
						<dd>Tamjid Mostafa</dd>
						<dt>Student ID</dt>
						<dd>104067423</dd>
						<dt>Course</dt>
						<dd>Bachelor of Computer Science</dd>
						<dt>E-mail</dt>
						<dd>104067423@student.swin.edu.au</dd>
					</dl>
					<a class="btn btn-primary" href="mailto:104067423@student.swin.edu.au">Contact</a>
				</div>
			</div>
			<div class="team-container container">
				<!--Ruffin's Profile-->
				<div class="team-member">
					<figure class="team-figure">
						<img class="team-image" src="images/team/ruffin.jpg" alt="Photo of Ruffin" />
						<figcaption>Content Team</figcaption>
					</figure>
					<dl>
						<dt>Name</dt>
						<dd>Ruffin Remad</dd>
						<dt>Student ID</dt>
						<dd>103840173</dd>
						<dt>Course</dt>
						<dd>Bachelor of Computer Science</dd>
						<dt>E-mail</dt>
						<dd>103840173@student.swin.edu.au</dd>
					</dl>
					<a class="btn btn-primary" href="mailto:103840173@student.swin.edu.au">Contact</a>
				</div>
				<!--Jerrome's Profile-->
				<div class="team-member">
					<figure class="team-figure">
						<img class="team-image" src="images/team/jerrome.jpg" alt="Photo of Jerrome" />
						<figcaption>Team Leader</figcaption>
					</figure>
					<dl>
						<dt>Name</dt>
						<dd>Jerrome Yong</dd>
						<dt>Student ID</dt>
						<dd>101286759</dd>
						<dt>Course</dt>
						<dd>Bachelor of Computer Science</dd>
						<dt>E-mail</dt>
						<dd>104067423@student.swin.edu.au</dd>
					</dl>
					<a class="btn btn-primary" href="mailto:101286759@student.swin.edu.au">Contact</a>
				</div>
			</div>
    	</section>

		<section id="table-section">
			<h2 id="timetable-title">Jerrome Yong's Timetable</h2>
			<div class="table-container container">
				<table class="timetable">
					<thead>
						<tr>
							<th></th>
							<th>Mon</th>
							<th>Tues</th>
							<th>Wed</th>
							<th>Thurs</th>
							<th>Fri</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th rowspan="2">8AM</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td rowspan="2" class="inq">COS10026<br>Live Online 1</td>
							<td></td>
							<td rowspan="4" class="oop">COS20007<br>Lab 1</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">9AM</th>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">10AM</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td rowspan="4" class="inq">COS10026<br>Workshop 1</td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">11AM</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td rowspan="2" class="oop">COS20007<br>Live Online 1</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">12PM</th>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td rowspan="2" class="inq">COS10026<br>Seminar 1</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">1PM</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">2PM</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">3PM</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">4PM</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td rowspan="4" class="cloud">COS20019<br>Lab 1</td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">5PM</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">6PM</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td rowspan="3" class="cloud">COS20019<br>Live Online 1</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th rowspan="2">7PM</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>

	</main>
	
	<?php include "includes/footer.inc" ?>
</body>
</html>