<?php
include "connection.php";
session_start();

if(isset($_GET['itemid'])){
		$itemid = $_GET['itemid'];
		$cartid = $_GET['cartid'];
		$cqnt = $_GET['cqnt'];
		$ulid = $_SESSION['user_id'];

		$q1 = "DELETE FROM cart_table WHERE USER_ID='$ulid' AND ITEM_ID='$itemid' AND CART_ID='$cartid'";
		$res1 = mysqli_query($conn, $q1);

		if($res1){
			echo "<script LANGUAGE='JavaScript'>
					window.alert('Item Removed From Your Cart!!');
					window.location.href='checkout.php';
					</script>";
		}
}
?>