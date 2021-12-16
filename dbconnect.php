<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "expensetrackerapp";
    // If you have not set database password on localhost then set empty.
    $connection = mysqli_connect("localhost","root","","expensetrackerapp");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>