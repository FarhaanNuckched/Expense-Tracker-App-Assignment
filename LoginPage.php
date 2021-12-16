<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
        <link rel="stylesheet" href="style.css">


    </head>
    <body>
        <?php
            require ('dbconnect.php');
            session_start();
            // When form is  submitted, User session is checked and created.
            if (isset($_POST['username'])) {
                // removes backslashes
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($connection, $username);

                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($connection, $password);

                // Check if user details is in the database
                $query    = "SELECT * FROM `users` WHERE username='$username'
                             AND password='" . md5($password) . "'";
                $result = mysqli_query($connection, $query) or die;
                $rows = mysqli_num_rows($result);
                if ($rows == 1) {
                    $_SESSION['username'] = $username;
                    // Direct to user dashboard page
                    header("Location: dashboard.php");
                } else {
                    echo "<div class='form'>
                          <h3>Incorrect Username/password.</h3><br/>
                          <p class='link'>Click here to <a href='LoginPage.php'>Login</a> again.</p>
                          </div>";
                }
            } else {}

        ?>
        <div class="login-page">

        <h1> Login </h1>
        
        <form>

            <! textbox for username>
            <label for="username"> Username </label>
            <input type="username" placeholder="Eg: johnwick07" id="username" name="username">
                
            <! textbox for password>
            <label for="password"> Password </label>
            <input type="password" placeholder="Password" id="password" name="password">

        <! button to submit login information>
         <input type="submit" value="Login">


        </form>
        </div>

    </body>
</html>