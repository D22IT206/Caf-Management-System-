<?php
include "connection.php";
session_start();

if(isset($_GET['id'])){
	$itemid = $_GET['id'];
	$ulid = $_SESSION['user_id'];

	$q6 = "SELECT * FROM cart_table WHERE USER_ID='$ulid' AND ITEM_ID='$itemid' AND status=0";
	$res6 = mysqli_query($conn, $q6);
	$n = mysqli_num_rows($res6);
	if($n==0){

		$q4 = "INSERT INTO cart_table(USER_ID, ITEM_ID, QUANTITY, STATUS) VALUES ('$ulid','$itemid',1, 0)";
		$res4 = mysqli_query($conn, $q4);

		if($res4){
			echo "<script LANGUAGE='JavaScript'>
			window.alert('Item added to cart successfully.');
			window.location.href=document.referrer;
			</script>";
		}
		else{
			echo "<script LANGUAGE='JavaScript'>
			window.alert('Error Occured Please Try Again!!');
			window.location.href=document.referrer;
			</script>";
		}
	}
	else{
		echo "<script LANGUAGE='JavaScript'>
			window.alert('Item already added to your cart.');
			window.location.href='checkout.php';
			</script>";
	}
}

?>