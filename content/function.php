<?php
//Sanitizing input fields by eleminating special characters, html tags and extra spaces
function sanitize_fields($data)
{
    $data = filter_var($data, FILTER_SANITIZE_STRING);
    $data = filter_var($data, FILTER_SANITIZE_SPECIAL_CHARS);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

//checking username existance in database
function existUser($conn, $username)
{
    $sql = "SELECT customerID,username FROM customers where username=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    mysqli_stmt_close($stmt);
    if (mysqli_fetch_assoc($result)) {
        $val = True;
    } else {
        $val = False;
    }
    
    return $val;
}

//User Registration into database
function signup($conn, $username, $firstname, $lastname,$email,$password,$dob)
{   
    if (existUser($conn, $username) == true) {
        header('location:signup.php?error=User Already Exist');
        exit();
    }
    if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($dob)) {
        $sql = "INSERT INTO customers(username,password_hash,customer_forename,customer_surname,customer_email,date_of_birth) VALUES(?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssss',$username,$password, $firstname, $lastname,$email,$dob);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location:signup.php?error=Signup successful.<br>Login using new username and password');
        exit();
    } else {
        header('location:signup.php?error=Please Fill All The Fields');

    }
}

//User Login validation
function login_user($conn, $username, $password)
{
    if (existUser($conn, $username) == false) {
        header('location:login.php?error=User Not Found');
        exit();
    }
    $sql = "SELECT password_hash,username,customerID FROM customers WHERE username=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,'s',$username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $password_hash = $row['password_hash'];
    }
    mysqli_stmt_close($stmt);
    if ($password_hash == $password) {
        return true;
    } else {
        header("location:login.php?error=wrong Password and username");
    }
}

//retrieving excursions from database
function getList($conn) {
    $sql = "SELECT * FROM excursions";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $list = array();
    while($row = mysqli_fetch_assoc($result)) {
        $list[] = $row; 
    }
    return $list;
}

//retrieving user infromation from database
function getUser($conn,$username) {
    $sql = "SELECT * FROM customers where username=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

//retrieving excursion details using excursion id
function getExcursionsById($conn,$excursion_id) {
    $sql = "SELECT * FROM excursions where excursionID=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $excursion_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $row;
}

//creating booking into databse
function booking($conn,$excursionId,$customer_id,$excursion_date,$no_of_guest,$total_package,$booking_note) {
    if(!empty($excursionId) && !empty($excursion_date) && !empty($no_of_guest) && !empty($total_package)) {
        $sql = "INSERT INTO booking(excursionID,customerID,	excursion_date,	num_guests,total_booking_cost,booking_notes) VALUES(?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssss',$excursionId,$customer_id, $excursion_date, $no_of_guest,$total_package,$booking_note);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location:booking_list.php");
    } else {
        header('location:bookings.php?error=Please Fill All The Fields');

    }
}

//retrieving bookings using customer id
function getBookings($conn,$customer_id) {
    $sql = "SELECT * FROM booking,excursions where excursions.excursionID =booking.excursionID AND customerID=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $customer_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        if(!empty($row)) {
            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$row['excursion_name']."</td>";
            echo "<td>".$row['excursion_date']."</td>";
            echo "<td>".$row['num_guests']."</td>";
            echo "<td>".$row['total_booking_cost']."</td>";
            echo "<td>".$row['booking_notes']."</td>";
            echo "</tr>";
            echo "</tbody>";
        } 
        
    }
    return $row;
}

//reading excursion id limits
function limit($conn) {
    $sql = "SELECT min(excursionID),max(excursionID) FROM excursions";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $limit = mysqli_fetch_assoc($result);
    return $limit;
}

//reading number of bookings against customer id
function bookingscount($conn,$customer_id){
    $sql = "SELECT * FROM booking where customerID=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $customer_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_num_rows($result);
}