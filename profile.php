<?php
session_start();
require("connect.php");

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['signup'])) {
    // echo($_POST['submit']);
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact = $_POST['phone'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO users (email,username,password,phone,gender) values ('$email','$username','$password','$contact','$gender')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "data inserted successfully";
        // exit();
        $_SESSION['email'] = $email;
        header("Location: index.php");
    } else {
        echo "data inserted failure";
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content="View and edit your profile information, manage your orders, and customize your settings on our online pharmacy platform.">
        <meta name="keywords"
        content="Profile page, Perosnal Profile, User profile, Online profile, About me, Personal details, Contact information">
        <title>Profile Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lilita+One&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <div class="arrow">
            <a href="index.php"><img src="assets\arrow.png" alt="Home Page"></a>
        </div>
        <div class="cart">
            <a href="cart.php">
                <img src="assets\cart.png" alt="cart">
            </a>
        </div>
    </header>
    <main>
        <div class="profile2"><img src="assets/profile.png" alt="profile"></div>
        <form action="" method="POST">
            <div class="reg-container">
                <h2>Sign up</h2>
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
                <br>
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter your Email" name="email" required>
                <br>
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                <br>
                <label for="gender"><b>Gender</b></label>
                <select name="gender" id="gender">
                    <option value="choose">Choose an Option</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <br>
                <label for="contact"><b>Contact Number</b></label>
                <input type="text" placeholder="Enter Phone Number" name="Phone Number" required>
                <br>
                <input type="submit" name="signup" value="signup">
                <p>Already have an account? <a class="reg-link" href="signin.php"> Login Here </a></p>
            </div>
        </form>
    </main>
    <footer>
        <div class="orders">
            <a href="orders.php">
                <img src="assets\my orders.png" alt="My Orders">
                <h6>My Orders</h6>
            </a>
        </div>
        <div class="favorites"><a href="favorites.php">
                <img src="assets\favorites.png" alt="Favorites">
                <h6>Favorites</h6>
            </a></div>
        <div class="home"><a href="home.php">
                <img src="assets\home.png" alt="Home">
                <h6>Home</h6>
            </a></div>
        <div class="profile"><a href="profile.php">
                <img src="assets\profile.png" alt="Profile">
                <h6>Profile</h6>
            </a></div>
        <div class="general"><a href="general.php">
                <img src="assets\general.png" alt="General">
                <h6>General</h6>
            </a></div>
    </footer>

</body>

</html>