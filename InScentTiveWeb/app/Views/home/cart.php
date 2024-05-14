<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InScentTive - Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for header and footer */
        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .container-products {
            min-height: calc(100vh - 190px); /* Adjust according to header and footer height */
        }

        .cart-item {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Welcome to InScentTive</h1>
        <p>Your Cart</p>
    </header>

    <!-- Cart Items Section -->
    <div class="container mt-5">
        <?php if (!empty($cartItems)) : ?>
            <?php foreach ($cartItems as $item) : ?>
                <div class="cart-item">
                    <h5><?= $item['name']; ?></h5>
                    <p>Quantity: <?= $item['quantity']; ?></p>
                    <p>Price: <?= $item['price']; ?></p>
                    <form action="<?= base_url('cart/removeFromCart/' . $item['id']); ?>" method="post">
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?= date('Y'); ?> InScentTive. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
