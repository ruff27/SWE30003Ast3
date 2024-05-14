<!DOCTYPE html>
<html>
<head>
    <title>Foo Motor Corporation | Product</title>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width" />
	<meta name="description" content="Foo Motor Corporation Product Details Page" />
	<meta name="keywords" content="html, css, car, sales" />
	<meta name="author" content="WebsiteWizard&trade;" />
	<link href="styles/style.css" rel="stylesheet" />
</head>

<body>
    <main>
		<?php include "includes/navbar.inc" ?>

    <section class="hero-section small">
			<div class="hero-container">
			  <h1 class="headline" id="home">OUR CARS</h1>
			  <p>Product Details</p>
			</div>
		</section>

    <section id="enigma">
      <div class="container">
        <article class="main-col">
          <h2 class="article-title">Enigma</h1>
          <p>
            Foo Enigma is a sports coupe designed with agility and balance in mind. It comes standard with a <strong>7-speed manual 
            transmission</strong>, a 2.4L naturally aspirated V6 that produces <strong>227kW @ 4300 RPM</strong>, and an amazing 
            fuel efficiency of <strong>7.2L/100km.</strong>
          </p>
          <h3 class="article-sub">Design Principles</h1>
          <p>
            We've given Enigma a 50/50 weight distribution for the ultimate driving experience. It's light, at <strong>1170kg</strong>,
            nimble, and you can turn off traction control and dynamic stability at the touch of a button. It's an enthusiast's car for
            a new era. It's got enough power to challenge muscle cars and gives supercars a run for their money around corners. If
            you love driving, you'll love Enigma.
          </p>
          <h3 class="article-sub">Feature Packed</h1>
            <p>
              We didn't forget the features you love. Android Auto&trade; and Apple CarPlay&trade; are included standard, as well as
              premium safety features like lane keep assist and automatic emergency braking. Of course, nothing will get in the way of
              your driving experience - all of this is turned off, again, at the touch of a button.
            </p>
          <img src="images/product-car-1.png" alt="Picture of Enigma model">
          <p class="attrib"><a href="http://howset.com/animated_show/car-2/">Link to Image Source</a></p>  
        </article>

        <aside class="sidebar">
          <div class="dark">
            <h3>Our Philosophy</h3>
            <p>Foo Motors has always prioritized the car enthusiast market. This list of priorities has always been our promise to our customers:</p>
            <ol> <!-- Ordered list for requirement -->
              <li>Safety</li>
              <li>Fun</li>
              <li>Reliability</li>
              <li>Experience</li>
            </ol>
            <p>That last bullet point, experience, is hard to explain until you get in a Foo Motors car and its acceleration and cornering forces
              take your breath away.
            </p>
          </div>
        </aside>
      </div>
    </section>

    <section id="package" class="container"> <!-- Optional feature packages -->
      <div id="pricing-tables">
        <div class="pricing-table">
          <div class="header">
            <div class="title">LX</div>
            <div class="price">$19,990<span>driveaway</span></div>
          </div>
          <div class="features">
            <ul> <!-- Unordered lists for requirement -->
              <li>7-Speed <span>Manual</span></li>
              <li>Apple <span>CarPlay&trade;</span></li>
              <li>Smart <span>Emergency Braking</span></li>
              <li>Lane <span>Keep Assist</span></li>
            </ul>
          </div>
          <div class="signup">
            <a href="payment.php">Enquire</a>
          </div>
        </div>
        
        <div class="pricing-table featured">
          <div class="header">
            <div class="title">Sport</div>
            <div class="price">$27,990<span>driveaway</span></div>
          </div>
          <div class="features">
            <ul>
              <li>18-inch <span>Alloy Wheels</span></li>
              <li>3.0L <span> Twin Turbo</span></li>
              <li>Dual Zone <span>Climate Control</span></li>
              <li>Leather <span>Interior</span></li>
            </ul>
          </div>
          <div class="signup">
            <a href="payment.php">Enquire</a>
          </div>
        </div>
        
        <div class="pricing-table">
          <div class="header">
            <div class="title">Touring</div>
            <div class="price">$29,990<span>driveaway</span></div>
          </div>
          <div class="features">
            <ul>
              <li>Adaptive <span>Headlights</span></li>
              <li>Bose&reg; <span>Audio</span></li>
              <li>Ventilated <span>Seats</span></li>
              <li>Radar <span>Cruise Control</span></li>
            </ul>
          </div>
          <div class="signup">
            <a href="payment.php">Enquire</a>
          </div>
        </div>
      </div>
    </section>

    <section id="vertex">
      <div class="container">
        <article class="main-col">
          <h2 class="article-title">Vertex</h1>
          <p>
            Although we call it our base model, Foo Vertex is far from basic. It's a practical yet fun little hatchback that
            has all the creature comforts you'd expect from a modern family car, but is still a blast on the weekends
            with surprising speed and chuckability.
          </p>
          <h3 class="article-sub">Design Principles</h1>
          <p>
            Simplicity is the Vertex's principle. We only offer one trim level of Vertex, but it's all you'll ever need.
            With the Enigma's weight distribution and a zippy, revvy 1.8L straight-four, you'll be crafting memories on
            the best roadtrips you've ever had.
          </p>
          <h3 class="article-sub">Family Friendly</h1>
            <p>
              Five seats and space in the back, we've packed Vertex with plenty of legroom. Kids won't complain. Your partner will love
              the covert styling and you'll love its dynamic lines.
            </p>
          <img src="images/product-car-2.png" alt="Picture of Vertex model">
          <p class="attrib"><a href="http://howset.com/animated_show/car-2/">Link to Image Source</a></p>  
        </article>

        <aside class="sidebar">
            <h3>Foo Vertex Pricing</h3>
            <table id="tbl">
              <thead>
                <tr>
                  <th>Model</th>
                  <th>Feature</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>A</td>
                  <td>Manual</td>
                  <td>$17,990</td>
                </tr>
                <tr>
                  <td>B</td>
                  <td>Automatic</td>
                  <td>$18,990</td>
                </tr>
              </tbody>
            </table>
            <a class="btn btn-primary" href="payment.php">Enquire</a>
        </aside>
      </div>
    </section>
  </main>
  <?php include "includes/footer.inc" ?>
</html> 
