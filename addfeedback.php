<?php 
include 'connection.php';
session_start();

if(isset($_POST['formsubmit'])){
    $lgid=$_SESSION['user_id'];
    $item=$_POST['item'];
    $rate=$_POST['rating'];
    $message=$_POST['message'];
    
    $q="INSERT INTO feedback(USER_ID, ITEM_ID, RATING, COMMENT) VALUES ('$lgid','$item','$rate','$message')";
    $ans=mysqli_query($conn,$q);
    if($ans){
      echo "<script>window.location.href='feedback.php?flag=1'</script>";
    }
    else{
      echo "<script>window.location.href='feedback.php?flag=0'</script>";
    }
}

?>