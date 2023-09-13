<!DOCTYPE html>
<html>
<head>
    <title>Temperature Converter</title>
</head>


<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1em;
        text-align: center;
        align-items: center;
        display: block;
        margin: auto 0;
    }
    h1 {
        color: #0066cc;
    }
    label {
        font-weight: bold;
    }
    input, select {
        margin-bottom: 1em;
        padding: 10px;
    }
    #data input {
        float: left;
        width: 15em;
        margin-bottom: 10px;
        
    }
    #buttons input {
        float: left;
        margin-bottom: .5em;
    }
    br {
        clear: left;
    }
    .form{
        background-color: white;
        display: inline-block;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        padding: 30px;
        border-radius: 15px;
        
    }

</style>

<body>
    <div class="form">
        <h1>Temperature Converter</h1>

    <?php
    $temperature = '';
    $converted_temperature = '';
    $conversion_direction = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temperature = $_POST["temperature"];
        $conversion_direction = $_POST["conversion_direction"];
        
        if ($conversion_direction === "celsius_to_fahrenheit") {
            $converted_temperature = ($temperature * 9/5) + 32;
        } 
        elseif ($conversion_direction === "fahrenheit_to_celsius") {
            $converted_temperature = ($temperature - 32) * 5/9;
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="temperature">Enter Temperature:</label>
        <input type="number" name="temperature" required value="<?php echo $temperature; ?>" step="0.01"><br>

        <label for="conversion_direction">Conversion Direction:</label>
        <select name="conversion_direction">
            <option value="celsius_to_fahrenheit" <?php if ($conversion_direction === "celsius_to_fahrenheit") echo "selected"; ?>>Celsius to Fahrenheit</option>
            <option value="fahrenheit_to_celsius" <?php if ($conversion_direction === "fahrenheit_to_celsius") echo "selected"; ?>>Fahrenheit to Celsius</option>
        </select><br>

        <input type="submit" value="Convert">
    </form>

    <?php
    if ($converted_temperature !== '') {
        echo "<p>Converted Temperature: $converted_temperature</p>";
    }
    ?>
    </div>
</body>
</html>
