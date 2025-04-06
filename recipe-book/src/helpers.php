<?php
// src/helpers.php

// Очищает данные от лишних пробелов и экранирует специальные символы для безопасности.
function sanitizeInput($data) {
    return htmlspecialchars(trim($data)); // Убираем лишние пробелы и экранируем HTML-символы.
}

// Проверяет, все ли обязательные поля заполнены в данных формы.
function validateRequiredFields($data, $fields) {
    foreach ($fields as $field) {
        if (empty($data[$field])) { // Если какое-то поле пустое, возвращаем false.
            return false;
        }
    }
    return true; // Все обязательные поля заполнены.
}

// Сохраняет данные в файл в формате JSON.
function saveToFile($filePath, $data) {
    file_put_contents($filePath, json_encode($data) . PHP_EOL, FILE_APPEND); // Сохраняем данные в формате JSON.
}

// Получает все рецепты из файла.
function getAllFromFile($filePath) {
    if (!file_exists($filePath)) { // Если файл не существует, возвращаем пустой массив.
        return [];
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Читаем все строки из файла.
    return array_map(fn($line) => json_decode($line, true), $lines); // Преобразуем каждую строку в массив.
}
