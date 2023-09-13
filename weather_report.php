<!DOCTYPE html>
<html>
<head>
    <title>Weather Report</title>
</head>
<body>
    <h1>Weather Report</h1>

    <?php
    $temperature = '';
    $message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temperature = $_POST["temperature"];

        if ($temperature <= 0) {
            $message = "It's freezing!";
        } elseif ($temperature <= 15) {
            $message = "It's cool.";
        } elseif ($temperature <= 25) {
            $message = "It's warm.";
        } else {
            $message = "It's hot!";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="temperature">Enter Temperature (in Celsius):</label>
        <input type="number" name="temperature" required value="<?php echo $temperature; ?>"><br>
        <input type="submit" value="Get Weather">
    </form>

    <?php
    if ($message !== '') {
        echo "<p>The current temperature is $temperature.</p>";
        echo "<p>$message</p>";
    }
    ?>
</body>
</html>
