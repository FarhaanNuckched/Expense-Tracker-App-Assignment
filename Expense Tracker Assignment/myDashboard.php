<!DOCTYPE html>
<html lang="en">
  <header>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </header>
  <body>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<?php
  
include ('dbconnect.php');
session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT SUM(amount) FROM activities WHERE user_id=$user_id AND type='expense';";
$result = mysqli_query($connection, $sql);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $expense = $row['SUM(amount)'];
}

$sql = "SELECT SUM(amount) FROM activities WHERE user_id=$user_id AND type='income';";
$result = mysqli_query($connection, $sql);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $income = $row['SUM(amount)'];
}

$balance = $income - $expense;

$sql = "SELECT * FROM activities WHERE user_id=$user_id ORDER BY activity_id DESC LIMIT 5;";
$table_result = mysqli_query($connnection, $sql);
        
?>


    <div class="container-fluid">
        <!-- <div class="row  flex-column flex-md-row"> -->
        <div class="row">
            <nav class="col-12 col-md-3 col-xl-2 p-0 bg-primary ">
                <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top " id="sidebar">
                    <div class="text-center p-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" />
                        <a href="account.php" class="navbar-brand mx-0 font-weight-bold  text-nowrap"> <?php echo $_SESSION["username"]; ?></a>
                    </div>
                    <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-last" id="nav">
                        <ul class="navbar-nav flex-column w-100 justify-content-center">
                            <li class="nav-item">
                                <a href="myDashboard.php" class="nav-link active"> Dashboard </a>
                            </li>
                            <li class="nav-item">
                                <a href="activities.php" class="nav-link"> Activities </a>
                            </li>
                            <li class="nav-item">
                                <a href="LogOut.php" class="nav-link"> Log out </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </nav>
            <main class="col-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-header">Expense</div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $expense; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-header">Income</div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $income; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-header">Balance</div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $balance; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-header">Total Expenses</div>
                                <div class="card-body">
                                    <div class="chart-container pie-chart">
                                        <canvas id="doughnut_chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">Recent Activities</div>
                                <div class="card-body">
                                    <div class="">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($table_result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['date'] . "</td>";
                                                    echo "<td>" . $row['category'] . "</td>";
                                                    echo "<td>" . $row['type'] . "</td>";
                                                    echo "<td>" . $row['amount'] . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
</html>