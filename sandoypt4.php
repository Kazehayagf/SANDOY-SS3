<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum of Reciprocals</title>
    <style>
        /* Background animation */
        @keyframes bgColorChange {
            0% { background: #ff9a9e; }
            25% { background: #fad0c4; }
            50% { background: #fbc2eb; }
            75% { background: #a1c4fd; }
            100% { background: #c2e9fb; }
        }

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            animation: bgColorChange 10s infinite alternate; /* Animate background */
            transition: background 1s ease-in-out;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
        }

        input {
            width: 80%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #0056b3;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sum of Reciprocals</h2>
    <form method="POST">
        <input type="number" name="n" min="1" placeholder="Enter N" required>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = intval($_POST["n"]);
        $sum = 0.0;
        
        for ($i = 1; $i <= $n; $i++) {
            $sum += 1 / $i;
        }
        
        echo "<div class='result'>Sum is: " . number_format($sum, 10) . "</div>";
    }
    ?>
</div>

</body>
</html>
