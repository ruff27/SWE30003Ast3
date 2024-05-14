<?php
	require_once("settings.php");
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);
	//Checks if connection is succesful
	if(!$conn){
		echo "<p>Database connection failure</p>";
	}

	
	if(isset($_POST["namesearch"])){
		$valueToSearch = $_POST["namesearch"];
		$query = "SELECT o.order_id, c.fname, c.lname, o.product_id, p.model, 
		p.package, o.order_qty, o.order_cost, o.order_time, o.order_status 
		FROM orders AS o
		INNER JOIN customer AS c
		ON o.email = c.email
		INNER JOIN product as p
		ON o.product_id = p.product_id
		WHERE CONCAT(fname, lname) LIKE '%".$valueToSearch."%'";
		$search_result = filterTable($conn, $query);
	} else {
		$query = "SELECT o.order_id, c.fname, c.lname, o.product_id, p.model, 
		p.package, o.order_qty, o.order_cost, o.order_time, o.order_status 
		FROM orders AS o
		INNER JOIN customer AS c
		ON o.email = c.email
		INNER JOIN product as p
		ON o.product_id = p.product_id";
		$search_result = filterTable($conn, $query);
	}

	function filterTable($conn, $query){
		$filter_result = mysqli_query($conn, $query);
		return $filter_result;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Foo Motor Corporation | Manage</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="keywords" content="HTML, CSS, car, sales" />
	<meta name="description" content="Manager's Order report and Order Update page" />
	<meta name="author" content="WebsiteWizard&trade;" />
	<link href="styles/style.css" rel="stylesheet" />
</head>
<body>
	<?php include "includes/navbar.inc" ?>
	<section class="hero-section small">
		<div class="hero-container">
			  <h1 class="headline" id="home">Management</h1>
			  <p>Orders at your fingertips.</p>
			</div>
	</section>
	
	<section id="orders">
		<div class="container form-container">
			<form action="manager.php" method="post">
				<fieldset>
					<legend>Name</legend>
					<input type="text" name="namesearch">
					<button class="btn btn-primary" type="submit" name="search">Search</button>
				</fieldset>
				<?php
				echo "<table >\n";
				echo "<tr>\n "
				."<th scope=\"col\">Order Number</th>\n " 
				."<th scope=\"col\">First Name</th>\n "
				."<th scope=\"col\">Last Name</th>\n "
				."<th scope=\"col\">Product ID</th>\n "
				."<th scope=\"col\">Model Name</th>\n "
				."<th scope=\"col\">Package Option</th>\n "
				."<th scope=\"col\">Qty</th>\n "
				."<th scope=\"col\">Cost</th>\n "
				."<th scope=\"col\">Order Date</th>\n "
				."<th scope=\"col\">Order Status</th>\n "
				."<th scope=\"col\">Administration</th>\n "
				."</tr>\n ";
				
				while($row = mysqli_fetch_array($search_result)) {
					echo "<tr>\n";
					echo "<td>", $row['order_id'], "</td>";
					echo "<td>", $row['fname'], "</td>";
					echo "<td>", $row['lname'], "</td>";
					echo "<td>", $row['product_id'], "</td>";
					echo "<td>", $row['model'], "</td>";
					echo "<td>", $row['package'], "</td>";
					echo "<td>", $row['order_qty'], "</td>";
					echo "<td> $ ", $row['order_cost'], "</td>";
					echo "<td>", $row['order_time'], "</td>";
					echo "<td>", $row['order_status'], "</td>";
					echo "<td> <a href=\"edit.php?id=", $row['order_id'], "\">Edit </a>";
					if($row['order_status'] == "PENDING"){
						echo "<a href=\"delete.php?id=", $row['order_id'], "\">Delete</a>";
					}
					echo "</td>";
					echo "</tr>\n";
				}
				echo "</table>\n";
				mysqli_free_result($search_result);

				
			?>
			</form>
		</div>
	</section>
	<?php include "includes/footer.inc" ?>
</body>
</html>