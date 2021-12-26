<?php

include 'dbconnect.php';

session_start();
error_reporting(0);
$user_id = $_SESSION['user_id'];

$sql = "SELECT category, SUM(amount)  AS Amount FROM activities WHERE user_id=$user_id AND type='expense' GROUP BY category";

$result = mysqli_query($connnection, $sql);

$details = array();

foreach ($result as $row) {
    $details[] = array(
        'category' => $row["category"],
        'amount' => $row["Amount"],
        'color' => '#' . rand(100000, 999999) . ''
    );
}

echo json_encode($details);



?>