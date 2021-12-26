<!DOCTYPE html>
<html lang="en">
    <header>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-=scale=1.0">
        <title> Login </title>
        <link rel="stylesheet" href="style.css">


    </header>
    <body>
        <?php
            include ('dbconnect.php');

            session_start();

            error_reporting(0);

            // When form is  submitted, User session is checked and created.
            if (isset($_SESSION['username'])) {
                header("Location: myDashboard.php");
            }

            if (isset($_POST['submit'])) {
                $username = $_POST['email'];
                $password = md5($_POST['password']);

                // Check if user details is in the database
                $query    = "SELECT * FROM users WHERE email='$email' AND password='$password'";
               
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_id'] = $row['user_id'];
                    header("Location: myDashboard.php");
                } else {
                    echo "<script>alert('Email or Password is Wrong.')</script>";
                }
            }

        ?>

        
        <form action="" class="form" method="POST" name="login">

        <h1>Login </h1>

            <! textbox for email>
            <label for="email"> Email </label>
            <input type="email" class="login-input" placeholder="Eg: john07@gmail.com" id="email" name="email" value="<?php echo $_POST['email']; ?>" required>

            <! textbox for password>
            <label for="password"> Password </label>
            <input type="password" placeholder="Password" id="password" name="password" value="<?php echo $_POST['password']; ?>" required>

        <! button to submit login information>
        <button name="submit" class="login-button">Login</button>
         <p class="link">Don't have an account? <a href="RegistrationPage.php">Register Now</a></p>


        </form>
        </div>

    </body>
</html>