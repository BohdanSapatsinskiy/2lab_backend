<?php
session_start();
$_SESSION['Login'] = $_POST['Login'] ?? '';
$_SESSION['Pass'] = $_POST['Pass'] ?? '';
$_SESSION['rPass'] = $_POST['rPass'] ?? '';
$_SESSION['Gender'] = $_POST['Gender'] ?? '';
$_SESSION['Games'] = $_POST['Games'] ?? [];
$_SESSION['About'] = $_POST['About'] ?? '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['Login'];
    $password = $_POST['Pass'];
    $rpassword = $_POST['rPass'];
    $gender = $_POST['Gender'];
    $games = isset($_POST['Games']) ? $_POST['Games'] : [];
    $about = $_POST['About'];

    if ($password !== $rpassword) {
        echo "<p style='color:red;'>Помилка: Паролі не співпадають!</p>";
        exit;
    }

    echo "<h1>Отримані дані:</h1>";
    echo "<p><strong>Логін:</strong> $login</p>";
    echo "<p><strong>Стать:</strong> $gender</p>";
    echo "<p><strong>Улюблені ігри:</strong> " . implode(", ", array_map('htmlspecialchars', $games)) . "</p>";
    echo "<p><strong>Про себе:</strong> $about</p>";

    if (isset($_FILES['Image']) && $_FILES['Image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileTmpPath = $_FILES['Image']['tmp_name'];
        $fileName = basename($_FILES['Image']['name']);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $filePath)) {
            echo "<p><strong>Фотографія:</strong></p>";
            echo "<img src='$filePath' alt='Фото користувача' style='max-width: 200px;'>";
        } else {
            echo "<p style='color:red;'>Помилка завантаження файлу.</p>";
        }
    } else {
        echo "<p style='color:red;'>Файл не завантажено або сталася помилка.</p>";
    }
}
?>

<br><a href="index.php">Повернутися назад</a>
