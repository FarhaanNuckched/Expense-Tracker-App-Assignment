<!DOCTYPE html>
<html>
    <head>
        <title> Register </title>
        <link rel="stylesheet" href="style.css">

    </head>
    <body>

    <?php
    require('dbconnect.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {

        // removes backslashes
        $firstname = stripslashes($_REQUEST['firstname']);

        //escapes special characters in a string
        $firstname = mysqli_real_escape_string($connection, $firstname);

        $lastname = stripslashes($_REQUEST['lastname']);
        $lastname = mysqli_real_escape_string($connection, $lastname);

        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($connection, $username);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($connection, $email);

        $profession = stripslashes($_REQUEST['profession']);
        $profession = mysqli_real_escape_string($connection, $profession);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, $password);

        $confirmPassword = stripslashes($_REQUEST['confirmPassword']);
        $confirmPassword = mysqli_real_escape_string($connection, $confirmPassword);

        $query    = "INSERT into `users` (firstname, lastname, username, profession, email, password, confirmPassword)
                     VALUES ('$firstname', '$lastname','$username', '$profession', '$email', '" . md5($password) . "', '$confirmPassword)";
        
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
        <div class="register-page"></class>
                    <h1> Register </h1>
                    <h4> It only takes a minute. </h4>
                    <form action="db_connection.php" method="post">

                        <! textbox for first name>
                        <label for="firstname" > First Name </label>
                        <input type="text" placeholder="Eg: John" id="firstname" name="firstname">

                        <! textbox for last name>
                        <label for="lastName"> Last Name </label>
                        <input type="text" placeholder="Eg: Wick" id="lastname" name="lastname">

                        <! textbox for username>
                        <label for="username" > User Name </label>
                        <input type="text" placeholder="Eg: Johnwick07" id="username" name="username">
                        
                        <! textbox for Profession>
                        <label for="profession"> Profession </label>
                        <input type="text" placeholder="Eg: bartender" id="Profession" name="Profession">

                        <! textbox for email>
                        <label for="email"> Email </label>
                        <input type="email" placeholder="Eg: johnwick@gmail.com" id="email" name="email">

                        <! textbox for password>
                        <label for="password"> Password </label>
                        <input type="password" placeholder="" id="password" name="password">

                        <! textbox for  confirming password>
                        <label for="confirmPassword"> Confirm Password </label>
                        <input type="password" placeholder="" id="confirmPassword" name="confirmPassword">

                        <! button to submit registration information>
                        <input type="submit" value="Submit">

                    </form>
        </div>

    </body>
</html>