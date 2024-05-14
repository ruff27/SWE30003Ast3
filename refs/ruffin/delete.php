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
	mysqli_query($conn,"delete from `orders` where order_id='$id'");
	header('location:manager.php');
?>