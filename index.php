<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #008080;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 40px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="number"] {
            width: 50%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        .result {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            font-family: 'Times New Roman', Times, serif;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Password Generator</h1>
        <form method="post" action="">
            <label for="length">Password Length:</label>
            <input type="number" id="length" name="length" min="6" max="64" value="12" required>
            
            <label>Include:</label>
            <input type="checkbox" id="include_upper" name="upper">
            <label for="include_upper">Uppercase Letters</label>

            <input type="checkbox" id="include_numbers" name="numbers">
            <label for="include_numbers">Numbers</label>

            <input type="checkbox" id="include_symbols" name="symbols">
            <label for="include_symbols">Symbols</label>
            
            <input type="submit" value="Generate Password">
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $length = intval($_POST["length"]);
            $upper = isset($_POST["upper"]);
            $numbers = isset($_POST["numbers"]);
            $symbols = isset($_POST["symbols"]);
            
            $charset = 'abcdefghijklmnopqrstuvwxyz';
            if ($upper) {
                $charset .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }
            if ($numbers) {
                $charset .= '0123456789';
            }
            if ($symbols) {
                $charset .= '!@#$%^&*()_+-=[]{}|;:,.<>?';
            }
            
            $password = '';
            $charset_length = strlen($charset);
            
            for ($i = 0; $i < $length; $i++) {
                $random_index = rand(0, $charset_length - 1);
                $password .= $charset[$random_index];
            }
            
            echo "<p class='result'>Generated Password: <strong>$password</strong></p>";
        }
        ?>
    </div>
</body>
</html>
