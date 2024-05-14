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
    
	$order_status=$_POST['order_status'];
    echo $order_status;
    
	mysqli_query($conn, "update `orders` set order_status='$order_status' where order_id='$id'") {

	header('location:manager.php');
?>