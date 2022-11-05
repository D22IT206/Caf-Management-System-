<?php
	$conn =mysqli_connect('localhost','root','');
	if(!$conn)
	{
		echo 'Server connection not successful';
	}
	
	$db = mysqli_select_db($conn,'cafems');
	if(!$db)
	{
		echo 'Database connection not successful';
	}
?>