<?php
//docker run -it --rm -v ${pwd}/HW3/php-cli/:/cli php:8.2-cli php /cli/fwrite-cli.php

$address = '/cli/birthdays.txt';

while (true) {
    echo "\nВыберите действие:\n";
    echo "1. Записать данные\n";
    echo "2. Прочитать данные\n";
    echo "3. Проверить именинников\n";
    echo "4. Удалить запись\n";
    echo "5. Выход\n";

    $choice = readline("Введите номер действия: ");

    switch ($choice) {
        case '1':
            writeData($address);
            break;
        case '2':
            readData($address);
            break;
        case '3':
            checkBirthdays($address);
            break;
        case '4':
            deleteEntry($address);
            break;
        case '5':
            echo "Выход из программы.\n";
            exit;
        default:
            echo "Некорректный выбор. Попробуйте снова.\n";
    }
}

function writeData(string $address) {
    $name = readline("Введите имя (или 'q' для выхода): ");

    if ($name === 'q') {
        return;
    }

    // Проверяем, что имя не пустое
    if (empty(trim($name))) {
        echo "Ошибка: Имя не может быть пустым.\n";
        return;
    }

    $date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");

    if (validate($date)) {
        $data = $name . ", " . $date . "\r\n";

        // Проверяем, существует ли файл и доступен ли для записи
        if (!is_writable($address) && !is_writable(dirname($address))) {
            echo "Ошибка: Файл $address недоступен для записи.\n";
            return;
        }

        $fileHandler = fopen($address, 'a');

        if ($fileHandler === false) {
            echo "Ошибка: Не удалось открыть файл для записи.\n";
            return;
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
}

function readData(string $address) {
    if (!file_exists($address)) {
        echo "Ошибка: Файл не найден.\n";
        return;
    }

    $fileHandler = fopen($address, 'r');
    if ($fileHandler === false) {
        echo "Ошибка: Не удалось открыть файл для чтения.\n";
        return;
    }

    echo "Содержимое файла:\n";
    while (($line = fgets($fileHandler)) !== false) {
        echo $line;
    }

    fclose($fileHandler);
}

function checkBirthdays(string $address) {
    if (!file_exists($address)) {
        echo "Ошибка: Файл не найден.\n";
        return;
    }

    $today = date('d-m');
    $fileHandler = fopen($address, 'r');
    if ($fileHandler === false) {
        echo "Ошибка: Не удалось открыть файл для чтения.\n";
        return;
    }

    $found = false;
    while (($line = fgets($fileHandler)) !== false) {
        list($name, $birthdate) = explode(", ", trim($line));
        if (date('d-m', strtotime($birthdate)) === $today) {
            echo "Сегодня день рождения у: $name\n";
            $found = true;
        }
    }

    if (!$found) {
        echo "Сегодня нет именинников.\n";
    }

    fclose($fileHandler);
}

function deleteEntry(string $address) {
    if (!file_exists($address)) {
        echo "Ошибка: Файл не найден.\n";
        return;
    }

    $nameOrDate = readline("Введите имя или дату (ДД-ММ-ГГГГ) для удаления: ");
    $lines = file($address);
    $found = false;

    foreach ($lines as $index => $line) {
        if (strpos($line, $nameOrDate) !== false) {
            unset($lines[$index]);
            $found = true;
            echo "Запись '$line' удалена.\n";
        }
    }

    if (!$found) {
        echo "Запись не найдена.\n";
    } else {
        file_put_contents($address, implode("", $lines));
    }
}

function validate(string $date): bool {
    // Проверяем формат даты с помощью регулярного выражения
    if (!preg_match("/^(\\d{2})-(\\d{2})-(\\d{4})$/", $date, $matches)) {
        return false; // Неверный формат
    }

    $day = (int)$matches[1];
    $month = (int)$matches[2];
    $year = (int)$matches[3];

    // Проверяем корректность даты
    if (!checkdate($month, $day, $year)) {
        return false; // Некорректная дата (например, 30 февраля)
    }

    // Проверяем, что год не из будущего
    if ($year > date('Y')) {
        return false; // Год не может быть в будущем
    }

    // Дополнительная проверка: месяц должен быть в пределах 1-12
    if ($month < 1 || $month > 12) {
        return false; // Месяц вне допустимого диапазона
    }

    // Дополнительная проверка: день должен быть в пределах 1-31, в зависимости от месяца
    if ($day < 1 || $day > 31) {
        return false; // День вне допустимого диапазона
    }

    return true; // Дата корректна
}
