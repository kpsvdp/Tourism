<?php
session_start();
include_once('config.php');
include('function.php');
//reading signup form and inserting into databse
if (isset($_POST['register'])) {
    $username = sanitize_fields($_POST['username']);
    $firstname = sanitize_fields($_POST['customer_forename']);
    $lastname = sanitize_fields($_POST['customer_surname']);
    $email    = sanitize_fields($_POST['customer_email']);
    $password = sanitize_fields(md5($_POST['password_hash']));
    $dob = sanitize_fields($_POST['date_of_birth']);
    signup($conn, $username, $firstname, $lastname, $email, $password, $dob);
}
// unsetting existed user before allowing signup form
if (array_key_exists('username', $_SESSION)) {
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
    <div class="container">
        <h1>User Registration Form</h1>
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
        <!-- signup form -->
        <form action="" method="post" class="registration">
            <label for="">Username</label><br>
            <input type="text" pattern="[A-Za-z0-9]{3,10}" title="Name contain minimm letter" name="username" class="form-input" placeholder="Please Enter User Name"><br>
            <label for="">Forename</label><br>
            <input type="text" pattern="[A-Za-z]{3,10}" title="Name contain minimm letter" name="customer_forename" class="form-input" placeholder="Please Enter First Name"><br>
            <label for="">Surname</label><br>
            <input type="text" pattern="[A-Za-z]{3,10}" title="Name contain minimm letter" name="customer_surname" class="form-input" placeholder="Please Enter Last Name"><br>
            <label for="">User Email</label><br>
            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter Valid Email" class="form-input" name="customer_email" placeholder="Please Enter Your Email"><br>
            <label for="">User Passsowrd</label><br>
            <input type="password" pattern=".{6,}" title="Six or more characters" class="form-input" name="password_hash" placeholder="Please Enter Your Password"><br>
            <label for="">Date of birth</label><br>
            <input type="date" class="form-input" name="date_of_birth" placeholder="Please Enter Your date of birth"><br>
            <input type="submit" name="register" class="register" value="Register">
        </form>
    </div>
</body>

</html>