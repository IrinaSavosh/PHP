<?php
$array1 = [1, 8, 6, 4, 3];
$array2 = [2, 5, 3, 9];


for ($i = 0; $i < count($array2); $i++) {
    $array1[count($array1)] = $array2[$i];
}


print_r($array1);

// echo count($array1);

for ($i = 0; $i < count($array1) - 1; $i++) {


    for ($j = $i + 1; $j < count($array1); $j++) {
        if ($array1[$i] > $array1[$j]) {
            $temp = $array1[$i];
            $array1[$i] = $array1[$j];
            $array1[$j] = $temp;
        }
    }
}

print_r($array1);

// <!-- Данное решение подходит для изначально отсортированных массивов -->
// $count1 = 0;
// $count2 = 0;
// $result = [];

// while ($count1 < count($array1) && $count2 < count($array2)) {
//     if ($array1[$count1] < $array2[$count2]) {
//         $result[] = $array1[$count1];
//         $count1++;
//     } else {
//         $result[] = $array2[$count2];
//         $count2++;
//     }
// }

// if ($count1 < count($array1)) {
//     for (; $count1 < count($array1); $count1++) {
//         $result[] = $array1[$count1];
//     }
// }

// if ($count2 < count($array2)) {
//     for (; $count2 < count($array2); $count2++) {
//         $result[] = $array2[$count2];
//     }
// }

// echo "<pre>";
// print_r($result);
// // var_dump($result);