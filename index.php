<?php 
session_start() 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism</title>
    <link rel="stylesheet" href="./assets/style/style.css">
</head>
<body>
    <header>
        <h1>France Tourism</h1>
    </header>     
    <nav>
        <ul class="menu-list">
            <li> <a href="index.php"> Home</a></li>
            <li> <a href="./content/places.php">Places</a></li>
            <li> <a href="./content/booking_list.php">Bookings List</a></li>
            <li> <a href="./content/reports.php">Reports</a></li>
            <li> <a href="./content/credits.html">Credits</a></li>
            <li> <a href="./content/signup.php">Sign Up</a></li>
            <?php 
            //validating the login for customizing the navigation bar
            $login_var = "Login";
            if (array_key_exists('username', $_SESSION)) {
                $login_var = "Logout";
            } 
            ?>
            <li> <a href="./content/login.php?logout"><?php echo $login_var ?></a></li>
        </ul>
    </nav>
    <main>
        <a href="./content/bookings.php?id=1"><img src="./assets/img/banner1.jpg" alt=" Eiffel Tower">
        <div id="background">
            <h3>Join us to explore France</h3>
            <p>click here..</p>
        </div>
        </a> 
    </main>
    <br>
    <div class="sub-sections">
        <h1> Most Popular Places</h1>
        <div class="sub-tile">
            <img src="./assets/img/banner2.jpg" alt="Loire Valley Châteaux">
            <p>Loire Valley Châteaux <span>£100</span></p>
            <a href="./content/bookings.php?id=2"><button type="button" class="btn">Book Now</button></a> 
        </div>
        <div class="sub-tile">
            <img src="./assets/img/banner3.jpg" alt="Château de Versailles">
            <p>Château de Versailles<span>£80</span></p>
            <a href="./content/bookings.php?id=3"><button type="button" class="btn">Book Now</button></a> 
        </div>
        <div class="sub-tile">
            <img src="./assets/img/banner4.jpg" alt="Musée du Louvre">
            <p>Musée du Louvre<span>£60</span></p>
            <a href="./content/bookings.php?id=4"><button type="button" class="btn">Book Now</button></a> 

        </div>
        <div class="sub-tile">
            <img src="./assets/img/banner5.jpg" alt="Mont Saint-Michel">
            <p>Mont Saint-Michel<span>£50</span></p>
            <a href="./content/bookings.php?id=5"><button type="button" class="btn">Book Now</button></a> 
        </div>
    </div>
    <div class="sub-sections">
        <div class="sub-tile">
            <img src="./assets/img/banner6.jpg" alt="Jules Hardouin-Mansart">
            <p>Jules Hardouin-Mansart<span>£50</span></p>
            <a href="./content/bookings.php?id=6"><button type="button" class="btn">Book Now</button></a> 
        </div>
        <div class="sub-tile">
            <img src="./assets/img/banner7.jpg" alt="Côte d'Azur">
            <p>Côte d'Azur<span>£80</span></p>
            <a href="./content/bookings.php?id=7"><button type="button" class="btn">Book Now</button></a> 
        </div>
        <div class="sub-tile">
            <img src="./assets/img/banner8.jpg" alt="Provence">
            <p>Provence<span>£70</span></p>
            <a href="./content/bookings.php?id=8"><button type="button" class="btn">Book Now</button></a> 
        </div>
        <div class="sub-tile">
            <img src=" ./assets/img/banner9.jpg" alt="Cathédrale Notre-Dame">
            <p>Cathédrale Notre-Dame<span>£50</span></p>
            <a href="./content/bookings.php?id=9"><button type="button" class="btn">Book Now</button></a> 
        </div>
    </div>
    <footer>
        <p>&#169;france Tourism</p>
    </footer>
</body>
</html>