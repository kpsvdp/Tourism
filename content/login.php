<?php
session_start();
include_once('config.php');
include('function.php');
//validating the login for redirecting the user
if (array_key_exists('username', $_SESSION)) {
    $username = $_SESSION['username'];
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header("location:../index.php");
    }
}
//reading fields from login form, inserting values into login form and setting sessions
if (isset($_POST['Login'])) {
    $username = sanitize_fields($_POST['username']);
    $password = sanitize_fields(md5($_POST['password_hash']));
    if (login_user($conn, $username, $password)) {
        $_SESSION['username'] = $username;
        $customer_details = getUser($conn,$username);
        $_SESSION['customerID'] = $customer_details['customerID'];
        header("location:../index.php");
    } else {
        header("location:login.php?error=Invalid username and Password");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<body>
    <header>
        <h1>France Tourism</h1>
    </header>     
    <nav>
        <ul class="menu-list">
            <li> <a href="../index.php"> Home</a></li>
            <li> <a href="places.php">Places</a></li>
            <li> <a href="booking_list.php">Bookings List</a></li>
            <li> <a href="reports.php">Reports</a></li>
            <li> <a href="credits.html">Credits</a></li>
            <li> <a href="signup.php">Sign Up</a></li>
            <?php 
            //validating the login for customizing the navigation bar
            $login_var = "Login";
            if (array_key_exists('username', $_SESSION)) {
                $login_var = "Logout";
            } 
            ?>
            <li> <a href="login.php?logout"><?php echo $login_var ?></a></li>
        </ul>
    </nav>
    <div class="login-div">
        <h1>User Login Form</h1>
        <?php
        //setting warning messages
        if (isset($_GET['error'])) {
            ?>
            <div align='center'>
                <h4 id="error"> <?php echo $_GET['error'].'<br>'; ?>
            </h4>
        </div>
        <?php
    }
    ?>
    <!-- login form -->
    <form action="login.php" method="post" class="registration">
        <label for="">User Name</label><br>
        <input type="text" name ="username" class="form-input" placeholder ="Please Enter Your Name"><br>
        <label for="">User Passsowrd</label><br>
        <input type="password" class="form-input" name ="password_hash" placeholder ="Please Enter Your Password"><br>
        <input type="submit" name="Login" class="register" value="Login">
    </form>
</div>
</body>
</html>