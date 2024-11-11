<?php

$address = '/code/birthdays.txt';

// Получаем имя и дату рождения от пользователя
$name = readline("Введите имя: ");
$date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");

// Проверяем, что имя не пустое
if (empty(trim($name))) {
    echo "Ошибка: Имя не может быть пустым.\n";
    exit;
}

if (validate($date)) {
    $data = $name . ", " . $date . "\r\n";

    // Проверяем, существует ли файл и доступен ли для записи
    if (!is_writable($address) && !is_writable(dirname($address))) {
        echo "Ошибка: Файл $address недоступен для записи.\n";
        exit;
    }

    $fileHandler = fopen($address, 'a');
    
    if ($fileHandler === false) {
        echo "Ошибка: Не удалось открыть файл для записи.\n";
        exit;
    }

    if (fwrite($fileHandler, $data)) {
        echo "Запись $data добавлена в файл $address\n";
    } else {
        echo "Произошла ошибка записи. Данные не сохранены\n";
    }
    
    fclose($fileHandler);
} else {
    echo "Введена некорректная дата. Пожалуйста, используйте формат ДД-ММ-ГГГГ.\n";
}

function validate(string $date): bool {
    // Проверяем формат даты с помощью регулярного выражения
    if (!preg_match("/^(\d{2})-(\d{2})-(\d{4})$/", $date, $matches)) {
        return false;
    }

    $day = (int)$matches[1];
    $month = (int)$matches[2];
    $year = (int)$matches[3];

    // Проверяем корректность даты
    if (!checkdate($month, $day, $year)) {
        return false;
    }

    // Проверяем, что год не из будущего
    if ($year > date('Y')) {
        return false;
    }

    return true;
}
