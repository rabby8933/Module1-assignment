<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
</head>
<body>
    <h1>Grade Calculator</h1>

    <?php
    $score1 = '';
    $score2 = '';
    $score3 = '';
    $average = '';
    $grade = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $score1 = $_POST["score1"];
        $score2 = $_POST["score2"];
        $score3 = $_POST["score3"];

        $average = ($score1 + $score2 + $score3) / 3;

        if ($average >= 90) {
            $grade = 'A';
        } elseif ($average >= 80) {
            $grade = 'B';
        } elseif ($average >= 70) {
            $grade = 'C';
        } elseif ($average >= 60) {
            $grade = 'D';
        } else {
            $grade = 'F';
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="score1">Test Score 1:</label>
        <input type="number" name="score1" required value="<?php echo $score1; ?>" step="0.01"><br>

        <label for="score2">Test Score 2:</label>
        <input type="number" name="score2" required value="<?php echo $score2; ?>" step="0.01"><br>

        <label for="score3">Test Score 3:</label>
        <input type="number" name="score3" required value="<?php echo $score3; ?>" step="0.01"><br>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($average !== '') {
        echo "<p>Average Score: $average</p>";
        echo "<p>Letter Grade: $grade</p>";
    }
    ?>
</body>
</html>
