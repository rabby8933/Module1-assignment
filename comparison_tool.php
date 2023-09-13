<!DOCTYPE html>
<html>
<head>
    <title>Comparison Tool</title>
</head>
<body>
    <h1>Comparison Tool</h1>

    <?php
    $number1 = '';
    $number2 = '';
    $result = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number1 = $_POST["number1"];
        $number2 = $_POST["number2"];

        $result = ($number1 > $number2) ? $number1 : $number2;
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="number1">Enter Number 1:</label>
        <input type="number" name="number1" required value="<?php echo $number1; ?>"><br>

        <label for="number2">Enter Number 2:</label>
        <input type="number" name="number2" required value="<?php echo $number2; ?>"><br>

        <input type="submit" value="Compare">
    </form>

    <?php
    if ($result !== '') {
        echo "<p>The larger number is: $result</p>";
    }
    ?>
</body>
</html>
