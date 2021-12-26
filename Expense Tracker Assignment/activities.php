<?php
include 'dbconnect.php';

session_start();
error_reporting(0);
$user_id = $_SESSION['user_id'];


if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $date = date("Y-m-d", strtotime($_POST['date']));
    $categories = array('Salary', 'Food', 'Clothing', 'Rent', 'Miscellaneous');
    $category = $categories[$_POST['category']];
    $amount = $_POST['Amount'];
    $id = $_SESSION['user_id'];

    $sql = "INSERT INTO activities (date, type, amount, category, user_id) VALUES ('$date', '$type', '$amount', '$category', '$user_id')";
    $result = mysqli_query($connection, $sql);
}

$sql = "SELECT * FROM activities WHERE user_id=$id ORDER BY activity_id DESC;";
$table_result = mysqli_query($connection, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    

<div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-12 col-md-3 col-xl-2 p-0 bg-primary ">
                <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top " id="sidebar">
                    <div class="text-center p-3">
                        <img src="https://www.kindpng.com/picc/m/490-4904536_user-3d-icon-png-transparent-png.png" alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" width="50%" height="50%" />
                        <a href="account.php" class="navbar-brand mx-0 font-weight-bold  text-nowrap"> <?php echo $_SESSION["username"]; ?></a>
                    </div>
                    <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-last" id="nav">
                        <ul class="navbar-nav flex-column w-100 justify-content-center">
                            <li class="nav-item">
                                <a href="myDashboard.php" class="nav-link "> Dashboard </a>
                            </li>
                            <li class="nav-item">
                                <a href="activities.php" class="nav-link active"> Activities </a>
                            </li>
                            <li class="nav-item">
                                <a href="LogOut.php" class="nav-link "> Log out </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>
            <main class="col-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">Activities <button type="button" class="btn btn-primary float-right" id="myBtn">+</button></div>
                                <div class="card-body">
                                    <div class="">
                                        <table id="activitieTable" class="table">
                                            <thead>
                                                <tr>
                                                    <th style='display:none;'>Activity Id</th>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Category</th>
                                                    <th>Amount</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($table_result)) {
                                                ?>
                                                    <tr>
                                                        <td style='display:none;'><?php echo $row['activity_id']; ?></td>
                                                        <td><?php echo $row['date']; ?></td>
                                                        <td><?php echo $row['type']; ?></td>
                                                        <td><?php echo $row['category']; ?></td>
                                                        <td><?php echo $row['amount']; ?></td>
                                                        <td><a href="remove.php?id=<?php echo $row['activity_id']; ?>">Remove</a></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="myModal" class="modal ">

                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <form method="POST">
                                <div class="container">
                                    <div class="row">
                                        <input type="radio" checked="checked" name="type" <?php if (isset($type) && $type == "Income") echo "checked"; ?> value="Income">Income</input>
                                        <input type="radio" name="type" <?php if (isset($type) && $type == "Expense") echo "checked"; ?> value="Expense">Expense</input>
                                    </div>
                                    <div class="row">
                                        <label for="date">Date:</label>
                                        <input type="date" id="start" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                    <div class="row">
                                        <label for="category">Category:</label>
                                        <select id="category" name="category">
                                            <option value="0">Salary</option>
                                            <option value="1">Food</option>
                                            <option value="2">Clothing</option>
                                            <option value="3">Rent</option>
                                            <option value="4">Miscellaneous</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <label for="Amount">Amount (Rs):</label>
                                        <input type="number" id="Amount" name="Amount" min="1" step="any" required><br><br>
                                    </div>
                                    <input type="submit" name="submit" value="Add"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>