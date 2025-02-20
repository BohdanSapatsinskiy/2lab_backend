<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['Login'] = $_POST['Login'] ?? '';
    $_SESSION['Pass'] = $_POST['Pass'] ?? '';
    $_SESSION['rPass'] = $_POST['rPass'] ?? '';
    $_SESSION['Gender'] = $_POST['Gender'] ?? '';
    $_SESSION['Games'] = $_POST['Games'] ?? [];
    $_SESSION['About'] = $_POST['About'] ?? '';
}

$login = $_SESSION['Login'] ?? '';
$pass = $_SESSION['Pass'] ?? '';
$rPass = $_SESSION['rPass'] ?? '';
$gender = $_SESSION['Gender'] ?? '';
$games = $_SESSION['Games'] ?? [];
$about = $_SESSION['About'] ?? '';


if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + 180 * 24 * 60 * 60, "/");
} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang']; 
} else {
    $lang = 'ua'; 
}

switch ($lang) {
    case 'ua':
        $selectedLang = "Українська";
        break;
    case 'eng':
        $selectedLang = "English";
        break;
    case 'pl':
        $selectedLang = "Polski";
        break;
    default:
        $selectedLang = "Українська";
}
?>


<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<style>
    .lang{
        width: 40px;
        height: 30px;
        margin: 5px;
        cursor: pointer;
    }
    .langPanel{
        display: flex;
        justify-content: center;
        align-items: center;
        background: black;
        width: 100%;
        height: 60px;
    }
</style>
<body>
    <div class="langPanel">
        <a href="index.php?lang=ua">
            <img class="lang" src="flags/ua.jpg" alt="">
        </a>    
        <a href="index.php?lang=eng">
            <img class="lang" src="flags/eng.png" alt="">
        </a>
        <a href="index.php?lang=pl">
            <img class="lang" src="flags/pl.png" alt="">
        </a>    
    </div>
    <p>Вибрана мова: <?php echo $selectedLang; ?></p>
    <form action="aboutme.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="Login">Логін</label></td>
                <td><input name="Login" type="text" value="<?= $login ?>"></td>
            </tr>
            <tr>
                <td><label for="Pass">Пароль</label></td>
                <td><input name="Pass" type="password" value="<?= $pass ?>"></td>
            </tr>
            <tr>
                <td><label for="rPass">Повторіть пароль</label></td>
                <td><input name="rPass" type="password" value="<?= $rPass ?>"></td>
            </tr>
            <tr>
                <td><label for="Gender">Стать</label></td>
                <td>
                    <input name="Gender" type="radio" value="Чоловік" <?= ($gender === 'Чоловік') ? 'checked' : '' ?>> Чоловік
                    <input name="Gender" type="radio" value="Жінка" <?= ($gender === 'Жінка') ? 'checked' : '' ?>> Жінка
                </td>
            </tr>
            <tr>
                <td><label for="Games">Улюблені ігри</label></td>
                <td>
                    <input name="Games[]" type="checkbox" value="Футбол" <?= in_array('Футбол', $games) ? 'checked' : '' ?>> Футбол<br>
                    <input name="Games[]" type="checkbox" value="Теніс" <?= in_array('Теніс', $games) ? 'checked' : '' ?>> Теніс<br>
                    <input name="Games[]" type="checkbox" value="Гольф" <?= in_array('Гольф', $games) ? 'checked' : '' ?>> Гольф
                </td>
            </tr>
            <tr>
                <td><label for="About">Про себе</label></td>
                <td><textarea name="About" rows="5" cols="20"><?= $about ?></textarea></td>
            </tr>
            <tr>
                <td><label for="Image">Фотографія</label></td>
                <td><input name="Image" type="file"></td>
            </tr>
            <tr>
                <td><button type="submit">Надіслати</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
