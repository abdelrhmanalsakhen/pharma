<?php
require("connect.php");

session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * from users where email='$email' and password='$password';";
    $userDetails = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($userDetails);
    if ($row) {
        $_SESSION['email'] = $email;
        header("location:Allergies.php");
    } else {
        echo "Invalid email or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration </title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
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
    <form action="" method="POST">
        <div class="reg-container">
            <h2>Sign in</h2>
            <label for="email"><b>email</b></label>
            <input type="text" placeholder="Enter email" name="email" required>
            <br>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br>
            <button type="submit" name="login">Sign in </button>

            <p>Don't have an account? <a class="reg-link" href="signup.php"> Register Here </a></p>
        </div>
    </form>
</body>

</html>