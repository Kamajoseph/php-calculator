<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Multipurpose Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .calculator { max-width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; background: #f9f9f9; }
        input[type="text"], select { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Multipurpose Calculator</h2>
    <form method="POST">
        <label>Enter First Number:</label>
        <input type="text" name="num1" required>

        <label>Enter Second Number (if needed):</label>
        <input type="text" name="num2">

        <label>Select Operation:</label>
        <select name="operation" required>
            <option value="add">Addition (+)</option>
            <option value="subtract">Subtraction (-)</option>
            <option value="multiply">Multiplication (×)</option>
            <option value="divide">Division (÷)</option>
            <option value="power">Exponentiation (^)</option>
            <option value="percentage">Percentage (%)</option>
            <option value="sqrt">Square Root (√)</option>
            <option value="log">Logarithm (log)</option>
        </select>

        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = isset($_POST['num2']) ? $_POST['num2'] : null;
        $operation = $_POST['operation'];
        $result = '';

        // Input validation
        if (!is_numeric($num1) || ($num2 !== null && $num2 !== '' && !is_numeric($num2))) {
            echo "<p style='color:red;'>Please enter valid numbers.</p>";
        } else {
            // Perform calculation based on selected operation
            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "subtract":
                    $result = $num1 - $num2;
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    break;
                case "divide":
                    if ($num2 == 0) {
                        $result = "Error: Division by zero";
                    } else {
                        $result = $num1 / $num2;
                    }
                    break;
                case "power":
                    $result = pow($num1, $num2);
                    break;
                case "percentage":
                    $result = ($num1 * $num2) / 100;
                    break;
                case "sqrt":
                    $result = sqrt($num1);
                    break;
                case "log":
                    if ($num1 > 0) {
                        $result = log($num1);
                    } else {
                        $result = "Error: Logarithm undefined for non-positive numbers";
                    }
                    break;
                default:
                    $result = "Invalid operation selected";
            }

            echo "<h3>Result: $result</h3>";
        }
    }
    ?>
</div>

</body>
</html>
