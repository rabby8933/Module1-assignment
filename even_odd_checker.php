<!DOCTYPE html>
<html>
<head>
    <title>Even/Odd Checker</title>
</head>
<body>
    <h1>Even/Odd Checker</h1>

    <?php
    $number = '';
    $result = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["number"];

        if ($number % 2 == 0) {
            $result = "Even";
        } else {
            $result = "Odd";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="number">Enter a Number:</label>
        <input type="number" name="number" required value="<?php echo $number; ?>"><br>
        <input type="submit" value="Check">
    </form>

    <?php
    if ($result !== '') {
        echo "<p>The number $number is $result.</p>";
    }
    ?>
</body>
</html>
