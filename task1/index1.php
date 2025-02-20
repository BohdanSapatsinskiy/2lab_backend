<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$baseText = "Hello World world!";
echo "Дано рядок: $baseText <br>";
$findElem = "world";
echo "Знайти: $findElem <br>";
$repElem = "Sam"; 
echo "Замінити на: $repElem <br>";

if (strpos($baseText, $findElem) !== false) {
    $result = str_ireplace($findElem, $repElem, $baseText);
    echo "Результат: $result";
} else {
    echo "Слово '$findElem' не знайдено в тексті.<br>";
}



echo "<br><br>";
$cityLine = "Житомир Київ Львів Дніпро";
echo "Не сортований рядок: $cityLine <br>";
$words = explode(" ", $cityLine);
sort($words, SORT_LOCALE_STRING);
$sortedLine = implode(" ", $words);

echo "Cортований рядок: $sortedLine <br>";



echo "<br><br>";
$fullPath = "D:\\WebServers\\home\\testsite\\www\\myfile.txt";
echo "Шлях до файлу: $fullPath<br>";

$fileName = basename($fullPath);
echo "Файл: $fileName<br>";

$clearFileName = pathinfo($fileName, PATHINFO_FILENAME);
echo "Назва файлу: $clearFileName <br>";



echo "<br><br>";
$startDate = "19-02-2025";
echo "Дата початку $startDate<br>";
$endDate = "24-02-2025";
echo "Дата кінця $endDate<br>";

$startTimestamp = strtotime($startDate);
$endTimestamp = strtotime($endDate);
$days = ($endTimestamp - $startTimestamp) / (24*60*60);
echo "Між ними $days днів<br>";



echo "<br><br>";
function generatePass() {
    $upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $lower = "abcdefghijklmnopqrstuvwxyz";
    $numbers = "0123456789";
    $special = "!@#$%^&*()_=+|;:,.?/";

    $allChars = $upper . $lower . $numbers . $special;
    $password = "";

    $randLenth = rand(8, 16);
    for ($i = 0; $i < $randLenth; $i++) {
        $password .= $allChars[rand(0, strlen($allChars) - 1)];
    }

    return str_shuffle($password);
}

function checkPass($password) {
    return strlen($password) >= 8 &&
           preg_match('/[A-Z]/', $password) &&
           preg_match('/[a-z]/', $password) &&
           preg_match('/[0-9]/', $password) &&
           preg_match('/[\W_]/', $password);
}

$genePass = generatePass();
echo "Згенерований пароль: $genePass <br>";

if (checkPass($genePass)) {
    echo "Пароль міцний.<br>";
} else {
    echo "Пароль не міцний.<br>";
}
?>
</body>
</html>