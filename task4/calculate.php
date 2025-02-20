<?php
require 'functions/func.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = (float)$_POST["x"];
    $y = isset($_POST["y"]) ? (float)$_POST["y"] : null;

    $results = [
        "sin($x)" => my_sin($x),
        "cos($x)" => my_cos($x),
        "tg($x)" => my_tg($x),
        "$x!" => my_fact($x)
    ];

    if ($y !== null) {
        $results["$x ^ $y"] = my_pow($x, $y);
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Результати обчислень</title>
</head>
<body>
    <h2>Результати</h2>
    <ul>
        <?php foreach ($results as $operation => $value): ?>
            <li><?php echo "$operation = $value"; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Назад</a>
</body>
</html>
