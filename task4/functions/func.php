<?php
function my_sin($x) {
    return sin($x);
}

function my_cos($x) {
    return cos($x);
}

function my_tg($x) {
    return tan($x);
}

function my_pow($x, $y) {
    return pow($x, $y);
}

function my_fact($x) {
    if ($x < 0) return "Факторіал не існує";
    if ($x == 0 || $x == 1) return 1;
    return $x * my_fact($x - 1);
}
?>
