<?php
// docker run --rm -v ${pwd}/HW1/php-cli/:/cli php:8.2-cli php /cli/Go.php


/**
 *  1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа, третий – операция. Обязательно использовать оператор return.
 */

function calculate($num1, $num2, $operation)
{
   switch ($operation) {
      case 'add':
         return $num1 + $num2;
      case 'subtract':
         return $num1 - $num2;
      case 'multiply':
         return $num1 * $num2;
      case 'divide':
         if ($num2 != 0) {
            return $num1 / $num2;
         } else {
            return 'Ошибка: деление на ноль';
         }
      default:
         return 'Ошибка: неверная операция';
   }
}
echo "\n";

echo calculate(10, 5, 'add');
echo "\n";
echo calculate(10, 5, 'subtract');
echo "\n";
echo calculate(10, 5, 'multiply');
echo "\n";
echo calculate(10, 5, 'divide');
echo "\n";
echo calculate(10, 0, 'divide');     // деление на ноль
echo "\n";
echo "\n";

/**
 * 2.Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
 */


function mathOperation($arg1, $arg2, $operation)
{
   switch ($operation) {
      case 'add':
         return $arg1 + $arg2;
      case 'subtract':
         return $arg1 - $arg2;
      case 'multiply':
         return $arg1 * $arg2;
      case 'divide':
         if ($arg2 != 0) {
            return $arg1 / $arg2;
         } else {
            return 'Ошибка: деление на ноль';
         }
      default:
         return 'Ошибка: неизвестная операция';
   }
}

echo mathOperation(10, 5, 'add');
echo "\n";
echo mathOperation(10, 5, 'subtract');
echo "\n";
echo mathOperation(10, 5, 'multiply');
echo "\n";
echo mathOperation(10, 5, 'divide');
echo "\n";
echo mathOperation(10, 0, 'divide');    // деление на ноль
echo "\n";
echo mathOperation(10, 5, 'unknown');    // неизвестная операция

echo "\n";
echo "\n";

/**
 * 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким: Московская область: Москва, Зеленоград, Клин Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … (названия городов можно найти на maps.yandex.ru).
 */


$regions = [
   "Минская область" => ["Минск", "Слуцк", "Нарочь"],
   "Гродненская область" => ["Гродно", "Новогрудок"],
   "Брестская область" => ["Брест", "Баранович", "Пинск"],
   "Гомельская область" => ["Гомель", "Жлобин", "Светлогорск"]
];

foreach ($regions as $region => $cities) {
   echo $region . ": " . implode(", ", $cities) . "\n";
}
echo "\n";
echo "\n";

/**
 * 4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). Написать функцию транслитерации строк.
 */



function transliterate($string)
{
   $transliterationTable = [
      'а' => 'a',
      'б' => 'b',
      'в' => 'v',
      'г' => 'g',
      'д' => 'd',
      'е' => 'e',
      'ё' => 'yo',
      'ж' => 'zh',
      'з' => 'z',
      'и' => 'i',
      'й' => 'y',
      'к' => 'k',
      'л' => 'l',
      'м' => 'm',
      'н' => 'n',
      'о' => 'o',
      'п' => 'p',
      'р' => 'r',
      'с' => 's',
      'т' => 't',
      'у' => 'u',
      'ф' => 'f',
      'х' => 'kh',
      'ц' => 'ts',
      'ч' => 'ch',
      'ш' => 'sh',
      'щ' => 'shch',
      'ъ' => '',
      'ы' => 'y',
      'ь' => '',
      'э' => 'e',
      'ю' => 'yu',
      'я' => 'ya'
   ];

   // Нижний регистр
   $string = mb_strtolower($string, 'UTF-8');



   $transliteratedString = '';
   $length = mb_strlen($string, 'UTF-8');

   for ($i = 0; $i < $length; $i++) {
      $char = mb_substr($string, $i, 1, 'UTF-8');
      $transliteratedString .= $transliterationTable[$char] ?? $char; // Если не нашли букву
   }

   return $transliteratedString;
}

$inputString = "КАРТЫ ДЕНЬГИ ДВА СТВОЛА";
$outputString = transliterate($inputString);
echo $outputString;

echo "\n";
echo "\n";


/**+
 * 5. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
 */


function power($val, $pow)
{
   // любое число в степени 0 равно 1
   if ($pow == 0) {
      return 1;
   }


   return $val * power($val, $pow - 1);
}

echo power(2, 3); 
echo "\n";
echo power(2, 0); 
echo "\n";
echo "\n";

/**
 * 6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
 * 22 часа 15 минут
 * 21 час 43 минуты.
 */




function getCurrentTimeWithDeclension()
{
   // Установка часового пояса
   date_default_timezone_set('Europe/Moscow'); 

   $currentTime = new DateTime();

   $hours = (int)$currentTime->format('G'); 
   $minutes = (int)$currentTime->format('i'); 

   
   if ($hours % 10 == 1 && $hours % 100 != 11) {
      $hourDeclension = 'час';
   } elseif ($hours % 10 >= 2 && $hours % 10 <= 4 && ($hours % 100 < 10 || $hours % 100 >= 20)) {
      $hourDeclension = 'часа';
   } else {
      $hourDeclension = 'часов';
   }

   
   if ($minutes % 10 == 1 && $minutes % 100 != 11) {
      $minuteDeclension = 'минута';
   } elseif ($minutes % 10 >= 2 && $minutes % 10 <= 4 && ($minutes % 100 < 10 || $minutes % 100 >= 20)) {
      $minuteDeclension = 'минуты';
   } else {
      $minuteDeclension = 'минут';
   }

   return "$hours $hourDeclension $minutes $minuteDeclension";
}

echo getCurrentTimeWithDeclension();
