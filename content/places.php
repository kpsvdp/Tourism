<?php
include_once('config.php');
include('function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places</title>
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
    <?php
    //Printing excursions from an array using foreach loop
    $list = getList($conn);
    foreach ($list as $key => $val) {
        echo  "<div id='content'>";
        echo '<img src="../assets/img/banner' . $val['excursionID'] . '.jpg" alt="'. $val['excursion_name'] .'">';
        echo "<div>";
        echo "<h2>" . $val['excursion_name'] . " - " . $val['location'] . "</h2>";
        echo "<p>" . $val['description'] . "</p>";
        echo "Price: <span> GBP " . $val['price_per_person'] . "</span>";
        echo "<a href='bookings.php?id=" . $val['excursionID'] . "'><button type='button' class='btn'>Book Now</button></a>";
        echo "</div>";
        echo "</div>";
    }
    ?>
    <footer>
        <p>&#169;france Tourism</p>
    </footer>
</body>

</html>