<?php

include "dbconnect.php"; 
$id = $_GET['id']; 
$remove = mysqli_query($connection,"remove from activities where activity_id = '$id'"); 

if($remove)
{
    //Closing Connection
    mysqli_close($connection);
    header("location:activities.php");
    exit;	
}
else
{
    echo "<script>alert('Error removing record')</script>";

}
?>