<- $2.50</option>
        </select>
        <br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" min="1" required>
        <br>

        <label>Order Type:</label>
        <input type="radio" name="order_type" value="dinein" required> Dine In
        <input type="radio" name="order_type" value="takeout"> Take Out
        <br><br>

        <button type="submit">Calculate Total</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function getPrice($drink) {
            $prices = [
                "Cappuccino" => 2.00,
                "Espresso" => 2.25,
                "Latte" => 1.75,
                "Iced Cappuccino" => 2.50,
                "Iced Latte" => 2.50
            ];
            return $prices[$drink] ?? 0;!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }
        h2 {
            color: #333;
        }
        .order-summary {
            text-align: left;
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            background: #eee;
            border-radius: 5px;
        }
        input, select {
            padding: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Item Order</h2>
    <form method="POST">
        <label for="drink">Select a drink:</label>
        <select name="drink" required>
            <option value="Cappuccino">Cappuccino - $2.00</option>
            <option value="Espresso">Espresso - $2.25</option>
            <option value="Latte">Latte - $1.75</option>
            <option value="Iced Cappuccino">Iced Cappuccino - $2.50</option>
            <option value="Iced Latte">Iced Latte 
        }

        function calculateTax($amount, $orderType) {
            return ($orderType === "takeout") ? $amount * 0.12 : 0;
        }

        function calculateTotal($drink, $quantity, $orderType) {
            $price = getPrice($drink);
            $subtotal = $price * $quantity;
            $tax = calculateTax($subtotal, $orderType);
            return [$subtotal, $tax, $subtotal + $tax];
        }

        if (isset($_POST['drink']) && isset($_POST['quantity']) && isset($_POST['order_type'])) {
            $drink = $_POST['drink'];
            $quantity = (int)$_POST['quantity'];
            $orderType = $_POST['order_type'];

            list($subtotal, $tax, $total) = calculateTotal($drink, $quantity, $orderType);

            echo "<div class='order-summary'>";
            echo "<h3>Order Summary</h3>";
            echo "Drink: $drink <br>";
            echo "Quantity: $quantity <br>";
            echo "Order Type: " . ($orderType == "dinein" ? "Dine In" : "Take Out") . "<br>";
            echo "Subtotal: $" . number_format($subtotal, 2) . "<br>";
            echo "Tax: $" . number_format($tax, 2) . "<br>";
            echo "<strong>Total Amount Due: $" . number_format($total, 2) . "</strong>";
            echo "</div>";
        } else {
            echo "<p class='error'>Please fill out all fields.</p>";
        }
    }
    ?>

</div>

</body>
</html>
