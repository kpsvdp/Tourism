<?php
include_once('config.php');
include('function.php');
session_start();
//validating the login for redirecting the user
if (!array_key_exists('username', $_SESSION)) {
    header("location:login.php");
}
$limit = limit($conn);
if (isset($_GET['id']) &&  in_array($_GET['id'], range($limit['min(excursionID)'], $limit['max(excursionID)']))) {
    $excursion_id = $_GET['id'];
} else {
    header("location:places.php");
}
//booking details into database
$excursion_details = getExcursionsById($conn, $excursion_id);
if (isset($_POST['confirm'])) {
    $excursionId = $excursion_id;
    $customer_id = $_SESSION['customerID'];
    $excursion_date = $_POST['excursion_date'];
    $no_of_guest = $_POST['num_guests'];
    $total_package = $no_of_guest * $excursion_details['price_per_person'];
    $booking_note = $_POST['booking_note'];
    booking($conn, $excursionId, $customer_id, $excursion_date, $no_of_guest, $total_package, $booking_note);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
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
    </nav>
    <main id="content">
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
        <img src="../assets/img/banner<?php echo $excursion_id; ?>.jpg" alt="">
        <div>
            <h2> <?php echo $excursion_details['excursion_name'] ?></h2>
            <p><?php echo $excursion_details['description'] ?></p>
        </div>
    </main>
    <div class="confirmation">
        <!-- booking details form -->
        <form action="" method="post">
            <label for="">Excursion Date</label>
            <input type="date" name="excursion_date">
            <label for="">Number Of Guest</label>
            <input type="number" name="num_guests">
            <label for="">Booking Note</label>
            <textarea name="booking_note" id="" cols="38" rows="8"></textarea>
            <button type="submit" name="confirm" class='confirm'>Confirm</button>
        </form>
    </div>
    <footer>
        <p>&#169;france Tourism</p>
    </footer>
</body>

</html>