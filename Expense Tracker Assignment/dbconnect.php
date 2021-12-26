<?php
    $servername = "localhost";
    $user_name = "root";
    $password = "";
    $dbname = "expensetracker";

    $connection = mysqli_connect("localhost","root","","expensetracker");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>