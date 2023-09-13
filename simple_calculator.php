<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
</head>
<body>
    <h1>Simple Calculator</h1>

    <?php
    $num1 = '';
    $num2 = '';
    $operation = '';
    $result = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operation = $_POST["operation"];

        switch ($operation) {
            case 'addition':
                $result = $num1 + $num2;
                break;
            case 'subtraction':
                $result = $num1 - $num2;
                break;
            case 'multiplication':
                $result = $num1 * $num2;
                break;
            case 'division':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Cannot divide by zero";
                }
                break;
            case 'binary_to_decimal':
                $result = bindec($num1);
                break;
            case 'decimal_to_binary':
                $result = decbin($num1);
                break;
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="num1">Enter Number 1:</label>
        <input type="text" name="num1" required value="<?php echo $num1; ?>"><br>

        <label for="num2">Enter Number 2:</label>
        <input type="text" name="num2" value="<?php echo $num2; ?>"><br>

        <label for="operation">Select Operation:</label>
        <select name="operation" required>
            <option value="addition">Addition (+)</option>
            <option value="subtraction">Subtraction (-)</option>
            <option value="multiplication">Multiplication (*)</option>
            <option value="division">Division (/)</option>
            <option value="binary_to_decimal">Binary to Decimal</option>
            <option value="decimal_to_binary">Decimal to Binary</option>
        </select><br>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($result !== '') {
        echo "<p>Result: $result</p>";
    }
    ?>
</body>
</html>
