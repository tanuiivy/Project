<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bean & Brain Cafe</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="products.css">
</head>
<body>
    <?php include_once("template/nav.php"); ?>
<h1>Our Coffee Products</h1>
    <div class="product-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Buy</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Espresso Roast</td>
                    <td>A rich and intense blend, perfect for making the perfect espresso at home.</td>
                    <td>$12.99</td>
                    <td><button class="buy-btn">Add to Cart</button></td>
                </tr>
                <tr>
                    <td>French Roast</td>
                    <td>A dark, bold coffee with a smoky flavor that is perfect for those who like a strong cup.</td>
                    <td>$13.99</td>
                    <td><button class="buy-btn">Add to Cart</button></td>
                </tr>
                <tr>
                    <td>House Blend</td>
                    <td>A balanced blend with a smooth finish, ideal for everyday drinking.</td>
                    <td>$10.99</td>
                    <td><button class="buy-btn">Add to Cart</button></td>
                </tr>
                <tr>
                    <td>Colombian</td>
                    <td>A single-origin coffee known for its rich flavor and mild acidity.</td>
                    <td>$14.99</td>
                    <td><button class="buy-btn">Add to Cart</button></td>
                </tr>
                <tr>
                    <td>Decaf</td>
                    <td>All the flavor of our regular coffees, without the caffeine.</td>
                    <td>$11.99</td>
                    <td><button class="buy-btn">Add to Cart</button></td>
                </tr>
            </tbody>
        </table>
</div>
</body>
</html>