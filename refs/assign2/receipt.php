<?php session_start(); 
if(!isset($_SERVER['HTTP_REFERER'])) {
    header('Location: '.'index.php');
}

function get_value($mysqli, $sql) { // written by jbrahi: https://stackoverflow.com/users/471291/jbrahy
    $result = mysqli_query($mysqli, $sql);
    $value = mysqli_fetch_array($result, MYSQLI_NUM);
    return is_array($value) ? $value[0] : "";
}
?>

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

    	<?php include "includes/header-small.inc" ?>

        <?php
        
        require_once('settings.php');
        $conn = @mysqli_connect($host , $user , $pwd , $sql_db);
        
        if(!$conn)
        echo "<p>Data connection failure</p>";
        else{
            $sql_table="orders";
            $insert= "SELECT order_id, order_time, order_status, order_cost FROM $sql_table ORDER BY order_id DESC";
            $result = mysqli_query($conn, $insert);
            $id = mysqli_fetch_assoc($result);
        } ?> 

        <section id="receipt">
		<div class="container">
		  <article class="main-col">
			<h2 class="article-title">Receipt</h1>
			<p>
			  Thank you, <strong> <?php echo $_SESSION["fname"] . " " . $_SESSION["lname"]. "."?> </strong>
			</p>
			<h3 class="article-sub">Customer Information</h1>
            <p> First Name: <?php echo(get_value($conn, "select fname from customer where email = '" . $_SESSION["email"] . "'"))?></p>
			<p> Last Name: <?php echo(get_value($conn, "select lname from customer where email = '" . $_SESSION["email"] . "'"))?></p>
            <p> Email: <?php echo $_SESSION["email"]?></p>
            <p> Street Address: <?php echo(get_value($conn, "select address from customer where email = '" . $_SESSION["email"] . "'"))?> </p>
            <p> Suburb: <?php echo(get_value($conn, "select suburb from customer where email = '" . $_SESSION["email"] . "'"))?></p>
            <p> State: <?php echo(get_value($conn, "select state from customer where email = '" . $_SESSION["email"] . "'"))?></p>
            <p> Postcode: <?php echo(get_value($conn, "select postcode from customer where email = '" . $_SESSION["email"] . "'"))?></p>
            <p> Phone Number: <?php echo(get_value($conn, "select phone from customer where email = '" . $_SESSION["email"] . "'"))?> </p>
            <p> Contact Preference: <?php echo(get_value($conn, "select prefcontact from customer where email = '" . $_SESSION["email"] . "'"))?></p>

			<h3 class="article-sub">Order Information</h1>
            <p> Model: <?php echo(get_value($conn, "select model from product 
                inner join orders on orders.product_id = product.product_id 
                where email = '" . $_SESSION["email"] . "'"))?></p>
            <p> Order Cost: $<?php echo(get_value($conn, "select order_cost from orders where email = '" . $_SESSION["email"] . "'"))?></p>
            <p> Order ID: <?php echo(get_value($conn, "select order_id from orders where email = '" . $_SESSION["email"] . "'"))?></p>
            <p> Order Status: <?php echo(get_value($conn, "select order_status from orders where email = '" . $_SESSION["email"] . "'"))?></p>
            <p> Order Time: <?php echo(get_value($conn, "select order_time from orders where email = '" . $_SESSION["email"] . "'"))?></p>

            <!-- No credit card info is shown for security reasons. -->
		  </article>
		</div>
	    </section>

    </main>

    <?php include "includes/footer.inc" ?>
</html>