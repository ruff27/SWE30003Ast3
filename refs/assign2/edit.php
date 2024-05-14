<!-- Adapted from www.sourcecodester.com -->

<?php
if(!isset($_SERVER['HTTP_REFERER'])) {
    header('Location: '.'index.php');
}

	require_once('settings.php');

    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd, $sql_db
    );

	$id=$_GET['id'];
	$query=mysqli_query($conn,"select order_status from `orders` where order_id='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Editing</title>
</head>
<body>
	<h2>Edit</h2>
	<form method="POST" action="update.php?id=<?php echo $id; ?>">
		<label>Order Status:</label>
        <select id="order_status" name="order_status" value="order_status" > 
            <option value="PENDING" selected="selected">Pending</option>
            <option value="FULFILLED">Fulfilled</option>
            <option value="PAID">Paid</option>
            <option value="ARCHIVED">Archived</option>
        </select>
		<input type="submit" name="submit">
		<a href="manager.php">Back</a>
	</form>
</body>
</html>