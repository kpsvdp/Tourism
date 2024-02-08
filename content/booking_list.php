<?php 
session_start();
include_once('config.php');
include('function.php');
//validating the login for redirecting the user
if(!array_key_exists('username',$_SESSION)) {
    header("location:login.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Document</title>
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
                $customer_id = $_SESSION['customerID'];
                $login_var = "Logout";
            } 
            ?>
            <li> <a href="login.php?logout"><?php echo $login_var ?></a></li>
        </ul>
    </nav>
    <?php
    //validating booking count
    if(bookingscount($conn,$customer_id) == 0){
        echo '<h1 align="center">No bookings found</h1>';
    }else{
       ?>
       <!-- booking details printed into table -->
       <div>
        <h1 align="center">Your Booking Details</h1>
        <table align="center" border='1px'  cellspacing="0px">
            <thead>
                <th>Excursion Name</th>
                <th>Excursion Date</th>
                <th>No Of Guest</th>
                <th>Toatal Package</th>
                <th>Booking Note</th>
            </thead>
            <?php
            //printing bookings into table data
            getBookings($conn,$customer_id);
            ?>
        </table>
    </div>
    <?php
}
?>
</body>
</html>