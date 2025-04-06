<?php
require_once __DIR__ . '/../src/helpers.php'; // Подключаем файл с хелперами

define('DATA_FILE', __DIR__ . '/../storage/recipes.txt');

// Функция для получения всех рецептов
function getAllRecipes() {
    if (!file_exists(DATA_FILE)) {
        return [];
    }

    $lines = file(DATA_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_map(fn($line) => json_decode($line, true), $lines);
}

// Функция для обработки формы
function handleRecipeSubmission(array $data) {
    // Валидация и фильтрация данных
    $title = sanitizeInput($data['title'] ?? '');
    $category = sanitizeInput($data['category'] ?? '');
    $description = sanitizeInput($data['description'] ?? '');
    $ingredients = sanitizeInput($data['ingredients'] ?? '');
    $steps = sanitizeInput($data['steps'] ?? '');

    // Проверка на заполненность обязательных полей
    $requiredFields = ['title', 'category', 'description', 'ingredients', 'steps'];

    if (!validateRequiredFields($data, $requiredFields)) {
        die("Пожалуйста, заполните все поля.");
    }

    // Создаем рецепт
    $recipe = [
        'title' => $title,
        'category' => $category,
        'description' => $description,
        'ingredients' => $ingredients,
        'steps' => $steps
    ];

    // Сохраняем рецепт
    saveToFile(DATA_FILE, $recipe);

    // Редирект на главную страницу
    header("Location: /index.php");
    exit;
}

// Если форма отправлена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handleRecipeSubmission($_POST);
}
