<?php

function main(string $configFileAddress) : string {
    $config = readConfig($configFileAddress);

    if(!$config){
        return handleError("Невозможно подключить файл настроек");
    }

    $functionName = parseCommand();

    if(function_exists($functionName)) {
        $result = $functionName($config);
    }
    else {
        $result = handleError("Вызываемая функция не существует");
    }

    return $result;
}

function parseCommand() : string {
    $functionName = 'helpFunction'; //// Изначально устанавливаем имя функции по умолчанию
    
    if(isset($_SERVER['argv'][1])) { // Проверяем, передан ли аргумент командной строки
        $functionName = match($_SERVER['argv'][1]) {// Используем конструкцию match для выбора функции
            'read-all' => 'readAllFunction',
            'add' => 'addFunction',
            'clear' => 'clearFunction',
            'read-profiles' => 'readProfilesDirectory',
            'read-profile' => 'readProfile',
            'help' => 'helpFunction',
            default => 'helpFunction'// Если аргумент не совпадает ни с одним из случаев, возвращаем helpFunction
        };
    }

    return $functionName;// Возвращаем имя функции, которую нужно вызвать
}