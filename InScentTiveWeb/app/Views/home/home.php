<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InScentTive - Shop the Finest Scents</title>
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
    </style>
</head>
<body>
   <!-- Header -->
<header>
    <h1>Welcome to InScentTive</h1>
    <p>Shop the Finest Scents</p>
    <!-- Button for Cart -->
    <a href="<?= base_url('cartadded'); ?>" class="btn btn-outline-light">View Cart</a>
</header>


  <!-- Products Section -->
<div class="container mt-5">
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-lg-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name']; ?></h5>
                        <p class="card-text">Description: <?= $product['description']; ?></p>
                        <p class="card-text">Quantity: <?= $product['qty']; ?></p>
                        <p class="card-text">Price: <?= $product['price']; ?></p>
                        <!-- Add to Cart Form -->
                        <form action="<?= base_url('cartadded'); ?>" method="post">
                            <input type="hidden" name="scent_id" value="<?= $product['id']; ?>">
                            <input type="hidden" name="user_id" value="<?= $user_id; ?>"> <!-- Assuming you have $user_id available -->
                            <div class="form-group">
                                <label for="quantity<?= $product['id']; ?>">Quantity:</label>
                                <input type="number" name="quantity" id="quantity<?= $product['id']; ?>" class="form-control" value="1" min="1">
                            </div>
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


    <!-- Footer -->
    <footer>
        <p>&copy; <?= date('Y'); ?> InScentTive. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
