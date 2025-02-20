<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function findDuplicates($arr) {
    $countValues = array_count_values($arr);
    foreach ($countValues as $key => $value) {
        if ($value > 1) {
            echo "$key <br>"; 
        }
    }
}
$arr = ["one", 1, "two", 2, 2, 1];
echo "Масив: " . implode(", ", $arr) . "<br>";
findDuplicates($arr);


echo  "<br>";
function genName($arr, $length = 3) {
    $name = "";
    for ($i = 0; $i < $length; $i++) {
        $name .= $arr[rand(0, (count($arr) - 1))];
    }

    return ucfirst($name);
}
$skladi = ["ку", "кі", "мі", "зу", "то", "па", "лі", "лу", "на", "ні"];
echo genName($skladi) . "<br>"; 




echo "<br>"; 
function createArray() {
    $length = rand(3, 7); 
    $array = [];

    for ($i = 0; $i < $length; $i++) {
        $array[] = rand(10, 20); 
    }
    return $array;
}

function mergeAndSortArr($arr1, $arr2) {
    $mergedArr = array_merge($arr1, $arr2); 
    $uniqueArr = array_unique($mergedArr); 
    sort($uniqueArr);

    return $uniqueArr;
}

$array1 = createArray();
$array2 = createArray();

echo "Масив 1: " . implode(", ", $array1) . "<br>";
echo "Масив 2: " . implode(", ", $array2) . "<br>";


$sortedArray = mergeAndSortArr($array1, $array2);
echo "Результат: " . implode(", ", $sortedArray) . "<br>";



$users = [
    "Артем" => 25,
    "Василь" => 19,
    "Віталій" => 30,
    "Дмитро" => 22,
];


function sortUsers(&$users, $sortBy) {
    if ($sortBy === 1) {
        asort($users);
    } else {
        ksort($users);
    }
}
echo  "<br>";
echo "Масив:<br>";
print_r($users);

sortUsers($users, 1);
echo "Відсортовано за віком:";
print_r($users);
echo  "<br>";
sortUsers($users, 0);
echo "Відсортовано за іменем:";
print_r($users);
echo  "<br>";

?>
</body>
</html>