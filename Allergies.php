<?php
include 'connect.php';
session_start();

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['email'])) {
        $name = $_POST['product_name'];
        $image = $_POST['product_image'];
        $price = $_POST['product_price'];
        $quantity = $_POST['product_quantity'];
        $user = $_SESSION['email'];

        $sql = "INSERT INTO orders (product_name, product_image, product_price, product_quantity, email) 
                VALUES ('$name', '$image', $price, $quantity, '$user')";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            echo "Data insertion failed: " . mysqli_error($con);
        }
    } else {
        echo '<script>alert("Please sign in first.")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
        content="Product allergies, Allergy information, Allergen-free products, Product allergens, Antihistamine, Arias">
    <title>Products Shop</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <main>
        <div class="allergies_icon"><img src="assets\allergies.png" alt="Favorites"></div>
        <div class="allergies_text">
            <h2>Allergies & Asthma</h2>
        </div>
        <div class="search">
            <input type="text" placeholder="search">
        </div>
        <div class="container mt-4">

            <div class="container mt-5">

                <!-- User Greeting and Links -->
                <div class="text-end mb-4">
                    <?php
                    if (isset($_SESSION['username'])) {
                        $user = $_SESSION['username'];
                    }
                    ?>
                </div>

                <!-- Products Grid -->
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM product";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $name = $row['product_name'];
                            $image = $row['product_image'];
                            $price = $row['product_price'];

                            echo '
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="' . $image . '" class="card-img-top" alt="' . $name . '">
                            <div class="card-body">
                                <h5 class="card-title">' . $name . '</h5>
                                <p class="card-text"><strong>Price: ' . $price . ' JD</strong></p>
                                
                                <form method="POST">
                                    <input type="hidden" name="product_name" value="' . $name . '">
                                    <input type="hidden" name="product_image" value="' . $image . '">
                                    <input type="hidden" name="product_price" value="' . $price . '">
                                    <div class="mb-3">
                                        <input type="number" name="product_quantity" class="form-control" placeholder="Quantity" min="1" required>
                                    </div>
                                    <button type="submit" name="add_to_cart" class="btn btn-primary w-100">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>';
                        }
                    } else {
                        echo "<p class='text-center'>No products available.</p>";
                    }
                    ?>
                </div>
            </div>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>