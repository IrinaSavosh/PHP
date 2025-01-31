<?php

$x = 1;

function inc(&$x) { // здесь передается глобальная переменная. Поэтому и return не требуется, а также не нужно вызывать функцию вида $x=inc($x);
    $x++;
}

inc($x);
echo $x . PHP_EOL;// PHP_EOL - перенос строки



function add(int $x = 0, int $y = 0):int|string { //int|string - возвращает или число или строку (| - это "или")

    return $x + $y;
}
//стрелочная функция (конструкция):
$add = fn($x, $y) => $x + $y;

$result = add(2,2);

echo $add(2,3) . PHP_EOL;
echo $result . PHP_EOL;