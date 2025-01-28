<?php

$counter = 0;

// function incrementCounter(int $counterInternal): int {
//     $counterInternal++;

//     return $counterInternal;
// }

// echo $counter . "\r\n";
// $counter = incrementCounter($counter);
// echo $counter . "\r\n";

//крайний вариант, если это действительно нужно
function incrementCounter(int &$counterInternal): int {
    $counterInternal++;

    return $counterInternal;
}

echo $counter . "\r\n";
incrementCounter($counter);
echo $counter . "\r\n";