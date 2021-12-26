<!DOCTYPE html>
<html lang="en">
    <header>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Register </title>
        <link rel="stylesheet" href="style.css">

    </header>
    <body>

    <?php
    include('dbconnect.php');

    error_reporting(0);

    session_start();
    
    if (isset($_SESSION['username'])) {
        header("Location: LoginPage.php");
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
	    $email = $_POST['email'];
	    $password = md5($_POST['password']);
	    $confirmPassword = md5($_POST['confirmPassword']);

        if ($password == $confirmPassword) {
		    $query = "SELECT * FROM users WHERE email='$email'";
		    $result = mysqli_query($connection, $query);

            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO users (username, email, password)
                        VALUES ('$username', '$email', '$password')";
                $result = mysqli_query($connection, $sql);

        if ($result) {
				echo "<script>alert('Registration complete. You may login now.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['confirmPassword'] = "";
			} else {
				echo "<script>alert('Something went wrong. Please try again.')</script>";
			}
		} else {
			echo "<script>alert('Invalid! Username already exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Passwords does not match.')</script>";
	}
}
    ?>

            <form action="" method="post">
                <h1 class="register-page">Register</h1>

                    <! textbox for username>
                    <label for="username" > User Name </label>
                    <input type="text" class="login-input" placeholder="Eg: John" id="username" name="username" value="<?php echo $username; ?>" required>

                    <! textbox for email>
                    <label for="email"> Email </label>
                    <input type="email" class="login-input" placeholder="Eg: john07@gmail.com" id="email" name="email" value="<?php echo $email; ?>" required>

                    <! textbox for password>
                    <label for="password"> Password </label>
                    <input type="password" class="login-input" placeholder="" id="password" name="password" value="<?php echo $_POST['password']; ?>" required>

                    <! textbox for confirming password>
                    <label for="password"> Confirm Password </label>
                    <input type="password" class="login-input" placeholder="" id="password" name="confirmPassword" value="<?php echo $_POST['confirmPassword']; ?>" required>

                    <! button to submit registration information>
                    <button name="submit" class="login-button">Register</button>

                    <p class="link">Already have an account? <a href="LoginPage.php">Login here</a></p>

                    </form>
        </div>

    </body>
</html>