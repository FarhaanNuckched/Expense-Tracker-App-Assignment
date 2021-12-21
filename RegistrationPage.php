<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Register </title>
        <link rel="stylesheet" href="style.css">

    </head>
    <body>

    <?php
    require('dbconnect.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {

        // removes backslashes
        $username = stripslashes($_REQUEST['username']);

        //escapes special characters in a string
        $username = mysqli_real_escape_string($connection, $username);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($connection, $email);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, $password);


        $query    = "INSERT into `users` (username, email, password, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        
        $result   = mysqli_query($connection, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You have been registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='LoginPage.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='RegistrationPage.php'>registration</a> again.</p>
                  </div>";
        }
    } else {}
    ?>

            <form action="db_connection.php" method="post">
                <h1 class="register-page">Register</h1>

                    <! textbox for username>
                    <label for="username" > User Name </label>
                    <input type="text" class="login-input" placeholder="Eg: John" id="username" name="username">

                    <! textbox for email>
                    <label for="email"> Email </label>
                    <input type="email" class="login-input" placeholder="Eg: john07@gmail.com" id="email" name="email">

                    <! textbox for password>
                    <label for="password"> Password </label>
                    <input type="password" class="login-input" placeholder="" id="password" name="password">

                    <! button to submit registration information>
                    <input type="submit" name="submit" value="Register" class="login-button">
                    <p class="link">Already have an account? <a href="LoginPage.php">Login here</a></p>

                    </form>
        </div>

    </body>
</html>
