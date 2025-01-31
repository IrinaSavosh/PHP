<?php

/**
 * Написать функцию, которая принимает на вход число, а затем возвращает булевский ответ - простое ли оно
 */
function simpleNumber($number)
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            return false;
        };
    }
    return true;
}

$number = 1;
while ($number < 11) {
    if (simpleNumber($number)) {
        echo "Число $number простое число\r\n";
    }
    $number++;
}


/**
 * В функцию передается строка скобок: "()()(())"
 * Нужно в конце показать, корректная ли последовательность
 * Некорректная ")(" "())("
 */


// $str = "((())";

// echo validate_string($str) ? "Строка валидна" : "Ошибка";

// function validate_string(string $str): bool
// {
//     $count = 0;
//     for ($i = 0; $i < strlen($str); $i++) {
//         if ($str[$i] === "(") {
//             $count++;
//         } else if ($str[$i] === ")") {
//             $count--;
//         }
//         if ($count < 0) {
//             return false;
//         }
//     }
//     return $count === 0;
// }
