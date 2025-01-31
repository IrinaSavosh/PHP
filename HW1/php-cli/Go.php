<?php
$a = 5;
$b = '05';
var_dump($a == $b);
var_dump((int)'012345');
var_dump((float)123.0 === (int)123.0);
var_dump(0 == 'hello, world');





// docker run --rm -v ${pwd}/php-cli/:/cli php:8.2-cli php /cli/Go.php

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


// $c = 1;
// $d = 2;

//ВАРИАНТ 1
// более читаемый код
// $c = $c + $d; 
// $d = $c - $d; 
// $c = $c - $d; 

//ВАРИАНТ 2
// запись в одну строку
/**Пояснение по приоритетам (по шагам), как я себе это объяснила, потому что ИИ мне не смог объяснить:
 * 1. присваивание в правой части происходит в первую очередь:
 *          $d = $c  значит $d = 4
 * 2. Потом подставляются значения:  $c + $d(не преобразованная, т.к. компелятор не закончил работу с выражением) - $d(уже преобразованная = 4) = 4 + 9 - 4 = 9 => $c = 9
 * 3. а с $d уже произошло неявное преобразование и $d = 4 
 * Вывод:
 * $c = 9;
 * $d = 4;
 */
// $c = 4;
// $d = 9;
//  $c = $c + $d - $d = $c;

//ВАРИАНТ 3
/**Это прям из информатики, но понятно
 * Вычисление происходит справа на лево
 * Что такое ^?
Побитовый XOR (исключающее ИЛИ)
Работает на уровне битовых операций
Возвращает 1, если биты разные
Возвращает 0, если биты одинаковые
 * Пошаговое выполнение
Первая операция: $c ^= $d

$c = $c ^ $d
$c = 5 ^ 3
$c = 0101 ^ 0011
$c = 0110 (6)
Вторая операция: $d ^= $c

$d = $d ^ $c
$d = 3 ^ 6
$d = 0011 ^ 0110
$d = 0101 (5)
Третья операция: $c ^= $d

$c = $c ^ $d
$c = 6 ^ 5
$c = 0110 ^ 0101
$c = 0011 (3)
 */

//ВАРИАНТ 4

// $c = 5;
// $d = 3;
// $c ^= $d ^= $c ^= $d;
// Исходя из предыдущей логики алгоритма, получилось самой вычислить результат.
// 0101 (5)
// 0011 (3)
// $c = $c ^ $d ^ $d = $c;
// 1. $d = $c => $d = 0101
// 2. $d ^ $d = $c => 0011 ^ 0101 = 0110 (6)
//  3. $c ^ $d ^ $d = $c => 0101 ^ 0110 = 0011 (3)

//ВАРИАНТ 5
/**Пояснение
 * 1. в первую очередь происходит присвоение:
 * $d = $c => 2
 * 2. далее идет вычисление +$d - 2 => 7 - 2 = 5, где + в подвыражении +$d является простым приведением типа переменной к числу. Т.к. у нас $d изначально является числом, то ничего не изменяется
 * 3. подставляем дальнейшие значения:
 * $c += 5 => $c = $c + 5 => $c = 2 + 5 = 7
 */
$c = 2;
$d = 7;
// $c += +$d - $d = $c;

// происходит обычная замена
// [$c, $d] = [$d, $c];
echo "c = $c, d = $d \r\n";
//ВАРИАНТ 6
/**Пояснение
 * За счет функции list происходит присвоение переменным значений, которые есть в массиве.
 * присвоение происходит в том порядке, в котором переменные стоят в скобках: сначала $d, после $c.
 * А считывание массива также происходит по порядку сначала $c, потом $d
 */
list($d, $c) = [$c, $d];
echo "c = $c, d = $d";

