<?php
$a = 5;
$b = '05';
var_dump($a == $b);
var_dump((int)'012345');
var_dump((float)123.0 === (int)123.0);
var_dump(0 == 'hello, world');





// docker run --rm -v ${pwd}/HW1/php-cli/:/cli php:8.2-cli php /cli/Go.php

//Ответ в версии 8.2:
//bool(true)
// int(12345)
// bool(false)
// bool(false)

//Ответ в версии 7.4:
// bool(true)
// int(12345)
// bool(false)
// bool(true)


$c = 1;
$d = 2;



$c = $c + $d; 
$d = $c - $d; 
$c = $c - $d; 

echo "c = $c, d = $d";