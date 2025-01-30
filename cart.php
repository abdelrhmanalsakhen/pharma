<?php
include 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="View and manage items in your cart.">
    <meta name="keywords"
        content="Shopping cart, My cart, View cart, Online cart, Chechout page, Shopping basket, Items in cart">
    <title>My Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container mt-5">
        <h1 class="text-center">Your Cart</h1>



        <!-- Cart Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['email'])) {
                    $user = $_SESSION['email'];
                    $sql = "SELECT * FROM orders WHERE email='$user'";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        $total = 0;

                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $product_name = $row['product_name'];
                            $product_quantity = $row['product_quantity'];
                            $product_price = $row['product_price'];
                            $subtotal = $product_price * $product_quantity;
                            $total += $subtotal;

                            echo '
                            <tr>
                                <td>' . htmlspecialchars($product_name) . '</td>
                                <td>' . number_format($subtotal, 2) . ' JD</td>
                                <td>
                                    <form action="updateItem.php" method="GET" class="d-flex align-items-center">
                                        <input type="number" name="product_quantity" value="' . $product_quantity . '" min="1" class="form-control me-2">
                                        <input type="hidden" name="product_id" value="' . $id . '">
                                        <button type="submit" name="update" class="btn btn-sm btn-primary">Update</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="deleteItem.php?id=' . $id . '" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>';
                        }
                    }
                } else {
                    echo '<tr><td colspan="4" class="text-center">Please log in to view your cart.</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <!-- Total Price -->
        <div class="text-end">
            <h4>Total: <?php echo isset($total) ? number_format($total, 2) : '0.00'; ?> JD</h4>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>